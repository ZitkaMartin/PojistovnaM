<?php

class Pojistenec {

    public function PridejPojistence() {
        global $connection;
        $jmeno = $_POST["jmeno"];
        $prijmeni = $_POST["prijmeni"];
        $datumNarozeni = $_POST['datumNarozeni'];
        $telefon = $_POST['telefon'];
        
        $jmeno = mysqli_real_escape_string($connection, $jmeno);
        $prijmeni = mysqli_real_escape_string($connection, $prijmeni);

        $dbPridejPojistence = "INSERT INTO pojistenci(jmeno,prijmeni,datumNarozeni,telefon) VALUES('$jmeno','$prijmeni','$datumNarozeni','$telefon')";

        if ((date('Y-n-j')) < $datumNarozeni) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Pojištěnec se ještě nenarodil. Zkontrolujte datum narození<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role="link" href="createPojistenci.php">Upravit</a></button>');
            die();
        }
        if ((date('Y') - 100) > $datumNarozeni) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Pojištěnec je již nepojistitelný. Zkontrolujte datum narození<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role="link" href="createPojistenci.php">Upravit</a></button>');
            die();
        }

        $telefon = str_replace(' ', '', $telefon);
        if (!preg_match('/(\+|#|00)[0-9]{11,12}/i', $telefon)) {

            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Špatný formát telefonního čísla<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role="link" href="createPojistenci.php">Upravit</a></button>');
            die();
        }

        $pridejPojistence = mysqli_query($connection, $dbPridejPojistence);
        if (!$pridejPojistence) {
            die("Dotaz do databáze selhal" . mysqli_error());
        }

        if ($jmeno && $prijmeni && $datumNarozeni && $telefon) {
            echo "<div class='alert-dismissible alert alert-success fade show' role='alert'>Pojištěnec $jmeno $prijmeni byl uložen<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>";
            echo "<br>";
        } else {
            die("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Je potřeba vyplnit všechny údaje<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
        }
    }

    //výběr všech dat z tabulky pojštěnců
    public function VypisPojistence() {
        global $connection;

        $dbVypisPojistence = "SELECT * FROM pojistenci ORDER BY prijmeni";

        $vypisPojistence = mysqli_query($connection, $dbVypisPojistence);
        if (!$vypisPojistence) {
            die("Nepodařilo se vybrat data z databáze");
        }
        //vypsání do tabulky
        while ($row = mysqli_fetch_array($vypisPojistence)) {
            echo('<table class="table table-striped table-hover">');
            echo('<thead><th>ID</th><th>Jméno</th><th>Příjmení</th><th>Datum narození</th><th>Telefon</th><th colspan="2"></th></thead>');
            foreach ($vypisPojistence as $p) {
                echo('<tr><td>' . htmlspecialchars($p['pojistenecId']));
                echo('</td><td>' . htmlspecialchars(trim($p['jmeno'])));
                echo('</td><td>' . htmlspecialchars(trim($p['prijmeni'])));
                $datum = date("d.m.Y", strtotime($p['datumNarozeni']));
                echo('</td><td>' . htmlspecialchars($datum));
                echo('</td><td>' . htmlspecialchars($p['telefon']));
                echo('</td><td><a class="btn btn-primary" role="link" href="detailPojistenec.php?pojistenecId=' . $p['pojistenecId'] . '">Detail</a></button>');
                echo('</td><td><a class="btn btn-warning" role="link" href="updatePojistenci.php?pojistenecId=' . $p['pojistenecId'] . '">Upravit</a></button>');
                echo('</td><td><a class="btn btn-danger" role="link" href="deletePojistenci.php?pojistenecId=' . $p['pojistenecId'] . '">Odstranit</a></button>');
                echo('</td></tr>');
            }
            echo('</table>');
        }
    }

    //Update pojištěnců
    public function UpravPojistence() {
        global $connection;
        $pojistenecId = $_POST["pojistenecId"];
        $jmeno = $_POST["jmeno"];
        $prijmeni = $_POST["prijmeni"];
        $datumNarozeni = $_POST["datumNarozeni"];
        $telefon = $_POST["telefon"];
        
        $jmeno = mysqli_real_escape_string($connection, $jmeno);
        $prijmeni = mysqli_real_escape_string($connection, $prijmeni);

        $dbUpravPojistence = "UPDATE pojistenci SET jmeno='$jmeno',prijmeni='$prijmeni',datumNarozeni='$datumNarozeni',telefon='$telefon' WHERE pojistenecId=$pojistenecId";

        if ((date('Y-n-j')) < $datumNarozeni) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Pojištěnec se ještě nenarodil. Zkontrolujte datum narození<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role="link" href="updatePojistenci.php">Upravit</a></button>');
            die();
        }
        if ((date('Y') - 100) > $datumNarozeni) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Pojištěnec je již nepojistitelný. Zkontrolujte datum narození<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role="link" href="updatePojistenci.php">Upravit</a></button>');
            die();
        }

        $telefon = str_replace(' ', '', $telefon);
        if (!preg_match('/(\+|#|00)[0-9]{11,12}/i', $telefon)) {
            echo("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Špatný formát telefonního čísla<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
            echo('<a class="btn btn-primary m-3" role="link" href="updatePojistenci.php">Upravit</a></button>');
            die();
        }

        $upravPojistence = mysqli_query($connection, $dbUpravPojistence);

        if (isset($_POST["submit"])) {
            echo "<div class='alert-dismissible alert alert-success fade show' role='alert'>Úpravy byly uloženy<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>";
        }

        if (!$upravPojistence) {
            die("Dotaz selhal" . mysqli_error());
        }
    }

    //odtstranění pojištěnce
    public function VymazPojistence() {
        global $connection;
        $pojistenecId = $_POST["pojistenecId"];

        $dbVymazPojistence = "DELETE FROM pojistenci WHERE pojistenecId = $pojistenecId";

        $vymazPojistence = mysqli_query($connection, $dbVymazPojistence);

        if ($_POST["submit"]) {
            echo "<div class='alert-dismissible alert alert-success fade show' role='alert'>Pojištěnec byl odstraněn z databáze<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>";
            die ();
            
        }

        if (!$vymazPojistence) {
            die("Dotaz selhal" . mysqli_error());
        }
    }

    public function VratPojistence() {
        //výběr všech dat z tabulky pojštěnců
        global $connection;
        global $vratPojistence;
        $dbVratPojistence = "SELECT * FROM pojistenci ORDER BY pojistenecId";

        $vratPojistence = mysqli_query($connection, $dbVratPojistence);
        if (!$vratPojistence) {
            die("Nepodařilo se vybrat data z databáze.");
        }
    }

    public function VyplnPojistence() {
        global $connection;
        global $vyplnPojistence;

        $pojistenecId = $_GET["pojistenecId"];
        $dbVyplnPojistence = "SELECT pojistenecId, jmeno, prijmeni, datumNarozeni, telefon FROM pojistenci WHERE pojistenecId = $pojistenecId";
        $vyplnPojistence = mysqli_query($connection, $dbVyplnPojistence);
        if (!$vyplnPojistence) {
            die("Nepodařilo se vybrat data z databáze");
        }
    }

    public function VyberPojistence() {
        global $connection;
        global $vratPojistence;
        while ($row = mysqli_fetch_assoc($vratPojistence)) {
            $pojistenecId = $row["pojistenecId"];
            $jmeno = $row["jmeno"];
            $prijmeni = $row["prijmeni"];
            $datumNarozeni = $row["datumNarozeni"];
            $telefon = $row["telefon"];
            echo "<option value='$pojistenecId'>$pojistenecId $jmeno $prijmeni</option><br>";
        }
    }

    public function VypisDetailPojistence() {
        global $connection;

        $pojistenecId = $_GET["pojistenecId"];
        $dbVypisDetailPojistence = "SELECT pp.sjednaniId, pp.pojistenecId, jmeno, prijmeni, datumNarozeni, pojisteni.pojisteniId, pojisteni.nazev, popis FROM pojistenci
            JOIN pojistenci_pojisteni AS pp ON pp . pojistenecId = pojistenci . pojistenecId
            JOIN pojisteni ON pp . pojisteniId = pojisteni . pojisteniId
            WHERE pojistenci . pojistenecId = $pojistenecId";

        $vypisDetailPojistence = mysqli_query($connection, $dbVypisDetailPojistence);
        
        if (!$vypisDetailPojistence) {
            die("Nepodařilo se vybrat data z databáze.");
        }
        //vypsání do tabulky
        while ($row = mysqli_fetch_array($vypisDetailPojistence)) {
            $datum = date("d.m.Y", strtotime($row['datumNarozeni']));
            echo '<h2>Pojištěnec ' . $row["pojistenecId"] . " " . $row['jmeno'] . " " . $row['prijmeni'] . " narozen " . $datum . ' má sjednaná tato pojištění:</h2>';
            echo('<table class="table table-striped table-hover">');
            echo('<thead><th>ID smlouvy<th>Název pojištění</th><th>Popis</th><th></th></thead>');
            foreach ($vypisDetailPojistence as $d) {
                echo('<tr><td>' . htmlspecialchars($d['sjednaniId']));
                echo('</td><td>' . htmlspecialchars($d['nazev']));
                echo('</td><td>' . htmlspecialchars($d['popis']));
                echo('</td><td><a class="btn btn-danger" role"link" href="deleteSjednani.php?sjednaniId=' . $d['sjednaniId'] . '">Ukončit smlouvu</a></button>');
                echo('</td></tr>');
            }
            echo('</table>');
        }
        
    }

}
