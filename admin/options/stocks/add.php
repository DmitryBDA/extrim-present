<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

if(isset($_POST["submit"])){
    $sql = "Insert into stocks(name, long_desc) VALUES ('". $_POST['name'] ."', '". $_POST['description'] ."')";

    if($result = $connect->query($sql)){
        header("Location: /admin/stocks.php");
    } else {
        echo "Щось пішло не так";
    }
}
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">На головну</a></li>
    <li class="breadcrumb-item"><a href="/admin/stocks.php">Stocks</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Stock</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Stock</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Title">
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
                    <button value="1" name="submit" type="submit" class="btn btn-success btn-fill pull-right">Add new stock</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php"; ?>