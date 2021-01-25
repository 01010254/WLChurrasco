<?php


    $mensagem ='';
    if(isset($_GET['status'])){
        switch ($_GET['status']) {
            case 'success':
                $mensagem= '<div class="alert alert-success" style="margin-top: 18px;">Ação executada com sucesso!</div>';

            break;
            case 'error':
                $mensagem= '<div class="alert alert-danger" style="margin-top: 18px;">Ação não executada!</div>';

            break;
        }
    }

    $resultados = '';
    foreach($churrascowl as $churrasco){
        $resultados .='<tr>
                        <td>'.$churrasco->id.'</td>
                        <td>'.$churrasco->nome.'</td>
                        <td>'.($churrasco->comparecer == 's'? 'Vai comparecer':' Não vai comparecer').'</td>
                        <td>'.($churrasco->bebida ==  's'?'Bebe':'Não bebe').'</td>
                        <td>'.($churrasco->convidado == 's'?'Vai levar convidado':'Não vai levar convidado').'</td>
                        <td>'.($churrasco->cv_bebida == 's'?'Convidado bebe':'Convidado não bebe').'</td>
                        <td>R$'.$churrasco->valor.',00</td>
                        <td>
                            <a href="editar.php?id='.$churrasco->id.'"><button type="button" class="btn btn-success btn-primary">Editar</button>
                            </a>
                            <a href="excluir.php?id='.$churrasco->id.'"><button type="button" class="btn btn-success btn-danger">Excluir</button>
                            </a>
                        </td>
                     </tr>';

    }

    $totais = '';
    foreach($total as $totais){
        $resultados .='<tr class="row-titles">
                        <td colspan="2"> <b>TOTAL</b>  R$'.$totais->total1.',00</td> <td colspan="2"> <b>TOTAL COMIDAS</b> R$'.$totais->totalcomidas.',00</td> <td colspan="2"> <b>TOTAL BEBIDAS</b> R$'.$totais->totalbebidas.',00</td><td colspan="3"></td> </tr>
                     ';

    }

        $resultados = strlen($resultados) ? $resultados : '<tr>
                                                                <td colspan="8" class="text-center">Nenhum cadastro encontrado</td></tr>';



?>

<main>
     <?=$mensagem?> 
    <section>
        <table class="table bg-light mt-3 ">
            <thead class="table bg-light mt-3">
                <tr class="row-titles">
                <th>ID</th>
                <th>NOME</th>
                <th>COMPARECERÁ</th>
                <th>BEBE</th>
                <th>CONVIDADO</th>
                <th>CONVIDADO BEBE</th>
                <th>VALOR </th>
                <th>AÇÕES</th>
                </tr>
                
            </thead>
            <tbody>
                <?=$resultados?>
                

            </tbody>

        </table>
    </section>
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Casdastro Churrasco</button>
        </a>
    </section>

</main>