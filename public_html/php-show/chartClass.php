<?php
class Chart
{
    var $_chart = null;
    var $_Total_Width = null;
    var $_Total_Height = null;
    var $_chart1_Width = null;
    var $_chart2_Width = null;
    var $_chart1_Height = null;
    var $_chart2_Height = null;
    var $_chart1_X0 = null;
    var $_chart2_X0 = null;
    var $_chart1_Y0 = null;
    var $_chart2_Y0 = null;
    var $_unitWidth1= null;
    var $_unitWidth2 = null;
    var $_unitHeight1 = null;
    var $_unitHeight2 = null;
    var $_Spacing = null;
    var $_backgroundColor  = null;
    var $_red = null;
    var $_white = null;
    var $_blue = null;
    var $_black = null;
    var $_Xmax_PV = null;
    var $_Ymax_PV = null;
    var $_Xmax_MF = null;
    var $_Ymax_MF = null;
    var $_val  = null;
    var $_3rd_rectangle_Height= 80;
    var $_scaled_X  = null;
    var $_scaled_Y   = null;
function Chart ($Total_Width,$Total_Height,$Spacing)
{
    $this->_Total_Width=$Total_Width;
    $this->_Total_Height=$Total_Height;
    $this->_Spacing=$Spacing;
    $this->_chart =imagecreate($Total_Width,$Total_Height);
    $this->_red=imagecolorallocate($this->_chart,255,0,0);
    $this->_white=imagecolorallocate($this->_chart,255,255,255);
    $this->_black=imagecolorallocate($this->_chart,0,0,0);
    $this->_blue=imagecolorallocate($this->_chart,0,0,255);
    imagefill($this->_chart,0,0,$this->_white);
} 
function backgroundColor ($red,$green,$blue)
{ 
    $this->_backgroundColor=imagecolorallocate($this->_chart,$red,$green,$blue);
    imagefilledrectangle($this->_chart,$this->_Spacing, $this->_Spacing, (($this->_Total_Width - 3 * $this->_Spacing)/2)+$this->_Spacing, $this->_Total_Height-2*$this->_Spacing-$this->_3rd_rectangle_Height, $this->_backgroundColor);
    imagefilledrectangle($this->_chart, (($this->_Total_Width - 3 * $this->_Spacing)/2)+2*$this->_Spacing, $this->_Spacing, $this->_Total_Width-$this->_Spacing, $this->_Total_Height-2*$this->_Spacing-$this->_3rd_rectangle_Height, $this->_backgroundColor);
    imagefilledrectangle($this->_chart, $this->_Spacing, $this->_Total_Height-$this->_Spacing-$this->_3rd_rectangle_Height, $this->_Total_Width- $this->_Spacing, $this->_Total_Height-$this->_Spacing, $this->_backgroundColor);
    $this->_chart1_Width = (($this->_Total_Width - 3 * $this->_Spacing)/2);
    $this->_chart2_Width = (($this->_Total_Width - 3 * $this->_Spacing)/2);
    $this->_chart1_Height = $this->_Total_Height-3*$this->_Spacing-$this->_3rd_rectangle_Height;
    $this->_chart2_Height = $this->_Total_Height-3*$this->_Spacing-$this->_3rd_rectangle_Height;
    $this->_chart1_X0 = $this->_Spacing;
    $this->_chart2_X0 = (($this->_Total_Width - 3 * $this->_Spacing)/2)+2*$this->_Spacing;
    $this->_chart1_Y0 = $this->_Total_Height-2*$this->_Spacing-$this->_3rd_rectangle_Height;
    $this->_chart2_Y0 = $this->_Total_Height-2*$this->_Spacing-$this->_3rd_rectangle_Height-$this->_chart2_Height/2;
}
function X_Y_Max_PV ($x,$y)
{ 
    $this->_Xmax_PV  = $x;
    $this->_Ymax_PV  = $y;
} 
function X_Y_Max_MF ($x,$y)
{ 
    $this->_Xmax_MF  = $x;
    $this->_Ymax_MF  = $y;
} 

function units_PV ($Width,$Height)
{ 
    $this->_unitWidth1 =$this->_chart1_Width/($this->_Xmax_PV/$Width);
    $this->_unitHeight1  = $this->_chart1_Height/($this->_Ymax_PV/$Height);
    imageline($this->_chart, $this->_Spacing, $this->_Spacing, $this->_chart1_X0, $this->_chart1_Y0, $this->_black);
    imageline($this->_chart,  $this->_chart1_X0,$this->_chart1_Y0, $this->_chart1_X0+$this->_chart1_Width, $this->_chart1_Y0, $this->_black);
    $this->_val=$this->_chart1_X0+$this->_unitWidth1;
    while($this->_val <= ($this->_chart1_X0+$this->_chart1_Width)) {
        $font_path = './arial.ttf';
        imageline($this->_chart, $this->_val,$this->_Spacing,$this->_val, $this->_chart1_Y0,  $this->_blue);
        imagettftext($this->_chart,9, 0,$this->_val-10,$this->_chart1_Y0+10,  $this->_black, $font_path,number_format((( $this->_val-$this->_Spacing)*$this->_Xmax_PV)/($this->_chart1_Width), 1, '.', ''));
        $this->_val= $this->_val+$this->_unitWidth1;
    } 
    $this->_val=$this->_chart1_Y0-$this->_unitHeight1;
    while($this->_val >= $this->_Spacing) {
        $font_path = './arial.ttf';
        imageline($this->_chart, $this->_Spacing,$this->_val,$this->_Spacing+$this->_chart1_Width, $this->_val, $this->_blue);
        imagettftext($this->_chart,9, 0,$this->_chart1_X0-25,$this->_val+10, $this->_black, $font_path, number_format((($this->_chart1_Height-$this->_val+$this->_Spacing)*$this->_Ymax_PV)/($this->_chart1_Height), 1, '.', ''));
        $this->_val= $this->_val-$this->_unitHeight1;
    } 
} 

function units_MF ($Width,$Height)
{ 
    $this->_unitWidth2 =$this->_chart2_Width/($this->_Xmax_MF/$Width);
    $this->_unitHeight2  = $this->_chart2_Height/($this->_Ymax_MF/$Height);
    imageline($this->_chart, $this->_chart2_X0+$this->_chart2_Width, $this->_chart2_Y0, $this->_chart2_X0, $this->_chart2_Y0, $this->_black);
    imageline($this->_chart,  $this->_chart2_X0,$this->_chart2_Y0+$this->_chart2_Height/2, $this->_chart2_X0,$this->_Spacing, $this->_black);
    $this->_val=$this->_chart2_X0+$this->_unitWidth2;
    while($this->_val <= ($this->_chart2_X0+$this->_chart2_Width)) {
        $font_path = './arial.ttf';
        imageline($this->_chart, $this->_val,$this->_Spacing,$this->_val, $this->_chart2_Y0+$this->_chart2_Height/2,  $this->_blue);
        imagettftext($this->_chart,9, 0,$this->_val-10,$this->_chart1_Y0+10,  $this->_black, $font_path,number_format((( $this->_val-$this->_chart2_X0)*$this->_Xmax_MF)/($this->_chart2_Width), 1, '.', ''));
        $this->_val= $this->_val+$this->_unitWidth2;
    } 
    $this->_val=$this->_chart2_Y0+$this->_chart2_Height/2;
    while($this->_val > $this->_chart2_Y0) {
        $font_path = './arial.ttf';
        imageline($this->_chart, $this->_chart2_X0,$this->_val,$this->_chart2_X0+$this->_chart2_Width, $this->_val, $this->_blue);
        imagettftext($this->_chart,9, 0,$this->_chart2_X0-25,$this->_val, $this->_black, $font_path,number_format((-($this->_val-$this->_chart2_Y0)*$this->_Ymax_MF)/($this->_chart2_Height), 1, '.', ''));
        $this->_val= $this->_val-$this->_unitHeight2;
    } 
    $this->_val=$this->_chart2_Y0-$this->_unitHeight2;
    while($this->_val >= $this->_Spacing) {
        $font_path = './arial.ttf';
        imageline($this->_chart, $this->_chart2_X0,$this->_val,$this->_chart2_X0+$this->_chart2_Width, $this->_val, $this->_blue);
        imagettftext($this->_chart,9, 0,$this->_chart2_X0-25,$this->_val, $this->_black, $font_path,number_format((-($this->_val-$this->_chart2_Y0)*$this->_Ymax_MF)/($this->_chart2_Height), 1, '.', ''));
        $this->_val= $this->_val-$this->_unitHeight2;
    } 
}

function X_Y_Label_PV ($xLabel,$yLabel)
{ 
    $font_path = './arial.ttf';
    imagettftext($this->_chart,16, 0,$this->_Spacing-15,$this->_Spacing-15, $this->_black, $font_path, $yLabel);
    imagettftext($this->_chart,16, 0, $this->_chart1_X0 + $this->_chart1_Width-20 ,$this->_chart1_Y0 +20, $this->_black, $font_path, $xLabel);
} 
function X_Y_Label_MF ($xLabel,$yLabel)
{ 
    $font_path = './arial.ttf';
    imagettftext($this->_chart,16, 0,$this->_Spacing+$this->_chart2_Width,$this->_Spacing-15, $this->_black, $font_path, $yLabel);
    imagettftext($this->_chart,16, 0, $this->_chart2_X0 + $this->_chart2_Width-20 ,$this->_chart2_Y0 +25+$this->_chart2_Height/2, $this->_black, $font_path, $xLabel);
} 
function chartDrawing_MF ($array)
{
    $count=count($array);  
    for($n = 0; $n < $count; $n++){ 
        if ($n == ($count-1)) {

        } else {
            $this->scale_MF ($array[$n][0],$array[$n][1]);
            $X_1=$this->_scaled_X;
            $Y_1=$this->_scaled_Y;
            $this->scale_MF ($array[$n+1][0],$array[$n+1][1]);
            $X_2=$this->_scaled_X;
            $Y_2=$this->_scaled_Y;
            imageline($this->_chart,$X_1, $Y_1,$X_2, $Y_2, $this->_red);    
        }
    } 
} 
function scale_MF ($x,$y)
{ 
    $this->_scaled_X= $this->_chart2_X0+($x*($this->_chart2_Width))/$this->_Xmax_MF;
    $this->_scaled_Y= $this->_chart2_Y0-($y*($this->_chart2_Height))/$this->_Ymax_MF; 

}
function scale_PV ($x,$y)
{ 
    $this->_scaled_X= $this->_chart1_X0+($x*($this->_chart1_Width))/$this->_Xmax_PV;
    $this->_scaled_Y= $this->_chart1_Y0-($y*($this->_chart1_Height))/$this->_Ymax_PV; 

}
function Temperature1($T)
{  
    $font_path = './arial.ttf';
    imagettftext($this->_chart,14, 0,2*$this->_Spacing,$this->_Total_Height-$this->_Spacing-$this->_3rd_rectangle_Height/2, $this->_black, $font_path,"Temperature 1: ".$T." C°");
}
function Temperature2($T)
{  
    $font_path = './arial.ttf';
    imagettftext($this->_chart,14, 0,2*$this->_Spacing+($this->_Total_Width-2*$this->_Spacing)/5,$this->_Total_Height-$this->_Spacing-$this->_3rd_rectangle_Height/2, $this->_black, $font_path,"Temperature 2: ".$T." C°");
}
function Temperature3($T)
{  
    $font_path = './arial.ttf';
    imagettftext($this->_chart,14, 0,2*$this->_Spacing+2*($this->_Total_Width-2*$this->_Spacing)/5,$this->_Total_Height-$this->_Spacing-$this->_3rd_rectangle_Height/2, $this->_black, $font_path,"Temperature 3: ".$T." C°");
}
function Integral_PV($I)
{  
    $font_path = './arial.ttf';
    imagettftext($this->_chart,14, 0,2*$this->_Spacing+3*($this->_Total_Width-2*$this->_Spacing)/5,$this->_Total_Height-$this->_Spacing-$this->_3rd_rectangle_Height/2, $this->_black, $font_path,"Integral_PV: ".$I);
}
function Integral_MF($I)
{  
    $font_path = './arial.ttf';
    imagettftext($this->_chart,14, 0,2*$this->_Spacing+4*($this->_Total_Width-2*$this->_Spacing)/5,$this->_Total_Height-$this->_Spacing-$this->_3rd_rectangle_Height/2, $this->_black, $font_path,"Integral_MF: ".$I);
}
function full_chart_PV ($array)
{
    $count=count($array);  
    for($n = 0; $n < $count; $n++){ 
        $this->scale_PV ($array[$n][0],$array[$n][1]);
        $scaledArray[]=$this->_scaled_X;
        $scaledArray[]=$this->_scaled_Y;
    } 
    imagefilledpolygon ($this->_chart,$scaledArray,count($scaledArray)/2,$this->_red);
}
function show()
{ 
    header("Content-Type: image/gif");
    imagegif($this->_chart);
} 
} 
?>
