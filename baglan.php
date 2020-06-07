<?php 
$username="root";
$password="12345678";
$servername="localhost";
$database="kds";


$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn) 
{
	die ("Baglantı hatası" .mysqli_connect_error());
}

?>