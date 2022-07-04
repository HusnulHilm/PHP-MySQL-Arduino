﻿<?php
$strain_Voltage;
$strain_k=2;
$strain_Vs=12;
$strain_epsilon;
$strain_E=210;//Gpa
$strain_sigma;
$strain_b=0.030;//m
$strain_h=0.006;//m
$strain_Ymax=$strain_h/2;
$strain_IGz=($strain_b*pow($strain_h,3))/12;
$strain_Mf;
$Temperature_Voltage;
$Temperature_Rt;
$Temperature_a=22.5419877;
$Temperature_b=91;
$Temperature_R0 = 100.0;
$Temperature_alpha = 0.00385;
$Temperature1;
$Temperature2;
$Temperature3;
$Temperature_values_sql;
$pressure_values_sql="(";
$strain_values_sql="(";
$pressure_Voltage;
$pressure_I;
$pressure_R = 250.0;
$pressure_result= array();
$strain_result= array();
$Temperature1_converted;
$Temperature2_converted;
$Temperature3_converted;
$pressure_converted= array();
$strain_converted= array();
$L=7.8;//bielle
$R=1.6;//manivelle
$D=5.0;//Diametre piston
$angle= array(); 
$volume= array();
$P_V= array();
$Mf_phi= array();
$P_V_integral;
$Mf_phi_integral;
/////////////////////////////
require('serialComunication.php');
$device="/dev/ttyACM0";
$BaudRate= 9600;
$i=0;
$result= array();
$serial = new phpSerial();
$serial->deviceSet($device);
$serial->confBaudRate($BaudRate);
$serial->deviceOpen();
sleep(2);
$serial->sendMessage("ok\n");
sleep(2);


 
while ($i < 203) { 
    usleep(10000);
    $message=$serial->readMessageByLine();
	
	//if (!empty($message)) {  
	
	// isset() qui va tester l'existence de la variable $message
	if (isset($message)) {
	// mis la valleur du message dans le fihcier txt
	    $result[] = $message;
       $i=$i+1; 
    }    
	
}
$serial->deviceClose();


//////// la création d'un fichier vide /////////////////////
 // le nom de fichier sera la concaténation de "l'année-le mois-le jour-l'heure-minute-second.txt"
 //$fichier = date('Y-m-d-H-i-s').'.txt';
 
$filename = 'Ard.txt';
 // ouverture du fichier en lecture et écriture

// Assurons nous que le fichier est accessible en écriture
if (is_writable($filename)) {

    // Dans notre exemple, nous ouvrons le fichier $filename en mode d'ajout
    // Le pointeur de fichier est placé à la fin du fichier
    // c'est là que $somecontent sera placé
	
    if (!$handle = fopen($filename, 'w+')) {
        echo "Impossible d'ouvrir le fichier ($filename)";
        // exit;
    }

	
	for ($j = 0; $j < 203; $j++) {
    // Ecrivons quelque chose dans notre fichier.
	
	//$result[]=$j."\n";
	//$somecontent = $j."\n";
	$somecontent = $result[$j];
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Impossible d'écrire dans le fichier ($filename)";
       // exit;
    }
	
     // echo "L'écriture de ($somecontent) dans le fichier ($filename) a réussi";
	}
     // fermeture du fichier
    fclose($handle);
	/* echo '<pre>';
	print_r($result);
	echo '</pre>'; */

} else {
   echo "Le fichier $filename n'est pas accessible en écriture.";
}

/////////////////////////////
for ($j = 0; $j < 203; $j++) {
    if ($j == 0) {
        $Temperature1=floatval($result[$j]);
    } elseif ($j == 1) { 
        $Temperature2=floatval($result[$j]);
    } elseif ($j == 2) {
        $Temperature3=floatval($result[$j]);
    } elseif ($j > 2 && $j < 103 ) {
        $pressure_result[]=floatval($result[$j]);
    } elseif ($j > 102 && $j < 203 ) { 
        $strain_result[]=floatval($result[$j]);
    } 
}
/////////////////////////////
$Temperature_Voltage=($Temperature1/1023.0)*5.0;
$Temperature_Rt = $Temperature_a*$Temperature_Voltage+$Temperature_b;
$Temperature1_converted=($Temperature_Rt/$Temperature_R0-1.0)/$Temperature_alpha;

$Temperature_Voltage=($Temperature2/1023.0)*5.0;
$Temperature_Rt = $Temperature_a*$Temperature_Voltage+$Temperature_b;
$Temperature2_converted=($Temperature_Rt/$Temperature_R0-1.0)/$Temperature_alpha;

