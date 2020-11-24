<?php
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

$page = "orders";



include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">На головну</a></li>
    <li class="breadcrumb-item"><a href="/admin/orders.php">Orders</a></li>
    <li class="breadcrumb-item active" aria-current="page">Products</li>
  </ol>
</nav>
<?php 
$row = mysqli_fetch_assoc($connect->query("SELECT * FROM orders WHERE id=". $_GET["id"]));


$basket = json_decode($row["products"], true);
?>
<div class="row" id="products">
	<table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Count</th>
          <th scope="col">Cost</th>
        </tr>
      </thead>
      <tbody>
        <?php
            for($i = 0; $i < count($basket["basket"]); $i++){
                $product = mysqli_fetch_assoc( $connect->query( "SELECT * FROM products WHERE id=". $basket["basket"][$i]["product_id"] ) );
                ?>
                <tr>
                    <td><?php echo $product["id"] ?></td>
                    <td><?php echo $product["title"] ?></td>
                    <td><?php echo $product["descriptions"] ?></td>
                    <td><?php echo $basket["basket"][$i]["count"] ?></td>
                    <td><?php echo $basket["basket"][$i]["count"] * $product["cost"] ?></td>
                </tr>
                <?php
            }  
        ?>
      </tbody>
    </table>   
</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php"; ?>