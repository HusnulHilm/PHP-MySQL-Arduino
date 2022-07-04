<?php
include("class/pData.class.php");
include("class/pDraw.class.php");
include("class/pImage.class.php");
include("class/pPie.class.php");
include("class/pIndicator.class.php");
$MyData = new pData();
$MyData->addPoints(array(171,73,58,75,180,200,400,500,163,152,145),"Probe 3");
 $MyData->setSerieWeight("Probe 3",2);
 $MyData->setAxisName(0,"Nombre de chômeurs");
$MyData->addPoints(array("2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011"),"Labels");
 $MyData->setSerieDescription("Labels","Années");
 $MyData->setAbscissa("Labels");
 $MyData->setPalette("Probe 3",array("R"=>255,"G"=>0,"B"=>0));
 $myPicture = new pImage(900,330,$MyData);
 $myPicture->drawRectangle(0,0,899,329,array("R"=>0,"G"=>0,"B"=>0));
 $myPicture->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>11));
 $myPicture->drawText(200,25,"Evolution du nombre de chômeurs",array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
 $myPicture->setFontProperties(array("FontName"=>"fonts/pf_arma_five.ttf","FontSize"=>6));
 $myPicture->setGraphArea(60,40,800,310);
 $scaleSettings = array("XMargin"=>10,"YMargin"=>10,"Floating"=>TRUE,"GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE);
 $myPicture->drawScale($scaleSettings);
 $myPicture->setFontProperties(array("FontName"=>"fonts/Bedizen.ttf","FontSize"=>6));
$TextSettings = array("DrawBox"=>TRUE,"BoxRounded"=>TRUE,"R"=>0,"G"=>0,"B"=>0,"Angle"=>90,"FontSize"=>10);
$myPicture->drawText(860,300,"Création : FabPlug.com - Tous droits réservés",$TextSettings);

$myPicture->drawAreaChart();
$myPicture->drawLineChart(); 
$myPicture->drawPlotChart(array("DisplayValues"=>TRUE,"PlotBorder"=>TRUE,"BorderSize"=>2,"Surrounding"=>-60,"BorderAlpha"=>80));
$myPicture->Render("img/evolution-du-chomage.png");
?>
