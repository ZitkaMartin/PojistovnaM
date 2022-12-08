<?php
$title = "Upravit pojištěnce";
require_once 'header.php';

//výběr všech dat z databáze pro zobrazení do "option"
$pojistenec = new Pojistenec();
$pojistenec->VratPojistence();

//načtení dat z formuláře a dotaz do databáze
if (isset($_POST["submit"])) {
    $pojistenec->UpravPojistence();
}
?>
<h1>Upravit pojištěnce</h1>
<form class="form-control" action="updatePojistenciAll.php" method="post">
    <div class="form-row">
        <strong>Vyberte pojištěnce k editaci</strong>
        <br>
        <select class="form-control alert-primary" name="pojistenecId" pojistenecId="">
            <?php
            $pojistenec->VyberPojistence();
            ?>
        </select><br>

        <div class="form-group col-md-6"> Jméno<br>
            <input class="form-control" type="text" name="jmeno" required><br></div>
        <div class="form-group col-md-6">Příjmení<br>
            <input class="form-control" type="text" name="prijmeni" required><br></div>
        <div class="form-group col-md-6">Datum narození<br>
            <input class="form-control" type="date" name="datumNarozeni" required><br></div>
        <div class="form-group col-md-6">Telefon<br>
            <input class="form-control" type="text" name="telefon" required><br></div></div>
    <input class="form-group col-md-4 btn btn-primary" type="submit" name="submit" value="Změnit údaje">  

</form> 
<?php require_once 'footer.php'; ?>