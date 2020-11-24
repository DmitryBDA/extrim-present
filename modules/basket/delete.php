<?php

 if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){ 

 	if(isset($_COOKIE['basket'])){
 		
 		//преобразовать данные в куки из формата json в массив
		$basket = json_decode($_COOKIE['basket'], true);

		for ($i=0; $i < count($basket['basket']); $i++) { 
			if($basket['basket'][$i]['product_id'] == $_POST['id']){
				unset($basket['basket'][$i]);
				sort($basket['basket']);
			}
		}

		//преобразовать данные из массива $basket в формат json
		//var_dump( $basket);
		$countProducts = 0;
		if(isset($_COOKIE['basket'])){
          for ($i=0; $i < count($basket['basket']); $i++) { 
            $countProducts = $countProducts + $basket['basket'][$i]['count'];
          }
        }

		$jsonProduct = json_encode($basket);

		//установить куки basket, на 60 мин
		setcookie("basket", $jsonProduct, time() + 60*60, "/");

		

        echo $countProducts;
	
 	}


 }