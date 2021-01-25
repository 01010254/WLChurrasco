<div style="width: 100%; flex: 1 0 auto;">
<main class="main" style="width: 100%; flex: 1 0 auto;">
    <section style="width: 100%; flex: 1 0 auto;">
        <div class="div-btn-voltar">
            <a href="index.php">
                <button class="btn btn-success">Voltar</button>
            </a>
        </div>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>
    <form method="POST" style="width: 100%; flex: 1 0 auto;">
        <div class=form-js>
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?=$obChurrasco->nome?>">
            </div>
            <div class="form-group">
                <label>Comparecer:</label>
                <div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="comparecer" value="s" id="1" checked>Vai
                        </label>
                    </div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="comparecer" value="n" id="2" <?=$obChurrasco->comparecer == 'n' ? 'checked' : ''?> >Nao Vai
                        </label>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label>Bebe:</label>
                <div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="bebida" value="s" id="3" checked>Bebe
                        </label>
                    </div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="bebida" value="n" id="4" <?=$obChurrasco->bebida == 'n' ? 'checked' : ''?> >Nao bebe
                        </label>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label>Convidado:</label>
                <div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="convidado" value="s" id="5" checked>Vai levar convidado
                        </label>
                    </div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="convidado" value="n" id="6" <?=$obChurrasco->convidado == 'n' ? 'checked' : ''?> >Nao Vai levar convidado
                        </label>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label>Convidado bebe:</label>
                <div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="cv_bebida" value="s" id="7" checked>Bebe
                        </label>
                    </div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="cv_bebida" value="n" id="8" <?=$obChurrasco->cv_bebida == 'n' ? 'checked' : ''?>>Nao Bebe
                        </label>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label>Valor</label>
                <div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="valor" value="60" id="60" checked >R$ 60,00
                        </label>
                    </div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="valor" value="50" id="50" <?=$obChurrasco->valor == '50' ? 'checked' : ''?>>R$ 50,00
                        </label>
                    </div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="valor" value="40" id="40" <?=$obChurrasco->valor == '40' ? 'checked' : ''?>>R$ 40,00
                        </label>
                    </div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="valor" value="30" id="30" <?=$obChurrasco->valor == '30' ? 'checked' : ''?>>R$ 30,00
                        </label>
                    </div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="valor" value="20" id="20" <?=$obChurrasco->valor == '20' ? 'checked' : ''?>>R$ 20,00
                        </label>
                    </div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="valor" value="10" id="10" <?=$obChurrasco->valor == '10' ? 'checked' : ''?>>R$ 10,00
                        </label>
                    </div>
                    <div class="div-form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="valor" value="0" id="0" <?=$obChurrasco->valor == '0' ? 'checked' : ''?> >R$ 0,00
                        </label>
                    </div>
                    
                    
                   
                   
                    
                    
                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Enviar</button>

            </div>
        </div>
        <script>
            $(document).ready(function () {
                $(".form-js").find("input[type='radio']").click(function () {


                    document.getElementById("0").disabled = false;
                    document.getElementById("10").disabled = false;
                    document.getElementById("20").disabled = false;
                    document.getElementById("30").disabled = false;
                    document.getElementById("40").disabled = false;
                    document.getElementById("50").disabled = false;
                    document.getElementById("60").disabled = false;
                    document.getElementById("3").disabled = false;
                    document.getElementById("4").disabled = false;
                    document.getElementById("5").disabled = false;
                    document.getElementById("6").disabled = false;
                    document.getElementById("7").disabled = false;
                    document.getElementById("8").disabled = false;

                    if ($("#1").prop("checked") && $("#3").prop("checked") && $("#5").prop("checked") && $("#7").prop("checked")) {
                        document.getElementById("60").checked = true;
                        document.getElementById("0").disabled = true;
                        document.getElementById("10").disabled = true;
                        document.getElementById("20").disabled = true;
                        document.getElementById("30").disabled = true;
                        document.getElementById("40").disabled = true;
                        document.getElementById("50").disabled = true;


                    }
                    if ($("#1").prop("checked") && $("#4").prop("checked") && $("#5").prop("checked") && $("#7").prop("checked")) {
                        document.getElementById("50").checked = true;
                        document.getElementById("0").disabled = true;
                        document.getElementById("10").disabled = true;
                        document.getElementById("20").disabled = true;
                        document.getElementById("30").disabled = true;
                        document.getElementById("40").disabled = true;
                        document.getElementById("60").disabled = true;


                    }
                    if ($("#1").prop("checked") && $("#3").prop("checked") && $("#6").prop("checked")) {
                        document.getElementById("20").checked = true;
                        document.getElementById("0").disabled = true;
                        document.getElementById("10").disabled = true;
                        document.getElementById("60").disabled = true;
                        document.getElementById("30").disabled = true;
                        document.getElementById("40").disabled = true;
                        document.getElementById("50").disabled = true;
                        document.getElementById("7").disabled = true;
                        
                        document.getElementById("7").checked = false;
                        document.getElementById("8").checked = true;



                    }
                    if ($("#1").prop("checked") && $("#3").prop("checked") && $("#5").prop("checked") && $("#8").prop("checked")) {
                        document.getElementById("40").checked = true;
                        document.getElementById("0").disabled = true;
                        document.getElementById("10").disabled = true;
                        document.getElementById("20").disabled = true;
                        document.getElementById("30").disabled = true;
                        document.getElementById("60").disabled = true;
                        document.getElementById("50").disabled = true;


                    }
                    if ($("#2").prop("checked")) {
                        document.getElementById("0").checked = true;
                        document.getElementById("60").disabled = true;
                        document.getElementById("10").disabled = true;
                        document.getElementById("20").disabled = true;
                        document.getElementById("30").disabled = true;
                        document.getElementById("40").disabled = true;
                        document.getElementById("50").disabled = true;

                        document.getElementById("3").disabled = true;
                        
                        document.getElementById("5").disabled = true;
                        
                        document.getElementById("7").disabled = true;
                        

                        document.getElementById("3").checked = false;
                        document.getElementById("4").checked = true;
                        document.getElementById("5").checked = false;
                        document.getElementById("6").checked = true;
                        document.getElementById("7").checked = false;
                        document.getElementById("8").checked = true;



                    }

                    if ($("#1").prop("checked") && $("#3").prop("checked") && $("#5").prop("checked") && $("#8").prop("checked")) {
                        document.getElementById("40").checked = true;
                        document.getElementById("0").disabled = true;
                        document.getElementById("10").disabled = true;
                        document.getElementById("20").disabled = true;
                        document.getElementById("30").disabled = true;
                        document.getElementById("60").disabled = true;
                        document.getElementById("50").disabled = true;


                    }
                    if ($("#1").prop("checked") && $("#4").prop("checked") && $("#5").prop("checked") && $("#8").prop("checked")) {
                        document.getElementById("30").checked = true;
                        document.getElementById("0").disabled = true;
                        document.getElementById("10").disabled = true;
                        document.getElementById("20").disabled = true;
                        document.getElementById("60").disabled = true;
                        document.getElementById("40").disabled = true;
                        document.getElementById("50").disabled = true;


                    }
                    if ($("#1").prop("checked") && $("#4").prop("checked") && $("#6").prop("checked")) {
                        document.getElementById("10").checked = true;
                        document.getElementById("0").disabled = true;
                        document.getElementById("30").disabled = true;
                        document.getElementById("20").disabled = true;
                        document.getElementById("60").disabled = true;
                        document.getElementById("40").disabled = true;
                        document.getElementById("50").disabled = true;
                        document.getElementById("7").disabled = true;
                        
                        document.getElementById("7").checked = false;
                        document.getElementById("8").checked = true;



                    }

                    /*  1 -vai 10
                        2 -nao vai 0
                        3 -bebe 10
                        4 -nao bebe 0
                        5 -vai levar cv 20
                        6 -nao vai levar cv 0
                        7 -cv bebe 20
                        8 -cv nao bebe 0
                        9 -
                        */


                })
            });
        </script>
    </form>
</main>
</div>