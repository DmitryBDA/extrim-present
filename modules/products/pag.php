<?php 
   // Покдлючение к базе данных
   include $_SERVER['DOCUMENT_ROOT'] . '/config/bd.php';
 /*-----------Выбираем товары с базы данных-----*/

 // количество товаров на странице
 $chislo = 7;

 /*-----------Выбираем товары с базы данных----*/
 $sql = "SELECT * FROM products";
 $result = mysqli_query($connect, $sql);
// Считаем кол-во записей в таблице
$num_rows = mysqli_num_rows($result);

//Теперь вычисляем сколько товаров должно показываться на страничке
//Общее кол-во строк делим на 6 и с помощью ceil округляем до большего в итоге получаем сколько выводить товаров
$num_rows = ceil($num_rows/$chislo); 

//Проверяем на какой страничке пользыватель находиться и записываем в переменую $nav
if(isset($_GET["str"]) ) {
    $nav = $_GET["str"];
} else {
    $nav = 0;
}

//Выделяем целую часть $_GET["str"]
$nav = intval($nav);

// Отделяем навигацию от контента
// echo "< hr /> " ; 
// Выводим товары постранично
if(!isset($_GET["str"])) {
    $str = 0 ;
} else {
    $str = $_GET["str"]*$chislo - $chislo;
}
// Формируем запрос нужной нам части информации
$sql = "SELECT * FROM products ORDER BY RAND() LIMIT $str , $chislo";
$result = mysqli_query($connect, $sql);

 while ($row = mysqli_fetch_assoc($result)) {
   // Подключаем старничку с  карточками товаров
   include  $_SERVER['DOCUMENT_ROOT'] .  "/parts/product_card.php";
 }

?>