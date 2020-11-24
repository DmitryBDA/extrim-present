<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config/bd.php";
include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";

if(isset($_COOKIE['user_id'])){

    $sql = "SELECT * FROM users WHERE id=" . $_COOKIE['user_id'];
    $result = mysqli_query($connect, $sql) or die("Ошибка " . mysqli_error($connect));
    $dataUser = mysqli_fetch_assoc($result);
}

                          

?>
<section class="section" id="call-to-action1">
  <div class="container">
      <div class="row ">
        <div class="col-lg-10 offset-lg-1">
          <table class="table table-dark table-my">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Наименование</th>
                <th scope="col">Количество</th>
                <th scope="col">Увел/Умен</th>
                <th scope="col">Цена, $</th>
                <th scope="col">Удаление</th>
              </tr>
            </thead>
            <tbody>

              <?php
                    //если существует куки basket
                    if(isset($_COOKIE['basket'])){
                      //преобразовать данные в куки из формата json в массив
                    $basket = json_decode($_COOKIE['basket'], true);
                    //бежит по массиву $basket[] 

                    for ($i=0; $i < count( $basket['basket'] ); $i++) { 
                      //запрос выбрать продукт по id
                      $sql = "SELECT * FROM products WHERE id = ".$basket['basket'][$i]['product_id'];
                      $result = $connect->query($sql);
                      $product = mysqli_fetch_assoc($result);
                      ?>
                      <!-- вывод данных о продукте -->
                      <tr>
                        <th scope="row"><?php echo $product['id'] ?></th>
                            <td><?php echo $product['title'] ?></td>
                            <td><input class="countTek<?php echo $product['id'] ?>" id="countTekuchii<?php echo $product['id'] ?>" type="text" name="count" onchange="changeCount(this, <?php echo $product['id'] ?>)" value="<?php echo $basket['basket'][$i]['count'] ?>"></td>
                            <td><div data-value="<?php echo $basket['basket'][$i]['count'] ?>" id="incr<?php echo $product['id'] ?>" class="increase" onclick="increaseCount(this, <?php echo $product['id'] ?>)">+</div>

                              <div data-value1="<?php echo $basket['basket'][$i]['count'] ?>" id="red<?php echo $product['id'] ?>" class="reduce" onclick="reduceCount(this, <?php echo $product['id'] ?>)">-</div>

                              </td>
                            <td id="product<?php echo $product['id'] ?>">
                            <?php 
                              $summ = $product['cost'] * $basket['basket'][$i]['count'];
                              echo $summ; 
                            ?>  
                            </td>
                            <td><button onclick="deleteProductBasket(this, <?php echo $product['id'] ?>)" class="btn btn-danger mybtn">Удалить</button></td>
                        </tr>
                      <?php 
                    } 
                  } 
                   ?>

            </tbody>
          </table >
          <form action="parts/forma_order.php" method="POST" class="col-10" >

            <div class="form-group ">
              <label for="inputName">Имя</label>
              <input type="text" class="form-control" name="inputName" placeholder="Введите имя" value="<?php if( isset($_COOKIE['user_id']) ) echo $dataUser['login']; ?>">
            </div>
            <div class="form-group">
              <label for="inputAddress">Адрес доставки</label>
              <input type="text" class="form-control" name="inputAddress" placeholder="Введите адрес" >
            </div>
            <div class="form-group">
            	<label for="inputPhoneNumber">Телефон</label>
              <input type="text" class="form-control" name="inputPhoneNumber" placeholder="Введите номер телефона" value="<?php if( isset($_COOKIE['user_id']) ) echo $dataUser['phone']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Заказать</button>
          </form>
        </div>
    </div>
  </div>
</section>
<?php				
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";  
?>				
		  		