<?php
class phpSerial
{
    var $_device=null;
    var $_BaudRate= null; 
    var $_dHandle= null; 


function deviceSet ($device)
{ 
    $this->_device = $device;
  
}
function confBaudRate($BaudRate)
{ 
    $this->_BaudRate = $BaudRate;


}
function deviceOpen()
{ 
    exec("  stty -F ".$this->_device." cs8 ". $this->_BaudRate." ignbrk -brkint -imaxbel -opost -onlcr -isig -icanon -iexten -echo -echoe -echok -echoctl -echoke noflsh -ixon -crtscts ", $output, $return);
    $this->_dHandle=fopen($this->_device, "w+");
    sleep(1);  
}
function sendMessage ($str)
{
    fwrite( $this->_dHandle,$str);
   
}

}
?>
