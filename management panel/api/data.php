<?php
header('Content-Type: application/json');
$mysqli=new mysqli("localhost","root", "","mobile_payment") or die('error with connection');

$query=sprintf("SELECT * FROM mobile_payments ");
$result=$mysqli->query($query);
$data= array();
foreach($result as $row){
$data[] = $row;
}
$result->close();
$mysqli -> close();

print json_encode($data);

?>