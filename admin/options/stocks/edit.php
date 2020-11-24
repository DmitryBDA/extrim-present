<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

$stocks_id = $_GET["id"];

if(isset($_POST["name"]) && isset($_POST["description"])) {
    $update_p = "UPDATE `stocks` SET `name` = '". $_POST["name"] ."', `long_desc` = '". $_POST["description"] ."' WHERE `stocks`.`id`=". $stocks_id;

    $update_res = mysqli_query($connect, $update_p);

    if($update_res){
        header("Location: ../../stocks.php");
    } else {
        echo "Error";
    }
}


$page = "stocks";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">На головну</a></li>
    <li class="breadcrumb-item"><a href="/admin/stocks.php">Stocks</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Stocks</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-12"> 
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Stocks</h4>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Desc</th>
                        <th>Options</th>
                    </thead>
                    <?php
                        $sql = "SELECT * FROM stocks WHERE id=". $stocks_id;
                        $result = $connect->query($sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <form action="" method="POST">
                                    <tbody>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><input type="text" name="name" value="<?= $row['name'] ?>"></td>
                                        <td><textarea name="description"><?= $row['long_desc'] ?></textarea></td>
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