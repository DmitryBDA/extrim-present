<?php
// Подключаем вывод продуктов если category_id сходиться с id товара показываем только эти категории
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM products WHERE category_id=" . $_GET['id'];
    $result = mysqli_query($connect, $sql) or die("Ошибка " . mysqli_error($connect));
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <div class="col-4 p-2">
            <div class="card p-2 mb-2 card-products">
                <img src="<?php echo $row["image"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="product.php?id=<?php echo $row['id']; ?>">
                            <?php echo $row['title'] ?>
                        </a>
                    </h5>
                    <p class="card-text"><?php echo $row['descriptions'] ?></p>
                    <p class="card-text cards-text-cost"><?php echo $row["cost"] ?><span>$</span></p>
                    <button class="btn btn-primary add-to-cart btn-busket mt-4 btn-cart" id="btn-busket" onclick="addToBasket(this)" data-id="<?php echo $row['id'] ?>">

                        Заказать</button>
                </div>
            </div><!-- cart - col-9 end-->
        </div>

    <?php
    }
    // Иначе показываем все товары
} else {
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="col-4">
            <div class="card p-2 mb-2 card-products">
                <img src="<?php echo $row["image"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="product.php?id=<?php echo $row['id']; ?>">
                            <?php echo $row['title'] ?>
                        </a>
                    </h5>
                    <p class="card-text"><?php echo $row['descriptions'] ?></p>
                    <p class="card-text cards-text-cost"><?php echo $row["cost"] ?><span>$</span></p>
                    <button class="btn btn-primary add-to-cart btn-busket mt-4 btn-cart" id="btn-busket" onclick="addToBasket(this)" data-id="<?php echo $row['id'] ?>">

                        Заказать</button>
                </div>
            </div><!-- cart - col-9 end-->
        </div>

<?php
    }
}
?>