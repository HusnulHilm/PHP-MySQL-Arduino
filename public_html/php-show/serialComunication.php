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
    exec("  stty -F ".$this->_device." cs8 ". $this->_BaudRate." ignbrk -brkint -imaxbel -opost -onlcr -isig -icanon -iexten -echo -echoe -echok -echoctl -echoke noflsh -ixon -crtscts 2>&1", $output, $return);
    $this->_dHandle=fopen($this->_device, "w+");
}

function sendMessage ($message)
{
    $test=fwrite( $this->_dHandle,$message);
    return $test; 
   
}
function readMessage ($int)
{
    $message=fread($this->_dHandle,$int);
    return $message; 
}
function readMessageByLine ()
{
    $message=fgets($this->_dHandle);
    return $message; 
}

function deviceClose()
{ 
    fclose($this->_dHandle);
}
}
?>