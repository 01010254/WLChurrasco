<?php

require __DIR__. '/vendor/autoload.php';

define('TITLE', 'Cadastrar funcionario');

use \App\Entity\Churrasco;
$obChurrasco = new Churrasco;

if(isset($_POST['nome'],$_POST['comparecer'],$_POST['bebida'],$_POST['valor'],$_POST['convidado'],$_POST['cv_bebida'],$_POST['valor'])){
    
    $obChurrasco->nome = $_POST['nome'];
    $obChurrasco->comparecer = $_POST['comparecer'];
    $obChurrasco->bebida = $_POST['bebida'];
    $obChurrasco->convidado = $_POST['convidado'];
    $obChurrasco->cv_bebida = $_POST['cv_bebida'];
    $obChurrasco->valor = $_POST['valor'];
    $obChurrasco->cadastrar();
    
    header('location: index.php?status=success');
    exit;

    // echo "<pre>"; print_r($obChurrasco); echo "</prev>"; exit;

}



include __DIR__. '/includes/header.php';
include __DIR__. '/includes/formulario.php';
include __DIR__. '/includes/footer.php';