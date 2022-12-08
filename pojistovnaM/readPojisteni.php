<?php
$title = "Výpis pojištění";
require_once 'header.php';
?>
<h1>Seznam pojištění</h1>
<?php
$pojisteni = new Pojisteni();
$pojisteni->VypisPojisteni();
require_once 'footer.php'; ?>