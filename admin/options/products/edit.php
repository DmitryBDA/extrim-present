<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

$product_id = $_GET["id"];

if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["category"])) {
    $update_p = "UPDATE `products` SET `title` = '". $_POST["name"] ."', `descriptions` = '". $_POST["description"] ."', `category_id` = '". $_POST["category"] ."' WHERE `products`.`id`=". $_GET["id"];

    $update_res = mysqli_query($connect, $update_p);

    if($update_res){
        header("Location: ../../products.php");
    } else {
        echo "Error";
    }
}


$page = "products";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">На головну</a></li>
    <li class="breadcrumb-item"><a href="/admin/products.php">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-12"> 
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Products</h4>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Options</th>
                    </thead>
                    <?php
                        $sql = "SELECT * FROM products WHERE id=". $product_id;
                        $result = $connect->query($sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <form action="" method="POST">
                                    <tbody>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><input type="text" name="name" value="<?= $row['title'] ?>"></td>
                                        <td><textarea name="description"><?= $row['descriptions'] ?></textarea></td>
                                        <td><select name="category">
                                            <?php
                                            $cat_id = mysqli_fetch_assoc($connect->query("SELECT * FROM products WHERE id = '". $_GET['id'] ."'"));

                                            $cat_name = mysqli_fetch_assoc($connect->query("SELECT * FROM categories WHERE id = '". $cat_id['category_id'] ."'"));
                                            
                                            echo "<option value='0'>" . $cat_name['title'] . "</option>";
                                            
                                            $sql = "SELECT * FROM categories WHERE id != '". $cat_id['category_id'] ."'";
                                            $result = $connect->query($sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
                                            }   
                                            ?>
                                        </select></td>
                                        <td><button type="submit" class="btn btn-primary">Submit</button></td>
                                    </tbody>
                                </form>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php"; ?>