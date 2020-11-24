<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config/bd.php";
include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST" ){  
  //получить данные из пост запроса и записать их в переменные
  $login = $_POST['login'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $additional_mail = $_POST['additionalMail'];
  $birth_date = $_POST['birthDate'];
  $city = $_POST['city'];
  $idUser = $_COOKIE['user_id'];
  //запрос на обновление данных пользователя
  $sql = "UPDATE `users` SET `login` = '$login',`name` = '$name',`email` = '$email',`phone` = '$phone',`additional_mail` = '$additional_mail', `birthdate` = '$birth_date', `city` = '$city' WHERE `users`.`id` = '$idUser'";
  $result = mysqli_query($connect, $sql) or die("Ошибка " . mysqli_error($connect));   
}
//если существует куки user_id
if(isset($_COOKIE['user_id'])){
  //запрос выбрать всех пользователей с данным id
  $sql = "SELECT * FROM users WHERE id=" . $_COOKIE['user_id'];
  $result = mysqli_query($connect, $sql) or die("Ошибка " . mysqli_error($connect));
  $dataUser = mysqli_fetch_assoc($result);
}
?>
<section class="section" id="call-to-action2">
  <div class="container">
    <div class="row ">
      <div class="col-lg-3 offset-lg-0 myphotoarea editPersonaldata">          
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/modules/personalArea/dataPersonalArea.php";
        ?>
      </div> 
      <div class="col-lg-9 offset-lg-0 myphotoarea">
      	<h2>История покупок</h2>
      	<table class="table table-dark table-my1">
          <thead>
            <tr>
              <th id="number1" scope="col">Наименование</th>
              <th id="number2" scope="col">Описание</th>
              <th id="number3" scope="col">Количество</th>
            </tr>
          </thead>
        </table >
          <?php
               //запрос выбрать все заказы по id пользователя с сортировкой(сначала новые)
              $sql = "SELECT * FROM orders WHERE user_id=" . $_COOKIE['user_id'] . " ORDER BY created_at DESC";
              $result = mysqli_query($connect, $sql) or die("Ошибка " . mysqli_error($connect));
              //цикл бежит по всем выбранным заказам
              while ($row = mysqli_fetch_assoc($result)) {    
                ?>
                <!-- вывод времени когда совершен заказ -->
                <div class="timeOrder"><?php echo $row['created_at'] ?></div>
                <?php

                //преобразовать данные из таблицы orders поле products из формата json в массив
                $basket = json_decode($row['products'], true);
                //цикл выводит данные о заказах
                for ($i=0; $i < count( $basket['basket'] ); $i++) { 
                  //запрос выбрать продукт по id 
                  $sql = "SELECT * FROM products WHERE id = ".$basket['basket'][$i]['product_id'];
                  $result1 = $connect->query($sql);
                  $product = mysqli_fetch_assoc($result1);
                  ?>
                  <!-- вывод данных о продукте -->
                  <table class="table table-dark table-my1">
                    <tbody> 
                      <tr>
                        <td id="number1"><?php echo $product['title'] ?></td>
                        <td id="number2" ><?php echo $product['descriptions'] ?></td>
                        <td id="number3"><?php echo $basket['basket'][$i]['count'] ?></td>
                      </tr>
                    </tbody>
                  </table >
                  <?php 
                }

              } 
          ?>
               <!-- вывод данных о продукте -->
      </div> 
    </div>
  </div>
</section>
<?php				
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";  
?>				
		  		