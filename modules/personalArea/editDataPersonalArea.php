<?php
  include $_SERVER['DOCUMENT_ROOT'] . "/config/bd.php";

    $sql = "SELECT * FROM users WHERE id=" . $_COOKIE['user_id'];
    $result = mysqli_query($connect, $sql) or die("Ошибка " . mysqli_error($connect));
    $dataUser = mysqli_fetch_assoc($result);
?>



<img src="assets/images/user.jpg" alt="waves">
  <form action="" method="POST">
    <h4>Логин</h4>
     
    <p><input name="login" value="<?php echo $dataUser['login'] ?>" ></input></p>

    <h4>Имя</h4>
     
    <p><input name="name" value="<?php echo $dataUser['name'] ?>" ></input></p>

     <h4>Почта</h4>
    
    
      <p><input name="email" value="<?php echo $dataUser['email'] ?>" ></input></p>
     
    
     <h4>Телефон</h4>
     
  
      <p><input  name="phone" value="<?php echo $dataUser['phone'] ?>" ></input></p>
      
     <h4>Дополнительная почта</h4>
     
 
      <p><input  name="additionalMail" value="<?php echo $dataUser['additional_mail'] ?>" ></input></p>
      
     <h4>Дата рождения</h4>
     
    
      <p><input  name="birthDate" value="<?php echo $dataUser['birthdate'] ?>" ></input></p>
      
     <h4>Город</h4>
     
  
       <p><input  name="city" value="<?php echo $dataUser['city'] ?>" ></input></p>
     
     <button class="btn btn-danger mybtnpersonal">Сохранить</button> <button  class="btn btn-danger mybtnpersonal">Редактировать</button>
  </form>
            