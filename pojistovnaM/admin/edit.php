<?php
session_start();
include "connect.php";
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $email = $_POST['email'];
    $query = "UPDATE adminTable set id =$id, email='$email' where id=$id ";
    if (mysqli_query($conn, $query)) {
        echo 'update';
        header("location:displaydata.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        ini_set('display_errors', 1);
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">

    </head>
    <body>
        <div class="container">
            <form  action="" method="POST">
                <h2>Změnit přihlašovací email</h2>
                <div class="container">
                    <table class="table table-bordered">
                        <tr>
                            <th>Email</th>
                        </tr>
                        <tr>
                        <div class="form-group">
                            <td><input type="text" name="email" class="form-control"></td>
                        </div>
                        </tr>
                    </table>
                </div>
                <button type="button" onclick="window.location.href = 'DashboardAll.php'" class="btn btn-info">Zpět</button>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">


            </form>
        </div>
    </body>
</html>