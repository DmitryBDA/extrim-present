<?php
//подключение к базе данных
include $_SERVER['DOCUMENT_ROOT'] . "/config/bd.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Extreme-present</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-training-studio.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="lips/fontawesome/all.min.css">

    </head>
    
    <body>
    
   
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
         <?php
            //если существует куки user_id
            if(isset($_COOKIE['user_id'])){
                //выбрать всех пользователей по id
                $sql = "SELECT * FROM users WHERE id='". $_COOKIE['user_id'] ."'";
                $resultDate = $connect->query($sql);
                $dataUser = mysqli_fetch_assoc($resultDate);
                
                ?>
                <!-- вывод ссылки на личный кабине -->
                <div class="cabinet">
                    <a href="PersonalArea.php">Личный кабинет</a>
                </div>
                <?php
                //если поле admin имеет значение 1 то вывести ссылку на переход в админку
                if($dataUser['admin'] == 1){
                ?>
                <div class="admin">
                    <a href="/admin/index.php">Админка</a>
                </div>
                <?php
                }
            } else {
               
            }
            ?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Экстрим<em>Подарок</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Главная</a></li>
                            <li class="scroll-to-section"><a href="#features">О нас</a></li>
                            <li class="scroll-to-section"><a href="products.php">каталог</a></li>
                            <li class="scroll-to-section"><a href="#our-classes">Акции</a></li>
                           <!--  <li class="scroll-to-section"><a href="#schedule">stocks</a></li> -->
                            <li class="scroll-to-section"><a href="delivery.php">Доставка и оплата</a></li> 
                            <li class="scroll-to-section"><a href="#contact-us">контакты</a></li> 
                            <li class="scroll-to-section">
                                <a id="basketColl" href="basket.php">
                                    <img id="basket" src="assets/images/basket.png">
                                    <?php
                                        //подсчёт количества продуктов в куки basket и вывод в корзину
                                        $countProducts = 0;
                                        //если существует куки баскет, то 
                                        if(isset($_COOKIE['basket'])){
                                        //преобразовать данные в куки из json в массив
                                          $basket = json_decode($_COOKIE['basket'], true);
                                          //цикл считает количество товара
                                          for ($i=0; $i < count($basket['basket']); $i++) {
                                            $countProducts = $countProducts + $basket['basket'][$i]['count'];
                                          }
                                        }
                                      ?>
                                    <span id="#go-basket"><?php echo $countProducts; ?></span>
                                </a>
                            </li> 
                            <?php
                            if(isset($_COOKIE['user_id'])){
                                ?>
                                <li class="main-button">
                                    <a href="exit.php">Exit <?php 
                                        $user_id = mysqli_fetch_assoc( $connect->query( "SELECT * FROM users WHERE id = '". $_COOKIE['user_id'] ."'" ) );
                                        echo $user_id['login'];?></a>
                                </li>
                                
                                <?php
                            } else {
                                ?>
                                <li class="main-button"><a href="register.php">Зарегистрироваться</a></li>
                                <?php
                            }
                            ?>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->