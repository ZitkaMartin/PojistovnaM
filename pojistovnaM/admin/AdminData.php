<?php

session_start();
include "connect.php";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $heslo = $_POST['heslo'];
    $heslo1 = $_POST['heslo1'];
    if (empty($email)) {
        echo "email je povinný";
    } else {
        $emailquery = "SELECT * from adminTable where email='$email'";
        $querys = mysqli_query($conn, $emailquery);
        $emailcount = mysqli_num_rows($querys);
        if ($emailcount > 0) {
            echo '<span style="color:red">' . "Tento email je již zaregistrován" . '</span>';
        } else {
            if ($heslo == $heslo1) {

                $hash = "$2y$10$";
                $salt = "A8kdD56kK423sIOFA46313";
                $hashSalt = $hash . $salt;
                $heslo = crypt($heslo, $hashSalt);

                $sql = "INSERT INTO adminTable(email,heslo) values('$email','$heslo')";
                if (mysqli_query($conn, $sql)) {
                    header("location:login.php");
                } else {
                    echo "Error" . $sql . "<br>" . $conn->error;
                }
            } else {
                echo '<span style="color:red">' . "Hesla se neshodují" . '</span>';
            }
        }
    }
}
?>