$Temperature_Voltage=($Temperature3/1023.0)*5.0;
$Temperature_Rt = $Temperature_a*$Temperature_Voltage+$Temperature_b;
$Temperature3_converted=($Temperature_Rt/$Temperature_R0-1.0)/$Temperature_alpha;

for ($k = 0; $k < 100; $k++) {
    $pressure_Voltage=($pressure_result[$k]/1023.0)*5.0;
    $pressure_I=$pressure_Voltage/$pressure_R;
    $pressure_converted[$k]=($pressure_I*16)/(20*pow(10,-3));//bar
}
for ($l = 0; $l < 100; $l++) {
    $strain_Voltage=($strain_result[$l]/1023.0)*5.0;
    $strain_epsilon=($strain_Voltage/($strain_Vs*$strain_k))/100;//(metre/metre)
    $strain_sigma=$strain_E*$strain_epsilon;//Gpa
    $strain_Mf=-($strain_sigma*pow(10,9)*$strain_IGz)/$strain_Ymax;
    $strain_converted[$l]=$strain_Mf;
}
/////////////////////////////
for ($m = 0; $m < 100; $m++) {
    $angle[$m]= $m*((2*pi())/100);
    $volume[$m]=pi()*pow(($D/2),2)*($R+$L-$R*cos($angle[$m])-$L*sqrt(1-pow(($R/$L)*sin($angle[$m]),2)));//cm3
    $P_V[$m][0]=$volume[$m];
    $P_V[$m][1]=$pressure_converted[$m];
    $Mf_phi[$m][0]=$angle[$m];
    $Mf_phi[$m][1]=$strain_converted[$m];
} 
 $P_V_integral=Integral_PV($P_V);
 $Mf_phi_integral=Integral_MF($Mf_phi);
 
 
  
 
 
 /////////////////////////////
function Surface($x1,$x2,$y1,$y2)
{ 
    $surface=(abs($y1+$y2)*abs($x1-$x2))/2;
    return $surface;
}

function Surface_T($x1,$x2,$y1,$y2)
{ 
    if ($y1 > $y2 ){
        $surface_1=(pow($y1,2)*abs($x1-$x2))/(2*($y1- $y2)) ;
        $surface_2= (pow(-$y2,2)*abs($x1-$x2))/(2*($y1- $y2));
        
    }else{
        $surface_1= (pow($y2,2)*abs($x1-$x2))/(2*($y2- $y1));;
        $surface_2= (pow(-$y1,2)*abs($x1-$x2))/(2*($y2- $y1));
        
    }
    $surface=$surface_1-$surface_2;
    return $surface;
}

function Integral_PV($array)
{ 
    $integral=null;
    $count=count($array);  
    for($n = 0; $n < $count; $n++){ 
        if ($n == ($count-1)) {
            if ($array[$n][0] > $array[0][0]) {
                $integral=$integral-(surface($array[$n][0],$array[0][0],$array[$n][1],$array[0][1]));
            } else {
                $integral=$integral+(surface($array[$n][0],$array[0][0],$array[$n][1],$array[0][1]));
            }
        } else {
            if ($array[$n][0] > $array[$n+1][0]) {
                $integral=$integral-(surface($array[$n][0],$array[$n+1][0],$array[$n][1],$array[$n+1][1]));
            } else {
                $integral=$integral+(surface($array[$n][0],$array[$n+1][0],$array[$n][1],$array[$n+1][1]));
            }
        }
    } 
    return $integral;
} 
function Integral_MF($array)
{ 
    $integral=null;
    $count=count($array);  
    for($n = 0; $n < $count; $n++){ 
        if ($n != ($count-1)) {
            if ($array[$n][1] >= 0 && $array[$n+1][1] >= 0) {
                $integral=$integral+(surface($array[$n][0],$array[$n+1][0],$array[$n][1],$array[$n+1][1]));
            } elseif ($array[$n][1] < 0 && $array[$n+1][0] < 0) {
                $integral=$integral-(surface($array[$n][0],$array[$n+1][0],$array[$n][1],$array[$n+1][1]));
            } else { 
                $integral=$integral+(surface_T($array[$n][0],$array[$n+1][0],$array[$n][1],$array[$n+1][1]));
            }      
    }
}  
    return $integral;
} 


/////////////////////////////


/////////////////////////////



?>
          <div style="width:1000px" class="center-div">
				<img src="show.php" />
			</div>
