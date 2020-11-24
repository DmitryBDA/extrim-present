<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

$page = "products";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php"
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">На головну</a></li>
    <li class="breadcrumb-item active" aria-current="page">Products</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">
                    Products
                    <a href="options/products/add.php" class="btn btn-primary">Add</a>
                </h4>
                
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
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM products";
                            $result = $connect->query($sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["title"] ?></td>
                                        <td><?php echo $row["descriptions"] ?></td>
                                        <td><?php 
                                            $cat_name = mysqli_fetch_assoc($connect->query("SELECT * FROM categories WHERE id = '". $row['category_id'] ."'")); 
                                            echo $cat_name['title'];
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="options/products/edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Edit</a>
                                              <a href="options/products/delete.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Delete</a>
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