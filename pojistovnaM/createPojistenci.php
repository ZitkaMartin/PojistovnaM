<?php
$title = "Vytvořit pojištěnce";
require_once 'header.php';

if (isset($_POST["submit"])) {
    $pojistenec = new Pojistenec();
    $pojistenec->PridejPojistence();    
}
?>       
        <h1>Vytvořit nového pojištěnce</h1>
        <form class="form-control" action="createPojistenci.php" method="POST">
            <div class="form-row">
            <div class="form-group col-md-6">
            Jméno<br>
            <input class="form-control" type="text" name="jmeno" required></div>
            <div class="form-group col-md-6">
            Příjmení<br>
            <input class="form-control" type="text" name="prijmeni" required></div>
            <div class="form-group col-md-6">
            Datum narození<br>
            <input class="form-control" type="date" name="datumNarozeni" required></div>
            <div class="form-group col-md-6">
            Telefon<br>
            <input class="form-control" type="text" name="telefon" required></div>
            <div class="form-group col-md-2">
            <input class="form-control btn btn-primary" type="submit" name="submit" value="Vytvořit"></div>    
        </div></form>
<?php require_once 'footer.php'; ?>
