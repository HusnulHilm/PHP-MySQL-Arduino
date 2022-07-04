<?php
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
$pressure_result= array(573.4,533.0,571.4,584.2,589.4,572.4,575.4,581.2,565.8,484.4,429.8,360.2,320.4,253.2,262,196.6,152,162.2,121.6,112.4,128.6,125.4,109.6,105.6,124.2,107.6,111.8,103.4,98.4,120.4,126.8,130.8,111.8,122.2,116,123.2,111.8,109,122.2,88.6,107.2,107.4,121.4,118.8,114.6,116.8,112.4,121.2,130.8,117.8,104,119.8,124.8,102.8,112.2,127,117.6,109.4,125.6,120,119,126,127.8,121,122.4,126.6,128.8,147.2,133.6,138.6,153,136.6,153.2,171.4,151,159,183,199.8,236,204.6,222.6,246.2,255.6,285.4,278.6,316.8,365.2,399.8,441,461.8,524.6,576.2,580,593.2,609,621.2,590,542,562.4,589);
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
// require('serialComunication.php');
// $device="/dev/ttyACM1";
// $BaudRate= 9600;
// $i=0;
// $result= array();
// $serial = new phpSerial();
// $serial->deviceSet($device);
// $serial->confBaudRate($BaudRate);
// $serial->deviceOpen();
// sleep(2);
// $serial->sendMessage("ok\n");
// sleep(2);
// while ($i < 203) { 
//     usleep(10000);
//     $message=$serial->readMessageByLine();
//     if ($message) {   
//         $result[] = $message;
//         $i=$i+1;
//     }    
// }
// $serial->deviceClose();
/////////////////////////////
// for ($j = 0; $j < 203; $j++) {
//     if ($j == 0) {
//         $Temperature1=floatval($result[$j]);
//     } elseif ($j == 1) { 
//         $Temperature2=floatval($result[$j]);
//     } elseif ($j == 2) {
//         $Temperature3=floatval($result[$j]);
//     } elseif ($j > 2 && $j < 103 ) {
//         $pressure_result[]=floatval($result[$j]);
//     } elseif ($j > 102 && $j < 203 ) { 
//         $strain_result[]=floatval($result[$j]);
//     } 
// }
/////////////////////////////
// $Temperature_Voltage=($Temperature1/1023.0)*5.0;
// $Temperature_Rt = $Temperature_a*$Temperature_Voltage+$Temperature_b;
// $Temperature1_converted=($Temperature_Rt/$Temperature_R0-1.0)/$Temperature_alpha;

// $Temperature_Voltage=($Temperature2/1023.0)*5.0;
// $Temperature_Rt = $Temperature_a*$Temperature_Voltage+$Temperature_b;
// $Temperature2_converted=($Temperature_Rt/$Temperature_R0-1.0)/$Temperature_alpha;

// $Temperature_Voltage=($Temperature3/1023.0)*5.0;
// $Temperature_Rt = $Temperature_a*$Temperature_Voltage+$Temperature_b;
// $Temperature3_converted=($Temperature_Rt/$Temperature_R0-1.0)/$Temperature_alpha;

for ($k = 0; $k < 100; $k++) {
    $pressure_Voltage=($pressure_result[$k]/1023.0)*5.0;
    $pressure_I=$pressure_Voltage/$pressure_R;
    $pressure_converted[$k]=($pressure_I*16)/(20*pow(10,-3));//bar
}
// for ($l = 0; $l < 100; $l++) {
//     $strain_Voltage=($strain_result[$l]/1023.0)*5.0;
//     $strain_epsilon=($strain_Voltage/($strain_Vs*$strain_k))/100;//(metre/metre)
//     $strain_sigma=$strain_E*$strain_epsilon;//Gpa
//     $strain_Mf=-($strain_sigma*pow(10,9)*$strain_IGz)/$strain_Ymax;
//     $strain_converted[$l]=$strain_Mf;
// }
/////////////////////////////
for ($m = 0; $m < 100; $m++) {
    $angle[$m]= $m*((2*pi())/100);
    $volume[$m]=pi()*pow(($D/2),2)*($R+$L-$R*cos($angle[$m])-$L*sqrt(1-pow(($R/$L)*sin($angle[$m]),2)));//cm3
    $P_V[$m][0]=$volume[$m];
    $P_V[$m][1]=$pressure_converted[$m];
    // $Mf_phi[$m][0]=$angle[$m];
    // $Mf_phi[$m][1]=$strain_converted[$m];
} 
 $P_V_integral=Integral_PV($P_V);
//  $Mf_phi_integral=Integral_MF($Mf_phi);
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


///////////////////////////// SQL

// $Temperature_values_sql="(".$Temperature1.",".$Temperature2.",".$Temperature3.")";
// for ($n = 0; $n < 100; $n++) {
//     if ($n=99) {
//         $pressure_values_sql=$pressure_values_sql.$pressure_result[$n].")";
//         $strain_values_sql=$strain_values_sql.$strain_result[$n].")";
//     }else {
//         $pressure_values_sql=$pressure_values_sql.$pressure_result[$n].",";
//         $strain_values_sql=$strain_values_sql.$strain_result[$n].",";
//     }
// }
// $serverName = "localhost";
// $connectionInfo = array( "UID"=>"SA", "PWD"=>"XXXXXX");
// $conn = sqlsrv_connect( $serverName, $connectionInfo); 
// $query = "USE ArduinoDB";
// $result = sqlsrv_query($conn, $query);
// $query = "INSERT INTO  Temperature_table VALUES".$Temperature_values_sql;
// $result = sqlsrv_query($conn, $query);
// $query = "INSERT INTO  pressure_table VALUES".$pressure_values_sql;
// $result = sqlsrv_query($conn, $query);
// $query = "INSERT INTO  strain_table VALUES".$strain_values_sql;
// $result = sqlsrv_query($conn, $query);

/////////////////////////////
require('chartClass.php');
$chart= new Chart(1200,600,30);
$chart->backgroundColor(200,200,200);
$chart->X_Y_Max_PV(100,10);
// $chart->X_Y_Max_MF(7,200);
$chart->units_PV(10,1);
// $chart->units_MF(0.7,20);
$chart->X_Y_Label_PV("v","p");
// $chart->X_Y_Label_MF("phi","MF");
// $chart->chartDrawing_MF($Mf_phi);
$chart->full_chart_PV ($P_V);
// $chart->Temperature1(number_format($Temperature1_converted, 1, '.', ''));
// $chart->Temperature2(number_format($Temperature2_converted, 1, '.', ''));
// $chart->Temperature3(number_format($Temperature3_converted, 1, '.', ''));
$chart->Integral_PV(number_format($P_V_integral, 1, '.', ''));
// $chart->Integral_MF(number_format($Mf_phi_integral, 1, '.', ''));
$chart->show();
/////////////////////////////

?>
