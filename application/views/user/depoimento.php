<section class="profile-content">
    <div class="tab-pane active" id="ficha" role="tabpanel">
        <div class="row mt-4 font-weight-normal">
            <div class="col-md-7 col-xs-9 mx-auto">
                <form method="POST">  
                    <h3 class="mb-4">Deixe sua opinião sobre o atendimento!</h3>
                    <label>Título: </label><input type="text" value="<?= isset($depoimento) ? $depoimento['dep_titulo'] : '' ?>"  maxlenght="28" placeholder="Ótimo" class="form-control" id="dep_titulo" name="dep_titulo"/>
                    <label class="mt-4">Sua Opinião: </label><textarea class="form-control" id="dep_text" name="dep_text"><?= isset($depoimento) ? $depoimento['dep_text'] : '' ?></textarea>
                    <p class="text-center mt-4 mb-2"><button type="submit" onclick="alerta()" class="btn bot-dourado btn-round">Enviar</button></p>
                </form>
            </div>
        </div>
    </div>
</section>