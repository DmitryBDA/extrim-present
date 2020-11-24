<?php
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

$page = "orders";
if(isset($_POST["submit"]) && isset($_POST["status"])){
    $sql = "UPDATE orders SET `status`='". $_POST["status"] ."' WHERE id=". $_GET["id"];
    $result = $connect->query($sql);
    if($result){
        header("Location: ../../orders.php");
    } else {
        echo "Error";
    }
}


include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">На головну</a></li>
    <li class="breadcrumb-item"><a href="/admin/orders.php">Orders</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">
                    Orders
                </h4>
                
            </div>
            <form action="" method="POST">    
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Login</th>
                            <th>Products</th>
                            <th>Address</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                        <?php 
                                $sql = "SELECT * FROM orders WHERE id=". $_GET["id"];
                                $result = $connect->query($sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row["user_id"] ?></td>
                                            <td><a href="view-products.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-info">Подивитись товари</button></a></td>
                                            <td><?php echo $row["address"] ?></td>
                                            <td><?php echo $row["created_at"] ?></td>
                                            <td>
                                                <select class="form-control" name="status">
                                                    <option value="0">--Не вибрано--</option>
                                                    <option value="new">new</option>
                                                    <option value="send">send</option>
                                                </select>
                                            </td>
                                            <td><button name="submit" type="submit" class="btn btn-success">Save</button></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php"; ?>