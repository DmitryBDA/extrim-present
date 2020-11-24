<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

if(isset($_POST["submit"])){
    $sql = "Insert into products(title, descriptions, category_id, cost) VALUES ('". $_POST['title'] ."', '". $_POST['description'] ."', '". $_POST['cat_id'] ."', '". $_POST['cost'] ."')";

    if($result = $connect->query($sql)){
        header("Location: /admin/products.php");
    } else {
        echo "Щось пішло не так";
    }
}
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">На головну</a></li>
    <li class="breadcrumb-item"><a href="/admin/products.php">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Product</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" type="text" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="cat_id">
                                    <option value="0">Не вибрано</option>
                                    <?php
                                        $sql = "SELECT * FROM categories";
                                        $result = $connect->query($sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
                                        }   
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cost</label>
                                <textarea name="cost" type="text" class="form-control" placeholder="Cost"></textarea>
                            </div>
                        </div>
                    </div>
                    <button value="1" name="submit" type="submit" class="btn btn-success btn-fill pull-right">Add new product</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php"; ?>