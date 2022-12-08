<?php
$title = "Upravit pojištěnce";
require_once 'header.php';

$pojistenec = new Pojistenec();
$pojistenec->VratPojistence();

//načtení dat z formuláře a dotaz do databáze
if (isset($_POST["submit"])) {
    $pojistenec->UpravPojistence();
}

?>
        <h1>Upravit pojištěnce</h1>
        <form class="form-control" action="updatePojistenci.php" method="post">
        <select class="form-control" name="pojistenecId" pojistenecId="">

            <?php
            $pojistenec->VyplnPojistence();
            while ($row = mysqli_fetch_assoc($vyplnPojistence)) {
                $pojistenecId = $row["pojistenecId"];
                $jmeno = $row["jmeno"];
                $prijmeni = $row["prijmeni"];
                $datumNarozeni = $row["datumNarozeni"];
                $telefon = $row["telefon"];
                echo "<option value='$pojistenecId'>$pojistenecId $jmeno $prijmeni</option>";
            }
            ?> 
        </select><br>
            

    <div class="form-row">     
        <br>
        <div class="form-group col-md-6"> Jméno<br>
            <input class="form-control" value="<?php echo htmlspecialchars($jmeno) ?>" type="text" name="jmeno" required></div>
        <div class="form-group col-md-6">Příjmení<br>
            <input class="form-control" value="<?php echo htmlspecialchars($prijmeni) ?>" type="text" name="prijmeni" required></div>
        <div class="form-group col-md-6">Datum narození<br>
            <input class="form-control" value="<?php echo htmlspecialchars($datumNarozeni) ?>" type="date" name="datumNarozeni" required></div>
        <div class="form-group col-md-6">Telefon<br>
            <input class="form-control" value="<?php echo htmlspecialchars($telefon) ?>" type="text" name="telefon" required></div></div>
    <input class="form-group col-md-4 btn btn-primary" type="submit" name="submit" value="Změnit údaje">  

</form> 
<?php require_once 'footer.php';?>