<?php
$title = "Odstranit pojištění";
require_once 'header.php';

$admin = new Admin();
$admin -> OmezPristup();

//výběr všech dat z databáze
$pojisteni = new Pojisteni();
$pojisteni->VratPojisteni();

//kontrola, zda byl formulář odeslán a pokud ano, tak podle údajů z formuláře vymazat příslušné id
if (isset($_POST["submit"])) {
    $pojisteni->VymazPojisteni();
}
?>

<h1>Odstranit pojištění</h1>
<form class="form-control" action="deletePojisteni.php" method="post">
    <div class="form-group col-md-6">
        <strong>Vyberte pojištění k odstranění</strong>
        <br>
        <select class="form-control" name="pojisteniId" pojistenecId="">

            <?php
            $pojisteni->VyplnPojisteni();
            while ($row = mysqli_fetch_assoc($vyplnPojisteni)) {
                $pojisteniId = $row["pojisteniId"];
                $nazev = $row["nazev"];
                echo "<option value='$pojisteniId'>$pojisteniId $nazev</option>";
            }
            ?> 
        </select>
    </div>
    <div class="form-group col-md-4">
        <input class="form-control btn btn-danger" type="submit" name="submit" value="Smazat pojištění">
    </div>
</form>
<?php require_once 'footer.php'; ?>