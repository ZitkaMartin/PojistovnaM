<?php
session_start();
if (!$_SESSION) {
    die(header("location:admin/login.php"));
}

function nactiTridu(string $trida): void {
    require("tridy/$trida.php");
}

spl_autoload_register("nactiTridu");
require './admin/connect.php';
require("mysql/db.php");
Connection();
?>

<!DOCTYPE html>

<html lang="cs-cz">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styly/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="styly/bootstrap-grid.css" type="text/css"/>
        <link rel="stylesheet" href="styly/bootstrap-reboot.css" type="text/css"/>
        <link rel="stylesheet" href="styly/bootstrap-utilities.css" type="text/css"/>
        <link rel="icon" type="image/x-icon" href="obrazky/faviPM.ico">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a href="index.php">
                    <div class="d-flex justify-content-start">
                    <img src="obrazky/logoPM.png" alt="Logo" width="120px" height="auto"></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sjednání pojištění
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="readSjednani.php">Výpis uzavřených pojištění</a>
                                    <a class="dropdown-item" href="createSjednani.php">Uzavřít pojištění</a>
                                    <a class="dropdown-item" href="deleteSjednaniAll.php">Ukončit uzavřené pojištění</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pojištění
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="readPojisteni.php">Výpis pojištění</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="createPojisteni.php">Vytvořit pojištění</a>                                   
                                    <a class="dropdown-item" href="updatePojisteniAll.php">Upravit pojištění</a>
                                    <a class="dropdown-item" href="deletePojisteniAll.php">Odstranit pojištění</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pojištěnci
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="readPojistenci.php">Výpis pojištěnců</a>
                                    <a class="dropdown-item" href="createPojistenci.php">Vytvořit pojištěnce</a>
                                    <a class="dropdown-item" href="updatePojistenciAll.php">Upravit pojištěnce</a>
                                    <a class="dropdown-item" href="deletePojistenciAll.php">Odstranit pojištěnce</a>
                                </div>    
                            </li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle alert-secondary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"">
                                    Přihlášený uživatel <?= $_SESSION['email']; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="admin/displaydata.php">Detail účtu</a>
                                    <a class="dropdown-item" href="admin/Dashboard.php">Upravit údaje</a>
                                    <a class="dropdown-item" href="admin/logout.php">Odhlásit se</a>                                   
                            </li>
                        </ul>
                    </div>
                   

            </nav>


            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </header>
        <div class="container min-vh-100 mt-1">

