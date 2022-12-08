<?php
$title = "Upravit pojištění";
require_once 'header.php';

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
        <strong>Vyberte pojištění k editaci</strong>
        <br>
        <div class="form-group col-md-6">
        <select class="form-control alert-primary" name="pojisteniId" pojisteniId="">
            <?php
            $pojisteni->VyberPojisteni();
            ?>
        </select><br></div>
        <div class="form-group col-md-6">Nový název<br>
            <input class="form-control" type="text" name="nazev" required></div>
        <div class="form-group col-md-12">Popis<br>
            <textarea class="form-control" type="text" name="popis" required></textarea></div>
        <div class="form-group col-md-4">
            <input class="form-control btn btn-primary" type="submit" name="submit" value="Změnit pojištění">
        </div>  
</form> 
<?php require_once 'footer.php'; ?>
