<?php
$title = "Odstranit smlouvu";
require_once 'header.php';

//výběr všech dat z databáze
$sjednani = new Sjednani();
$sjednani->VratSjednani();

//kontrola, zda byl formulář odeslán a pokud ano, tak podle údajů z formuláře vymazat příslušné id
if (isset($_POST["submit"])) {
    $sjednani->VymazSjednani();
}
?>

<h1>Vymazat smluvu</h1>
<form class="form-control" action="deleteSjednaniAll.php" method="post">
    <div class="form-group col-md-12">
        <strong>Vyberte smlouvu k odstranění</strong>
        <br>
        <select  class="form-control" name="sjednaniId" sjednaniId="">

            <?php
            while ($row = mysqli_fetch_assoc($vratSjednani)) {
                $sjednaniId = $row["sjednaniId"];              
                $jmeno = $row["jmeno"];
                $prijmeni = $row["prijmeni"];
                $nazev = $row["nazev"];
                echo "<option value='$sjednaniId'>ID smlouvy $sjednaniId: $jmeno $prijmeni -> $nazev</option>";
            }
            ?> 
        </select>
    </div>
    <div class="form-group col-md-4">
    <input class="form-control btn btn-primary" type="submit" name="submit" value="Smazat">
    </div>
</form>
<?php require_once 'footer.php'; ?>