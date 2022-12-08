<?php
$title = "Detail pojištění";
require_once './header.php';

$pojistenec = new Pojistenec();
$pojistenec->VypisDetailPojistence();

require_once 'footer.php'; ?>

