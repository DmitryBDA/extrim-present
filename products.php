<?php
// Подключаем header
include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
?>
<section class="section" id="call-to-actionProducts">
  <div class="container" style="margin-top: 5rem!important">
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <?php
            // Выводим категории для breadcrumps
            if (isset($_GET['id'])) {
              $categoryResult = "SELECT * FROM categories WHERE id=" .  $_GET["id"];
              $resultCategory = mysqli_query($connect, $categoryResult);
              $category = mysqli_fetch_assoc($resultCategory);
            ?>
              <!-------- Хлебные крошки------------>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb col-9">
                  <li class="breadcrumb-item"><a href="/">Главная</a></li>
                  <li class="breadcrumb-item"><a href="products.php?id=<?php echo $category["id"] ?>">
                      <?php echo $category["title"] ?></a>
                  </li>
                </ol>
              </nav>
            <?php
            }
            ?>
            <!--------end  Хлебные крошки------------>
          </div> <!-- col 12--->
        </div>
        <!--- end row --->

      </div>
      <!--------end Container------------>

      <?php
      // Подключаем навигацию по категориям
      include $_SERVER['DOCUMENT_ROOT'] . "/parts/cat_nav.php";
      ?>
      <div class="col-9">

        <div class="row" id="products">
          <?php
          // Подключаем страничку с функционалом пагинации
          include $_SERVER['DOCUMENT_ROOT'] . "/modules/products/pag.php";
          ?>
        </div><!--  row  end-->
        <!-- Добавили кнопку Показать ещё-->
        <div class="row">
          <div class="col-6 offset-4">
            <input type="hidden" value=1 id="current-page">
            <?php
            // Условие которое скрывает кнопку Показать на последней странице пагинации
            if ($nav < $num_rows && !isset($_GET['str']) && !isset($_GET['id'])) {
            ?>
              <button class="btn btn-primary lg-btn m-4" id="get-more">
                Показать ещё...
              </button>
            <?php
            }
            ?>
          </div>
        </div>
        <!-- Добавил пагинацию цифрами--->
        <div class="row mt-5 mb-5">
          <div class="col-4 offset-3">
            <nav aria-label="...">
              <ul class="pagination pagination-lg">
           
                <?php
                if (!isset($_GET['str'])) {

                ?>
                  <li class="page-item active"><a href="products.php" class="page-link">1</a></li>
                <?php
                } else {
                ?>
                  <li class="page-item"><a href="products.php" class="page-link">1</a></li>
                  <?php

                }
                if (!isset($_GET['id'])) {
                  // Запускаем цикл который берет данные с pag.php и формирует количество страниц и поставляет линк
                  for ($i = 2; $i <= $num_rows; $i++) {
                    if ($i != $nav) {
                      echo '<li class="page-item"><a href = " ' . $_SERVER['PHP_SELF'] . '?str=' . $i . ' " class="page-link"> ' . $i . ' </a></li>';
                    } else {
                  ?>
                <?php
                      echo '<li class="page-item active"><a href = " ' . $_SERVER['PHP_SELF'] . '?str=' . $i . ' " class="page-link"> ' . $i . ' </a></li>';
                    }
                  }
                }
                ?>
              </ul>
            </nav>
          </div>
        </div>
        <!--end pagination- -->
      </div><!-- col -9 end-->


    </div><!-- row -->

  </div> <!-- container -->
</section>





<?php

include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";
?>