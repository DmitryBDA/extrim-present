<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

if(isset($_POST["submit"])){
    $sql = "Insert into categories(title) VALUE ('". $_POST['title'] ."')";

    if($result = $connect->query($sql)){
        header("Location: /admin/categories.php");
    } else {
        echo "Щось пішло не так";
    }
}
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">На головну</a></li>
    <li class="breadcrumb-item"><a href="/admin/categories.php">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Category</h4>
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
                    <button value="1" name="submit" type="submit" class="btn btn-success btn-fill pull-right">Add new category</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php"; ?>