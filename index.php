<?php

require __DIR__. '/vendor/autoload.php';

use \App\Entity\Churrasco;

$churrascowl = Churrasco::getChurrascos();
$total = Churrasco::getTotal();
// $totalbebidas = Churrasco::getTotalBebidas();
// $totalcomidas = Churrasco::getTotalComidas();


include __DIR__. '/includes/header.php';
include __DIR__. '/includes/listagem.php';
include __DIR__. '/includes/footer.php';