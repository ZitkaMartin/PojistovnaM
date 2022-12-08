<?php
$title = "Odstranit pojištěnce";
require_once 'header.php';

$pojistenec = new Pojistenec();
$pojistenec->VratPojistence();

//kontrola, zda byl formulář odeslán a pokud ano, tak podle údajů z formuláře vymazat příslušné id
if (isset($_POST["submit"])) {
    $pojistenec->VymazPojistence();
}
?>

<h1>Vymazat pojištěnce</h1>
<form class="form-control" action="deletePojistenciAll.php" method="post">
    <div class="form-group col-md-6">
        <strong>Vyberte pojištěnce k odstranění</strong>
        <br>
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
    <div class="form-group col-md-4">
        <input class="form-control btn btn-danger" type="submit" name="submit" value="Smazat"> 
    </div>
</form>
<?php require_once 'footer.php'; ?>