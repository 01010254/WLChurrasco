<?php

require __DIR__. '/vendor/autoload.php';

define('TITLE', 'Editar funcionario');


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






if(isset($_POST['nome'],$_POST['comparecer'],$_POST['bebida'],$_POST['valor'],$_POST['convidado'],$_POST['cv_bebida'],$_POST['valor'])){
    
    $obChurrasco->nome = $_POST['nome'];
    $obChurrasco->comparecer = $_POST['comparecer'];
    $obChurrasco->bebida = $_POST['bebida'];
    $obChurrasco->convidado = $_POST['convidado'];
    $obChurrasco->cv_bebida = $_POST['cv_bebida'];
    $obChurrasco->valor = $_POST['valor'];
    $obChurrasco->atualizar();
    // echo "<pre>"; print_r($obChurrasco); echo "</prev>"; exit;


    
    header('location: index.php?status=success');
    exit;

    // echo "<pre>"; print_r($obChurrasco); echo "</prev>"; exit;

}



include __DIR__. '/includes/header.php';
include __DIR__. '/includes/formulario.php';
include __DIR__. '/includes/footer.php';