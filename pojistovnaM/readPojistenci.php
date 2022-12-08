<?php
$title = "Výpis pojištěnců";
require_once 'header.php';
?>
<h1>Seznam pojištěnců</h1>
<?php
$pojistenec = new Pojistenec();
$pojistenec->VypisPojistence();
require_once 'footer.php';
?>