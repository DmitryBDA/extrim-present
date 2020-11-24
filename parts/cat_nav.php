<div class="col-2 mr-5 ml-5">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<a class="nav-link <?php if(!isset($_GET['id'])) { ?> active <?php } ?> " id="v-pills-home-tab" href="products.php">Все подарки</a>
        <?php
        // Подключаем названия категорий
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($connect, $sql) or die("Ошибка " . mysqli_error($connect));
        while ($row = mysqli_fetch_assoc($result)) {
            if(isset($_GET['id']) && $_GET['id'] == $row['id']) {
                echo  "<a class='nav-link active' href='/products.php?id=" . $row['id'] . "'>"  . $row['title'] . "</a>";
            } else {
                echo  "<a class='nav-link' href='/products.php?id=" . $row['id'] . "'>"  . $row['title'] . "</a>";
            }
        }
        ?>
    </div>
</div><!-- col -3 end-->