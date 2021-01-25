<main>
    <section>
        
    </section>

    <h2 class="mt-3">Excluir cadastro</h2>
    <form method="POST">

            <div class="form-group">
                <p>Você realmente deseja excluir o Cadastro do <strong><?=$obChurrasco->nome?></strong></p>
            </div>





        <div class="form-group" style="display: flex;">
            <div class="div-btn-voltar">
                <a href="index.php">
                    <button type="button" class="btn btn-success">Cancelar</button>
                </a>
                <button type="submit" name="excluir" class="btn btn-success btn-danger">Excluir</button>
            </div>
            
            

        </div>
        
    </form>
</main>