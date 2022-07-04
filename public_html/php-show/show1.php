<?php
require('chartClass.php');
$chart= new Chart(1200,600,30);
$chart->backgroundColor(200,200,200);
$chart->X_Y_Max_PV(100,10);
$chart->X_Y_Max_MF(7,200);
$chart->units_PV(10,1);
$chart->units_MF(0.7,20);
$chart->X_Y_Label_PV("v","p");
$chart->X_Y_Label_MF("phi","MF");
$chart->chartDrawing_MF($Mf_phi);
$chart->full_chart_PV ($P_V);
$chart->Temperature1(number_format($Temperature1_converted, 1, '.', ''));
$chart->Temperature2(number_format($Temperature2_converted, 1, '.', ''));
$chart->Temperature3(number_format($Temperature3_converted, 1, '.', ''));
$chart->Integral_PV(number_format($P_V_integral, 1, '.', ''));
$chart->Integral_MF(number_format($Mf_phi_integral, 1, '.', ''));
$chart->show();
?>