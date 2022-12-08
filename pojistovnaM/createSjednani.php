<?php
$title = "Sjednat pojištění";
require_once 'header.php';

$pojistenec = new Pojistenec();
$pojistenec->VratPojistence();

$pojisteni = new Pojisteni();
$pojisteni->VratPojisteni();

if (isset($_POST["submit"])) {
    $sjednani = new Sjednani();
    $sjednani->PridejSjednani();
}
?>       
<h1>Sjednat nové pojištění</h1>
<form class="form-control" action="createSjednani.php" method="POST">
    <div class="form-group col-md-6">Vyberte pojištěnce<br>
        <select class="form-control" name="pojistenecId" pojistenecId="">
            <?php
            while ($row = mysqli_fetch_assoc($vratPojistence)) {
                $pojistenecId = $row["pojistenecId"];
                $jmeno = $row["jmeno"];
                $prijmeni = $row["prijmeni"];
                echo "<option value='$pojistenecId'>$pojistenecId $jmeno $prijmeni</option>";
            }
            ?>
        </select></div>
    <div class="form-group col-md-6">Vyberte pojištění<br>
        <select class="form-control" name="pojisteniId" pojisteniId="">
            <?php
            while ($row2 = mysqli_fetch_assoc($vratPojisteni)) {
                $pojisteniId = $row2["pojisteniId"];
                $nazev = $row2["nazev"];
                echo "<option value='$pojisteniId'>$pojisteniId $nazev</option>";
            }
            ?>
        </select></div>
    <div class="form-group col-md-4">
        <input class="form-control btn btn-primary" type="submit" name="submit" value="Sjednat pojištění"></div>  
        </form>
        <?php require_once 'footer.php'; ?>
