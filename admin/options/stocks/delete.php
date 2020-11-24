<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

$sql = "DELETE FROM `stocks` WHERE id=". $_GET["id"];

$result = $connect->query($sql);

if($result){
	header("Location: /admin/stocks.php");
}


?>