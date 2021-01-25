<?php

require __DIR__. '/vendor/autoload.php';




use \App\Entity\Churrasco;

//validacao do id
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//CONSULTA FUNCIONARIO
$obChurrasco = Churrasco::getChurrasco($_GET['id']);
// echo "<pre>"; print_r($obChurrasco); echo "</prev>"; exit;

//validacao do funcionario
if(!$obChurrasco instanceof Churrasco){
    header('location: index.php?status=error');
    exit;
}




if(isset($_POST['excluir'])){
    
    $obChurrasco->excluir();
   
    header('location: index.php?status=success');
    exit;
    // echo "<pre>"; print_r($obChurrasco); echo "</prev>"; exit;

}



include __DIR__. '/includes/header.php';
include __DIR__. '/includes/confirmar-exclusao.php';
include __DIR__. '/includes/footer.php';