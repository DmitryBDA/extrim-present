<?php
// Подключаем header
include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
?>
<?php
//Выбираем товары где id равен тому что пришёл в строке
$sql = "SELECT * FROM products WHERE id=" . $_GET["id"];
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

$sql_cat = "SELECT * FROM categories WHERE id=" . $row["category_id"];
$result_cat = mysqli_query($connect, $sql_cat);

$category = mysqli_fetch_assoc($result_cat);
?>
<section class="section" id="call-to-actionProduct-1">
<div class="container" style="margin-top: 4rem!important">
    <div class="row">
        <!-------- Хлебные крошки------------>

        <div class="container">
            <div class="row">
                <div class="
        col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb col-7 " style="margin-left: 337px;">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="products.php?id=<?php echo $category["id"] ?>">
                                    <?php echo $category["title"] ?></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $row["title"] ?></li>
                        </ol>
                    </nav>
                    <!--------end  Хлебные крошки------------>

                </div>
                <!--- end col 12-->

            </div>
            <!--- end row-->

            <!--------end  container------------>

            <?php
            // Подключаем вывод продуктов если id сходиться с id товара показываем этот товар

            $sql = "SELECT * FROM products WHERE id=" . $_GET['id'];
            $result = mysqli_query($connect, $sql) or die("Ошибка " . mysqli_error($connect));
            $row = mysqli_fetch_assoc($result)

            ?>
            <div class="col-6 offset-3 mb-5">
                <div class="card text-center">
                    <img style="width:50%; height:20%; margin-left: 25%;margin-top: 10%;" src="<?php echo $row["image"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">

                        <h5 class="card-title"><?php echo $row["title"] ?></h5>
                        <p class="card-text"><?php echo $row["content"] ?></p>
                        <p class="card-text card-text-cost">Стоимость: <?php echo $row["cost"] ?><span>$</span></p>
                        <!-- Присваиваем кнопке событие клик и передаем data её id шник-->
                        <button class="btn btn-primary add-to-cart btn-busket m-5" id="btn-busket" onclick="addToBasket(this)" data-id="<?php echo $row['id'] ?>">

                            Заказать</button>
                    </div>

                </div>
            </div>
            <!--end col-9-->
        </div>
        <!--end row -->
    </div>

</div>
<!--end row products-->
</section>




<?php

include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";
?>