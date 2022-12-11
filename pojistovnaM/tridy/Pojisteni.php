<?php

class Pojisteni {

    public function PridejPojisteni() {
        global $connection;
        $nazev = $_POST["nazev"];
        $popis = $_POST["popis"];
        
        $nazev = mysqli_real_escape_string($connection, $nazev);
        $popis = mysqli_real_escape_string($connection, $popis);

        $dbPridejPojisteni = "INSERT INTO pojisteni(nazev,popis) VALUES('$nazev','$popis')";

        $nazevMin = 5;
        $nazevMax = 50;

        $popisMin = 10;
        $popisMax = 2000;

        if (strlen($nazev) < $nazevMin) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Název musí mít alespoň $nazevMin znaků<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role"link" href="createPojisteni.php">Upravit</a></button>');
            die();
        }
        if (strlen($nazev) > $nazevMax) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Název musí mít maximálně $nazevMax znaků<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role"link" href="createPojisteni.php">Upravit</a></button>');
            die();
        }

        if (strlen($popis) < $popisMin) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Popis musí mít alespoň $popisMin znaků<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role"link" href="createPojisteni.php">Upravit</a></button>');
            die();
        }
        if (strlen($popis) > $popisMax) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Popis musí mít maximálně $popisMax znaků<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role"link" href="createPojisteni.php">Upravit</a></button>');
            die();
        }

        $pridejPojisteni = mysqli_query($connection, $dbPridejPojisteni);
        if (!$pridejPojisteni) {
            die("Dotaz do databáze selhal" . mysqli_error());
        }


        if ($nazev && $popis) {
            echo "<div class='alert-dismissible alert alert-success fade show' role='alert'>Pojištění $nazev bylo uloženo<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>";
        } else {
            die("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Je potřeba vyplnit všechny údaje<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
        }
    }

    //výběr všech dat z tabulky pojštění
    public function VypisPojisteni() {
        global $connection;

        $dbVypisPojisteni = "SELECT * FROM pojisteni";

        $vypisPojisteni = mysqli_query($connection, $dbVypisPojisteni);
        if (!$vypisPojisteni) {
            die("Nepodařilo se vybrat data z databáze");
        }
        //vypsání do tabulky
        while ($row = mysqli_fetch_array($vypisPojisteni)) {
            echo('<table class="table table-striped">');
            echo('<thead><th>ID</th><th>Název pojištění</th><th>Popis</th><th></th></thead>');
            foreach ($vypisPojisteni as $poj) {
                echo('<tr><td>' . htmlspecialchars(trim($poj['pojisteniId'])));
                echo('</td><td>' . htmlspecialchars(trim($poj['nazev'])));
                echo('</td><td>' . htmlspecialchars(trim($poj['popis'])));
                echo('</td><td><a class="btn btn-primary" role="link" href="detailPojisteni.php?pojisteniId=' . $poj['pojisteniId'] . '">Detail</a></button>');
                echo('</td><td><a class="btn btn-warning" role="link" href="updatePojisteni.php?pojisteniId=' . $poj['pojisteniId'] . '">Upravit</a></button>');
                echo('</td><td><a class="btn btn-danger" role="link" href="deletePojisteni.php?pojisteniId=' . $poj['pojisteniId'] . '">Odstranit</a></button>');
                echo('</td></tr>');
            }
            echo('</table>');
        }
    }

    //Update pojištění
    public function UpravPojisteni() {
        global $connection;

        $nazev = $_POST["nazev"];
        $popis = $_POST["popis"];
        $pojisteniId = htmlspecialchars(trim($_POST["pojisteniId"]));
        
        $nazev = mysqli_real_escape_string($connection, $nazev);
        $popis = mysqli_real_escape_string($connection, $popis);

        $dbUpravPojisteni = "UPDATE pojisteni SET nazev='$nazev',popis='$popis' WHERE pojisteniId=$pojisteniId";

        $nazevMin = 5;
        $nazevMax = 30;

        $popisMin = 10;
        $popisMax = 2000;

        if (strlen($nazev) < $nazevMin) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Název musí mít alespoň $nazevMin znaků<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role="link" href="updatePojisteni.php">Upravit</a></button>');
            die();
        }
        if (strlen($nazev) > $nazevMax) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Název musí mít maximálně $nazevMax znaků<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role="link" href="updatePojisteni.php">Upravit</a></button>');
            die();
        }

        if (strlen($popis) < $popisMin) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Popis musí mít alespoň $popisMin znaků<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role="link" href="updatePojisteni.php">Upravit</a></button>');
            die();
        }
        if (strlen($popis) > $popisMax) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Popis musí mít maximálně $popisMax znaků<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role="link" href="updatePojisteni.php">Upravit</a></button>');
            die();
        }

        $upravPojisteni = mysqli_query($connection, $dbUpravPojisteni);

        if ($_POST["submit"]) {
            echo "<div class='alert-dismissible alert alert-success fade show' role='alert'>Úpravy byly uloženy<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>";
        }

        if (!$upravPojisteni) {
            die("Dotaz selhal." . mysqli_error());
        }
    }

    //odtstranění pojištění
    public function VymazPojisteni() {
        global $connection;
        $pojisteniId = $_POST["pojisteniId"];

        $dbVymazPojisteni = "DELETE FROM pojisteni WHERE pojisteniId = $pojisteniId;";

        $vymazPojisteni = mysqli_query($connection, $dbVymazPojisteni);

        if ($_POST["submit"]) {
            echo "<div class='alert-dismissible alert alert-success fade show' role='alert'>Pojištění bylo odstrněno z databáze<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>";
        }

        if (!$vymazPojisteni) {
            die("Dotaz selhal" . mysqli_error());
        }
    }

    public function VratPojisteni() {
        //výběr všech dat z tabulky pojštění
        global $connection;
        global $vratPojisteni;
        $dbVratPojisteni = "SELECT * FROM pojisteni";

        $vratPojisteni = mysqli_query($connection, $dbVratPojisteni);
        if (!$vratPojisteni) {
            die("Nepodařilo se vybrat data z databáze");
        }
    }

    public function VyplnPojisteni() {
        global $connection;
        global $vyplnPojisteni;

        $pojisteniId = $_GET["pojisteniId"];
        $dbVyplnPojisteni = "SELECT pojisteniId, nazev, popis FROM pojisteni WHERE pojisteniId = $pojisteniId";
        $vyplnPojisteni = mysqli_query($connection, $dbVyplnPojisteni);
        if (!$vyplnPojisteni) {
            die("Nepodařilo se vybrat data z databáze");
        }
    }

    public function VyberPojisteni() {
        global $connection;
        global $vratPojisteni;
        
        while ($row = mysqli_fetch_assoc($vratPojisteni)) {
            $pojisteniId = $row["pojisteniId"];
            $nazev = $row["nazev"];
            $popis = $row["popis"];
            echo "<option value='$pojisteniId'>$pojisteniId $nazev</option><br>";
        }
    }
    
     public function VypisDetailPojisteni() {
        global $connection;
       
        $pojisteniId = $_GET["pojisteniId"];
        $dbVyplnDetailPojisteni = "SELECT pp.sjednaniId, pp.pojistenecId, jmeno, prijmeni, pojisteni.pojisteniId, pojisteni.nazev FROM pojistenci
            JOIN pojistenci_pojisteni AS pp ON pp . pojistenecId = pojistenci . pojistenecId
            JOIN pojisteni ON pp . pojisteniId = pojisteni . pojisteniId
            WHERE pojisteni.pojisteniId = $pojisteniId";

        $vyplnDetailPojisteni = mysqli_query($connection, $dbVyplnDetailPojisteni);
        if (!$vyplnDetailPojisteni) {
            die("Nepodařilo se vybrat data z databáze.");
        }
        //vypsání do tabulky
        while ($row = mysqli_fetch_array($vyplnDetailPojisteni)) {
            echo $row['nazev'] . ' mají sjednané tito pojištěnci:</h2>';
            echo('<table class="table table-striped table-hover">');
            echo('<thead><th>ID smlouvy</th><th>ID pojištěnce</th><th>Jméno</th><th>Příjmení</th><th></th></thead>');
            foreach ($vyplnDetailPojisteni as $d) {
                echo('<tr><td>' . htmlspecialchars($d['sjednaniId']));
                echo('</td><td>' . htmlspecialchars($d['pojistenecId']));
                echo('</td><td>' . htmlspecialchars($d['jmeno']));
                echo('</td><td>' . htmlspecialchars($d['prijmeni']));
                echo('</td><td><a class="btn btn-danger" role"link" href="deleteSjednani.php?sjednaniId=' . $d['sjednaniId'] . '">Ukončit smlouvu</a></button>');
                echo('</td></tr>');
            }
            echo('</table>');
        }
    }

}
