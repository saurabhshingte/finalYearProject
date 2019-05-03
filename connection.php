<?php
$servername ='localhost';
$username='root';
$password='';
$dbname='Project';

$conn=mysqli_connect($servername,$username,$password,$dbname);
if ($conn) {
	echo "connection okay";
}
else{
	echo "connection failed";
}

?>
