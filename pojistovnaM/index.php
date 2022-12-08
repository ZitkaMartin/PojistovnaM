<?php
$title = "Home";
require_once 'header.php';
$admin = new Admin();
?>
<div class="row mt-5">
    <div class="col alert-secondary m-1">
        <h3 class="text-center">Pojistné smlouvy</h3>
        <a class="btn btn-primary d-flex justify-content-center m-4" role="link" href="readSjednani.php">Výpis uzavřených smluv</a>
        <a class="btn btn-success d-flex justify-content-center m-4" role="link" href="createSjednani.php">Vytvořit smlouvu</a>
        <a class="btn btn-danger d-flex justify-content-center m-4" role="link" href="deleteSjednani.php">Ukončit smlouvu</a>
    </div>
    <div class="col alert-secondary m-1">
        <h3 class="text-center">Správa pojištění</h3>
        <a class="btn btn-primary d-flex justify-content-center m-4" role="link" href="readPojisteni.php">Výpis pojištění</a>
        <?php $admin->VypisIndexPojisteni(); ?>

    </div>
    <div class="col alert-secondary m-1">
        <h3 class="text-center">Správa pojištěnců</h3>
        <a class="btn btn-primary d-flex justify-content-center m-4" role="link" href="readPojistenci.php">Výpis pojištěnců</a>
        <a class="btn btn-success d-flex justify-content-center m-4" role="link" href="createPojistenci.php">Vytvořit pojištěnce</a>
        <a class="btn btn-warning d-flex justify-content-center m-4" role="link" href="createPojistenci.php">Upravit pojištěnce</a>
        <a class="btn btn-danger d-flex justify-content-center m-4" role="link" href="createPojistenci.php">Odstranit pojištěnce</a>
    </div>
        <?php $admin->VypisIndexUzivatele(); ?>
</div>


<?php require_once 'footer.php'; ?>