<?php

//include $_SERVER['DOCUMENT_ROOT'] . "/config/bd.php";

//если бал запрос пост
 if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){  

	if(isset($_COOKIE['basket'])){
		//преобразовать данные в куки из формата json в массив
		$basket = json_decode($_COOKIE['basket'], true);

		$id = $_POST['id'];

		$countProduct = $_POST['countProducts'];

			for ($i=0; $i < count($basket['basket']); $i++) { 
				if( $basket["basket"][$i]["product_id"] == $id ) {
					$basket["basket"][$i]["count"] = $countProduct;
					//$issetProduct = 1;
				}
			}


		//преобразовать данные из массива $basket в формат json
		$jsonProduct = json_encode($basket);
		//установить куки basket, на 60 мин
		setcookie("basket", $jsonProduct, time() + 60*60, "/");
		//вывод количества записей в массиве $basket
		echo $jsonProduct;
	
	}
}
?>