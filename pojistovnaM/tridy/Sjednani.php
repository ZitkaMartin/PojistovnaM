<?php

class Sjednani {

    public function PridejSjednani() {
        global $connection;
        global $PridejSjednani;

        $pojistenecId = $_POST["pojistenecId"];
        $pojisteniId = $_POST["pojisteniId"];

        $dbPridejSjednani = "INSERT INTO pojistenci_pojisteni(pojistenecId,pojisteniId) VALUES('$pojistenecId','$pojisteniId')";

        $PridejSjednani = mysqli_query($connection, $dbPridejSjednani);
        if (!$PridejSjednani) {
            die("Dotaz do databáze selhal." . mysqli_error());
        }

        if ($pojistenecId && $pojisteniId) {
             echo "<div class='alert-dismissible alert alert-success fade show' role='alert'>Pojištění bylo sjednáno<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>";
            echo "<br>";
        } else {
            die ("<div class='alert-dismissible alert alert-warning fade show' role='alert'>Je potřeba vyplnit všechny údaje<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>");
        }
    }

    public function VypisSjednani() {
        global $connection;

        $dbVypisSjednani = "SELECT pp.sjednaniId, pp.pojistenecId, jmeno, prijmeni, pojisteni.pojisteniId, pojisteni.nazev FROM pojistenci
            JOIN pojistenci_pojisteni AS pp ON pp . pojistenecId = pojistenci . pojistenecId
            JOIN pojisteni ON pp . pojisteniId = pojisteni . pojisteniId
            ORDER BY pojistenci.prijmeni, pp.pojistenecId, pp.sjednaniId;";

        $VypisSjednani = mysqli_query($connection, $dbVypisSjednani);
        if (!$VypisSjednani) {
            die("Nepodařilo se vybrat data z databáze.");
        }
        //vypsání do tabulky
        while ($row = mysqli_fetch_array($VypisSjednani)) {
            echo('<table class="table table-striped table-hover">');
            echo('<thead><th>ID smlouvy</th><th>ID pojištěnce</th><th>Jméno</th><th>Příjmení</th><th>ID pojištění</th><th>Sjednané pojištění</th><th colspan="2"><th></thead>');
            foreach ($VypisSjednani as $s) {
                echo('<tr><td>' . htmlspecialchars($s['sjednaniId']));
                echo('</td><td>' . htmlspecialchars($s['pojistenecId']));
                echo('</td><td>' . htmlspecialchars($s['jmeno']));
                echo('</td><td>' . htmlspecialchars($s['prijmeni']));
                echo('</td><td>' . htmlspecialchars($s['pojisteniId']));
                echo('</td><td>' . htmlspecialchars($s['nazev']));
                echo('</td><td><a class="btn btn-danger" role"link" href="deleteSjednani.php?sjednaniId=' . $s['sjednaniId'] . '">Ukončit smlouvu</a></button>');
                echo('</td></tr>');
            }
            echo('</table>');
        }
    }
    
    public function VymazSjednani() {
        global $connection;
        $sjednaniId = $_POST["sjednaniId"];

        $dbVymazSjednani = "DELETE FROM pojistenci_pojisteni WHERE sjednaniId = $sjednaniId";

        $vymazSjednani = mysqli_query($connection, $dbVymazSjednani);

        if ($_POST["submit"]) {
            echo "<div class='alert-dismissible alert alert-success fade show' role='alert'>Pojištění bylo zrušeno<button type='button' class='close' data-dismiss='alert'>&times;</span></button></div>";
        }

        if (!$vymazSjednani) {
            die("Dotaz selhal." . mysqli_error());
        }
    }

    function VratSjednani() {
        //výběr všech dat z tabulky pojštění
        global $connection;
        global $vratSjednani;
        $dbVratSjednani = "SELECT pp.sjednaniId, pp.pojistenecId, jmeno, prijmeni, pojisteni.pojisteniId, pojisteni.nazev FROM pojistenci
            JOIN pojistenci_pojisteni AS pp ON pp . pojistenecId = pojistenci . pojistenecId
            JOIN pojisteni ON pp . pojisteniId = pojisteni . pojisteniId
            ORDER BY pojistenci.prijmeni, pp.pojistenecId, pp.sjednaniId;";

        $vratSjednani = mysqli_query($connection, $dbVratSjednani);
        if (!$vratSjednani) {
            die("Nepodařilo se vybrat data z databáze.");
        }
    }
        public function VyplnSjednani() {
        global $connection;
        global $vyplnSjednani;

        $sjednaniId = $_GET["sjednaniId"];
        $dbVyplnSjednani = "SELECT sjednaniId FROM pojistenci_pojisteni WHERE sjednaniId = $sjednaniId";
        $vyplnSjednani = mysqli_query($connection, $dbVyplnSjednani);
        if (!$vyplnSjednani) {
            die("Nepodařilo se vybrat data z databáze");
        }
    }

}
