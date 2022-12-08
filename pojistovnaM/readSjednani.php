<?php
$title = "Sjednané smlouvy";
require_once 'header.php';
?>
<h1>Seznam uzavřených pojištění</h1>
<?php
$sjednani = new Sjednani();
$sjednani->VypisSjednani();
require_once 'footer.php'; ?>