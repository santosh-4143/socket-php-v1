<?php
error_reporting(E_ALL);
$host    = "127.0.0.1";
$port    = 25003;
?>
<form action="" method="post">
<input type="text" name="string" placeholder="Enter a string to reverse" />
<input type="submit" name="submit" value="submit" /> 
</form>

<?php
$message = $_POST['string'];
echo "Message To server :".$message."</br>";
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// connect to server
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
// send string to server
socket_write($socket, $message, strlen($message)) or die("Could not send data to server as you not type anything.\n");
// get server response
$result = socket_read ($socket, 1024) or die("Could not read server response\n");
echo "Reply From Server  :".$result;
// close socket
socket_close($socket);
?>

