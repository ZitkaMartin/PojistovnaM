<?php

$title = "Upravit pojištění";
require_once 'header.php';
//admin ověření
$admin = new Admin();
$admin -> OmezPristup();
//výběr všech dat z databáze pro zobrazení do "option"
$pojisteni = new Pojisteni();
$pojisteni->VratPojisteni();

//načtení dat z formuláře a dotaz do databáze
if (isset($_POST["submit"])) {
    $pojisteni->UpravPojisteni();
}
//.justify-content-between
?> 
<h1>Upravit pojištění</h1>
<form class="form-control" action="updatePojisteni.php" method="post">

    <strong>Pojištění k editaci</strong>
    <br>
    <div class="form-group col-md-6">
        <select class="form-control" name="pojisteniId" pojisteniId="">
            <?php
            $pojisteni->VyplnPojisteni();
            while ($row = mysqli_fetch_assoc($vyplnPojisteni)) {
                $pojisteniId = $row["pojisteniId"];
                $nazev = $row["nazev"];
                $popis = $row["popis"];
                echo "<option value='$pojisteniId'>$pojisteniId $nazev</option>";
            }
            ?>
        </select> </div> 
        <div class="form-group col-md-6"> Název<br>
            <input class="form-control" value="<?php echo htmlspecialchars($nazev) ?>" type="text" name="nazev" required></div>
        <div class="form-group col-md-12">Popis<br>
            <textarea class="form-control" type="text" name="popis" required><?php echo htmlspecialchars($popis) ?></textarea></div>
        <div class="form-group col-md-4">
            <input class="form-control btn btn-primary" type="submit" name="submit" value="Změnit pojištění">
        </div> 
</form> 
<?php require_once 'footer.php'; ?>
