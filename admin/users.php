<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/config/bd.php";

$page = "users";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php"
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">На головну</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">
                    Users
                </h4>
                
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Emaiil</th>
                        <th>Password</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM users";
                            $result = $connect->query($sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["login"] ?></td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td><?php echo $row["pass"] ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="options/users/delete.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Delete</a>
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