<?php
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

$page = "orders";



include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">На головну</a></li>
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                            $sql = "SELECT * FROM orders";
                            $result = $connect->query($sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $log_result = $connect->query("SELECT * FROM users WHERE id=". $row["user_id"]);
                                $login = mysqli_fetch_assoc($log_result);
                                ?>
                                    <tr>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $login["login"] ?></td>
                                        <td><a href="options/orders/view-products.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-info">Подивитись товари</button></a></td>
                                        <td><?php echo $row["address"] ?></td>
                                        <td><?php echo $row["created_at"] ?></td>
                                        <td><?php echo $row["status"] ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="options/orders/edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                            }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php"; ?>