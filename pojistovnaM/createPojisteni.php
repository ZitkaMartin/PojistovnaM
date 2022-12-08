<?php
$title = "Vytvořit pojištění";
require_once './header.php';

$admin = new Admin();
$admin->OmezPristup();

if (isset($_POST["submit"])) {
    $pojisteni = new Pojisteni();
    $pojisteni->PridejPojisteni();
}
?>

<h1>Vytvořit nové pojištění</h1>
<form class="form-control" action="createPojisteni.php" method="POST">

    <div class="form-group col-md-6">Název<br>
        <input class="form-control" type="text" name="nazev"></div>
    <div class="form-group col-md-12">Popis<br>
        <textarea class="form-control" type="text" name="popis"></textarea></div>
    <div class="form-group col-md-4">
        <input class="form-control btn btn-primary" type="submit" name="submit" value="Odeslat"></div>   
</form>
<?php require_once 'footer.php'; ?>
