<?php 
 // Покдлючение к базе данных
  include $_SERVER['DOCUMENT_ROOT'] . '/config/bd.php';
// Условие проверяет был ли отправлен  POST запрос если нет 3будет ворнинг 
  if (isset($_POST) AND $_SERVER['REQUEST_METHOD'] == 'POST') {
// Выбираем продукт с базы данных
$sql = "SELECT * FROM products WHERE id=" . $_POST['id'];
$result = mysqli_query($connect, $sql);
$product = mysqli_fetch_assoc($result);

//Преобразовываем JSON обратно в масив , обязательный параметр true преоразовывает в простой масив
//Добавление в корзину, проверяет или в корзине уже что то есть
if(isset($_COOKIE['basket'])) {
 
  $basket = json_decode($_COOKIE['basket'], true);


/* Условие проверяет если товар который попал в корзину , имеет такой же id как товар который уже естьв корзине
   мы с помощью цикла увеличиваем его на 1*/
   $issetProduct = 0;
 
   for($i = 0; $i < count($basket["basket"]); $i++) {
    if($basket["basket"][$i]["product_id"] == $product["id"]) {
       $basket["basket"][$i]["count"]++;
       
       $issetProduct = 1;
      } 
    } // Если такого товара не , добавляем его в корзину
      if($issetProduct != 1) {
        $basket["basket"][] = [
          "product_id" => $product["id"],
          "costs" => $product['cost'],
          "count" => 1
        ];
      }
} else {
  // Добавляем в корзину если она пустая
  $basket = [ "basket" => [
    ["product_id" => $product["id"],
    "costs" => $product['cost'],
    "count" => 1]
  ] ];
}

 //Преобразовываем масив в формат JSON - JavaScript Object Notification
$jsonProduct = json_encode($basket);

//Удаляем куки
setcookie('basket', "" , 0 , "/");
//Записываем наш товар в куки, передаём ему json формат товара, "/" - значит віводиться на всех страницах
setcookie('basket', $jsonProduct, time() + 60*60, "/");

// Выводим количество елементов, функция count считает в масиве
echo $jsonProduct;


}
