<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Abwechselnde Zeilenfarben</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.tableLine
{
    font-family:      Verdana,Arial,sans-serif;
    font-style:       normal;
    font-size:        9px;
    BORDER-TOP:       #A6A6A6 1px solid; 
    BORDER-LEFT:      #A6A6A6 1px solid; 
    BORDER-BOTTOM:    #A6A6A6 1px solid;
    BORDER-RIGHT:     #A6A6A6 1px solid;
}
.row_0 {
    background-color:        #FFFFFF;
}
.row_1 {
    background-color:        #E1E8F1;
}
-->
</style>
</head>
<body>
<table width="300" border="0" cellpadding="0" cellspacing="0" 
    class="tableLine">
<?PHP
  for($i=0;$i<=9;$i++){
?>
  <tr>
    <td class="row_<?PHP echo $i % 2; ?>">Reihe <?PHP echo $i; ?></td>
  </tr>
<?PHP
  }
?>
</table>
</body>
</html>