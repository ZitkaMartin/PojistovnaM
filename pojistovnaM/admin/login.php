<?php
session_start();
include "connect.php";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $heslo = $_POST['heslo'];
    $heslo = md5($heslo);
    $query = "SELECT * FROM adminTable where email='$email' and heslo='$heslo'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] == $email && $row['heslo'] == $heslo) {
            echo "<h4>Přihlášení bylo úspěšné</h4>";
            header("location:../index.php");
        }
        $_SESSION['email'] = $email;
        $_SESSION['heslo'] = $heslo;
        $_SESSION['admin'] = $row['admin'];
    } else {
        echo "<h4>Neplatné přihlášení</h4>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <style type="text/css">
            h4{
                padding: 20px 130px;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../styly/style.css">
    </head>
    <body id="back">
        <div class="container" >
            <div class="row d-flex justify-content-center mb-3">
                <div class="col-md-5 mb-4">
                    <h4 class="mb-4">Přihlásit se</h4>
                    <form action="" method="POST"  >						
                        <input type="email" name="email" id="san3" class="form-control mb-3" placeholder="Přihlašovací email">
                        <input type="Password" name="heslo" id="san5" class="form-control mb-3" placeholder="heslo">
                        <input type="submit" name="submit" id="sand" class="btn btn-success" value="Přihlásit">

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
