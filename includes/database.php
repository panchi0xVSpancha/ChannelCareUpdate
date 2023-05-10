<?php
$dbserver='localhost';
$dbuser='root';
$dbname='damsmsdb';
$dbpass='';

$connection =mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);

// if(mysqli_connect_error($connection)){
//     die.mysqli_connect_errno();
// }
if(mysqli_connect_errno($connection)) {
    die("Connection failed: " . mysqli_connect_error());
}
?>