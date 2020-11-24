<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/config/bd.php";

if(isset($_POST["email"])){
    $result = $connect->query("SELECT * FROM users WHERE email='". $_POST['email'] ."'");
    $user_d = mysqli_fetch_assoc($result);
}

if(isset($_POST["submit"])){
    $link = "<a href='http://extreme-present.local/register.php?u_code=". $user_d["confirm_mail"] ."'>Confirm</a>";
    mail($_POST['email'], 'Register', $link);
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
                        <div class="re_email">
                            <p>На указанный вами адрес выслано письмо с ссылкой для прохождения верификации</p>
                            <p>Если письмо не пришло укажите свой адрес электронной почты</p>
                            <input type="text" name="email">
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">Отправить</button>
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