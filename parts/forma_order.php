<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/config/bd.php";
include $_SERVER['DOCUMENT_ROOT'] . "/modules/telegram/sendMessageTelegram.php";
 
  //если существует $_POST['submit'], и не пустые все поля name, address, phone_number
  if( isset($_POST['submit']) && !empty($_POST['inputName']) && !empty($_POST['inputAddress']) && !empty($_POST['inputPhoneNumber'])){

    //получить данные из пост запроса в переменные
    $name = $_POST['inputName'];
    $address = $_POST['inputAddress'];
    $phoneNumber = $_POST['inputPhoneNumber'];
    $products = $_COOKIE['basket'];
    
    $sql = "SELECT * FROM users WHERE phone LIKE  $phoneNumber";
    $result = mysqli_fetch_assoc( $connect->query($sql) );
   
    if($result){
      $user_id = $result['id'];
       
      // die();
      //запрос на добавление данных из пост запроса в базу данных
    $sql =  " INSERT INTO orders (user_id, products, address, name, phone ) VALUES ('$user_id','$products', '$address', '$name','$phoneNumber')";
    $connect->query($sql);
    //отправка сообщения в телеграм бот
    message_to_telegram('new order');
    //удалить куки basket
    
    setcookie("basket", '', 0, "/");
    //перенаправить на главную страницу
    header('Location: /');
    }else{
        $name = $_POST['inputName'];
        $address = $_POST['inputAddress'];
        $phoneNumber = $_POST['inputPhoneNumber'];
        $products = $_COOKIE['basket'];

        $sql =  " INSERT INTO users ( name, phone ) VALUES ('$name','$phoneNumber')";
        $connect->query($sql);

        $user_id  = $connect->insert_id;

        $sql =  " INSERT INTO orders (user_id, products, address, name, phone ) VALUES ('$user_id','$products', '$address', '$name','$phoneNumber')";
        $connect->query($sql);
        //удалить куки basket
        setcookie("basket", '', 0, "/");
        //перенаправить на главную страницу
        header('Location: /');
        //отправка сообщения в телеграм бот
        message_to_telegram('new order');
        
    }
    
    

  }
?>
