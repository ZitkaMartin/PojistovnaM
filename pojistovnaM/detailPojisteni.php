<?php
$title = "Detail pojištění";
require_once './header.php';

$pojisteni = new Pojisteni();
$pojisteni->VypisDetailPojisteni();

require_once 'footer.php'; ?>

