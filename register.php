<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/config/bd.php";


if(isset($_GET["u_code"])){
    $sql = "SELECT * FROM users WHERE confirm_mail='". $_GET["u_code"] ."'";
    $result = $connect->query($sql);

    if($result->num_rows > 0){
        $user = mysqli_fetch_assoc($result);
        $sql = "UPDATE `users` SET `is_verified` = '1' WHERE `users`.`id` =". $user["id"];
        if($connect->query($sql)){
            // echo "User verified";
        }
    }
}

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
    //register
    $u_code = generateRandomString(20);

    $sql = "SELECT * FROM users WHERE phone='". $_POST['phone'] ."'";
    $resultClient = $connect->query($sql);
    $userClient = mysqli_fetch_assoc($resultClient);
   
    if($userClient){
        $sql = "UPDATE `users` SET `login` = '". $_POST['username'] ."',`email` = '". $_POST['email'] ."', `pass` = '". $_POST['pass'] ."', `confirm_mail` = '". $u_code ."' WHERE `users`.`id` =". $userClient["id"];
       $result = $connect->query($sql);

       $user_d = mysqli_fetch_assoc($result);

        if($result){
            setcookie("user_id", $user_d["id"], "/");
            //var_dump($_COOKIE["user_id"]);
            $link = "<a href='http://extreme-present.local/register.php?u_code=$u_code'>Confirm</a>";
            mail($_POST['email'], 'Register', $link);
            header("Location: re_register.php");
        }

    }else{
       

         //запросы проверка есть ли введенный email в базе данных
        $sql = "SELECT * FROM users WHERE email LIKE  '". $_POST['email'] ."'";
        $resul = $connect->query($sql);
        $issetEmail = mysqli_fetch_assoc($resul);
        //запросы проверка есть ли введенный логин в базе данных
        $sql = "SELECT * FROM users WHERE login LIKE  '". $_POST['username'] ."'";
        $resultil = $connect->query($sql);
        $issetLogin = mysqli_fetch_assoc($resultil);

       
       if($issetEmail){
        echo "email занят";
       }else if($issetLogin){
        echo "Имя занято";
       }else{
            $result = $connect->query("INSERT INTO users(`login`, `pass`, `email`, `phone`, `confirm_mail`) VALUES ('". $_POST['username'] ."', '". $_POST["pass"] ."', '". $_POST['email'] ."', '". $_POST['phone'] ."','$u_code')");
           // var_dump($result);
            $user_d = mysqli_fetch_assoc($result);

            if($result){
                setcookie("user_id", $user_d["id"], "/");
                //var_dump($_COOKIE["user_id"]);
                $link = "<a href='http://extreme-present.local/register.php?u_code=$u_code'>Confirm</a>";
                mail($_POST['email'], 'Register', $link);
                header("Location: re_register.php");
            }
       }
    }


    

}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
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
    
        <!-- ***** Preloader Start ***** -->
        
        <!-- ***** Preloader End ***** -->
        
        
        <!-- ***** Header Area Start ***** -->
        <header class="header-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="index.php" class="logo">Экстрим<em>Подарок</em></a>
                            <!-- ***** Logo End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ***** Header Area End ***** -->
        <!-- ***** Main Banner Area Start ***** -->
        <div class="main-banner" id="top">
            <video autoplay muted loop id="bg-video">
                <source src="assets/images/gym-video.mp4" type="video/mp4" />
            </video>

            <div class="video-overlay header-text">
                <div class="caption">
                <form method="POST"> 
                    <div class="login">
                        <p>Логин</p>
                        <input type="text" name="username">
                    </div>
                    <div class="email">
                        <p>Почта</p>
                        <input type="text" name="email">
                    </div>
                    <div class="phone">
                        <p>Номер телефона</p>
                        <input type="text" name="phone">
                    </div>
                    <div class="pass">
                        <p>Пароль</p>
                        <input type="password" name="pass">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Зарегистрироваться</button>
                    <p>Уже есть аккаунт? <span><a href="login.php">Войти</a></span></p>
                </form>
                </div>
            </div>
        </div>
    <!-- ***** Main Banner Area End ***** -->
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/main.js"></script>

    </body>
</html>