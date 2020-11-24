
   <img src="assets/images/user.jpg" alt="waves">
<form action="" method="POST">
   <h4>Логин</h4>
  <?php 
   if( $dataUser['login'] !== "" ){
  ?>
    <p><?php echo $dataUser['login'] ?></p>
    <input type="hidden" name="login" value="<?php echo $dataUser['login'] ?>" ></input>
    <?php
   }else{
  ?>
    <p><input name="login" value="" placeholder="Введите логин"></input></p>
    <?php
   }
  ?>

  <h4>Имя</h4>
  <?php 
   if( $dataUser['name'] !== "" ){
  ?>
    <p><?php echo $dataUser['name'] ?></p>
    <input type="hidden" name="name" value="<?php echo $dataUser['name'] ?>" ></input>
    <?php
   }else{
  ?>
    <p><input name="name" value="" placeholder="Введите Имя"></input></p>
    <?php
   }
  ?>
  
   <h4>Почта</h4>
   <?php 
   if( $dataUser['email'] !== "" ){
  ?>
    <p><?php echo $dataUser['email'] ?></p>
    <input type="hidden" name="email" value="<?php echo $dataUser['email'] ?>" ></input>
    <?php
   }else{
  ?>
    <p><input name="email" value="" placeholder="Введите email"></input></p>
    <?php
   }
  ?>
  
   <h4>Телефон</h4>
   <?php 
   if( $dataUser['phone'] !== "" ){
  ?>
    <p><?php echo $dataUser['phone'] ?></p>
    <input type="hidden" name="phone" value="<?php echo $dataUser['phone'] ?>" ></input>
    <?php
   }else{
  ?>
    <p><input name="phone" value="" placeholder="Введите телефон"></input></p>
    <?php
   }
  ?>
  
   <h4>Дополнительная почта</h4>
   <?php if( $dataUser['additional_mail'] !== "" ){
  ?>
    <p><?php echo $dataUser['additional_mail'] ?></p>
    <input type="hidden" name="additionalMail" value="<?php echo $dataUser['additional_mail'] ?>" ></input>
    <?php
   }else{
  ?>
    <p><input name="additionalMail" value="" placeholder="Введите доп. mail"></input></p>
    <?php
   }
   ?>
   
   <h4>Дата рождения</h4>
   <?php if( $dataUser['birthdate'] !== "" ){
  ?>
    <p><?php echo $dataUser['birthdate'] ?></p>
    <input type="hidden" name="birthDate" value="<?php echo $dataUser['birthdate'] ?>" ></input>
    <?php
   }else{
  ?>
    <p><input name="birthDate" value="" placeholder="Введите дату рождения"></input></p>
    <?php
   }
   ?>
  
   <h4>Город</h4>
   <?php if( $dataUser['city'] !== "" ){
  ?>
    <p><?php echo $dataUser['city'] ?></p>
     <input type="hidden" name="city" value="<?php echo $dataUser['city'] ?>" ></input>
    <?php
   }else{
  ?>
    <p><input name="city" value="" placeholder="Введите город"></input></p>
    <?php
   }
   ?>
   <button class="btn btn-danger mybtnpersonal">Сохранить</button> <button onclick="editDataUser()" class="btn btn-danger mybtnpersonal">Редактировать</button>
</form>
        