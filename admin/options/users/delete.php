<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

$sql = "DELETE FROM `users` WHERE id=". $_GET["id"];

$result = $connect->query($sql);

if($result){
	header("Location: /admin/users.php");
}


?>