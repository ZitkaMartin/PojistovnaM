<?php
session_start();
include "connect.php";
if (empty($_SESSION['email'])) {
    header("location:login.php");
}
$email = $_SESSION['email'];
$heslo = $_SESSION['heslo'];
$admin = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Display Data</title>
        <link rel="stylesheet" type="text/css" href="style.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="/css/index.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <h2>Detail uživatele</h2>
                </div>
            </div>
            <table class="table table-bordered mb-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Login (email)</th>
                        <th>Administátor</th>
                        <th>Akce</th>
                    </tr>
                </thead>

                <?php
                $query = "SELECT * From adminTable";
                $result = mysqli_query($conn, $query);
                ?>
                <tbody>
                    <tr>
                        <?php
                        while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <td><?php echo $rows['id']; ?></td> 
                            <td><?php echo $rows['email']; ?></td>
                            <td><?php
                                if ($rows['admin'] == true) {
                                    echo "Ano";
                                } else {
                                    echo "Ne";
                                }
                                ?>
                            </td>
                            <td>
                                <button type="button"  class="btn btn-success"><a  style="color: white;" href="edit.php?id=<?php echo $rows['id']; ?>">Upravit</a> </button>
                                <button type="button"  class="btn btn-primary">
                                    <a  style="color: white;" href="delete.php?id=<?php echo $rows['id']; ?>">Odstranit</a></button>         
                            </td>

                        </tr>

                        <?php
                    }
                    ?>
                </tbody>



            </table>
            <button type="button"  class="btn btn-secondary m-3"><a style="color: white;" href="../index.php">Odejít</a>
        </div>
    </body>
</html>