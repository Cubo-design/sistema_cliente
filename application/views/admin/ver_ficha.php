<div class="container">
  <div class="row mt-4 font-weight-normal">
    <div class="col-md-10 col-xs-10 mx-auto">
        <form method="POST">
            <h2 class="text-uppercase text-center mb-4">Ficha de Anamnese</h2>
            <?= validation_errors(); ?> 
                <div class="row"> 
                    <p class="col-lg-12">
                        <label for="nome">Nome Completo: </label><input class="form-control" value="<?= isset($user) ? $user['first_name'].' '.$user['last_name'] : ''; ?>" type="text" id="nome" name="nome" maxlenght="128" readonly readonly="readonly"/>
                    </p>
                    <p class="col-lg-6">
                        <label for="nasc" class="pt-4">Data de Nascimento: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['data_nasc'] : ''; ?>" type="date" id="data_nasc" name="data_nasc" maxlenght="8" readonly/>
                    </p>
                    <p class="col-lg-6">
                        <label for="tel" class="pt-4">Telefone/Celular: </label><input class="form-control" value="<?= isset($user) ? $user['phone']: ''; ?>"  type="tel" id="telefone" name="telefone" maxlenght="11" readonly <?= $user['phone'] ? 'readonly="readonly"' : ''; ?>/>
                    </p>
                    <p class="col-lg-4">
                        <label for="cep" class="pt-4">CEP: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['cep'] : ''; ?>" name="cep" id="cep" readonly/>
                    </p>
                    <p class="col-lg-4">
                        <label for="estado" class="pt-4">Estado: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['estado'] : ''; ?>" name="estado" id="estado" data-autocomplete-state readonly/>
                    </p>	
                    <p class="col-lg-4">
                        <label for="numero" class="pt-4">Número: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['numero'] : ''; ?>" name="numero" id="numero" type="number" readonly/>
                    </p>
                    <p class="col-lg-6">
                        <label for="bairro" class="pt-4">Bairro: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['bairro'] : ''; ?>" name="bairro" id="bairro" data-autocomplete-neighborhood readonly/>
                    </p>
                    <p class="col-lg-6">
                        <label for="cidade" class="pt-4">Cidade: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['cidade'] : ''; ?>" name="cidade" id="cidade" data-autocomplete-city readonly/>
                    </p>
                    <p class="col-lg-12">
                        <label for="end" class="pt-4">Endereço: </label><input class="form-control" type="text" value="<?= $ficha['endereco'] ?>" id="endereco" name="endereco" maxlenght="256" data-autocomplete-address readonly/>
                    </p>
                </div>
                <div class="row">
                    <h4 class="col-12 font-weight-bold ">Se menor:</h4>
                    <p class="col-lg-8">
                        <label for="responsavel" class="pt-4">Responsável: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['resp_nome'] : ''; ?>" type="text" id="resp_nome" name="resp_nome" maxlenght="128" readonly/>
                    </p>
                    <p class="col-lg-4">
                        <label for="tel_res" class="pt-4">Telefone/Celular: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['fone'] : ''; ?>" type="tel" id="fone" name="fone" maxlenght="11" readonly/>
                    </p>
                    <p class="col-lg-4">
                        <label for="cpf" class="pt-4">CPF: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['cpf'] : ''; ?>" id="cpf" name="cpf" readonly/>
                    </p>
                    <p class="col-lg-4">                     
                        <label for="rg" class="pt-4">RG: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['rg'] : ''; ?>" id="rg" name="rg" readonly/>
                    </p>
                    <p class="col-lg-4">
                        <label for="nasc_resp" class="pt-4">Data de Nascimento: </label><input class="form-control" value="<?= isset($ficha) ? $ficha['nasc_resp'] : ''; ?>" type="date" id="nasc_resp" name="nasc_resp" maxlenght="8" readonly/>
                    </p>
                </div>
                <div class="row text-capitalize pt-2"> 
                    <h4 class="text-uppercase mb-4 pt-2 font-weight-bold col-12">Avaliação</h4>
                    <p class="col-lg-3">usa rímel: <br/>
                        <input type="radio" name="rimel" value="rimel_sim" <?= $ficha['rimel'] == "rimel_sim" ? 'checked' : ''; ?>> sim<br/>
                        <input type="radio" name="rimel" value="rimel_nao" <?= $ficha['rimel'] == "rimel_nao" ? 'checked' : ''; ?>> não
                    </p>
                    <p class="col-lg-3">alergia (esmalte ou cosméticos): <br/>
                        <input type="radio" name="alergia" value="alergia_sim" <?= $ficha['alergia'] == "alergia_sim" ? 'checked' : ''; ?>> sim<br/>
                        <input type="radio" name="alergia" value="alergia_nao" <?= $ficha['alergia'] == "alergia_nao" ? 'checked' : ''; ?>> não
                    </p>
                    <p class="col-lg-3">problemas de tireoide: <br/>
                        <input type="radio" name="prob_tir" value="tireoide_sim" <?= $ficha['prob_tir'] == "tireoide_sim" ? 'checked' : ''; ?>> sim<br/>
                        <input type="radio" name="prob_tir" value="tireoide_nao" <?= $ficha['prob_tir'] == "tireoide_nao" ? 'checked' : ''; ?>> não
                    </p>
                    <p class="col-lg-3">grávida: <br/>
                        <input type="radio" name="gravida" value="gravida_sim" <?= $ficha['gravida'] == "gravida_sim" ? 'checked' : ''; ?>> sim<br/>
                        <input type="radio" name="gravida" value="gravida_nao" <?= $ficha['gravida'] == "gravida_nao" ? 'checked' : ''; ?>> não
                    </p>
                    <p class="col-lg-3 pt-3">dorme de qual lado:<br/>
                        <input type="radio" name="lado" value="lado_dir" <?= $ficha['lado'] == "lado_dir" ? 'checked' : ''; ?>> direito<br/>
                        <input type="radio" name="lado" value="lado_esq" <?= $ficha['lado'] == "lado_esq" ? 'checked' : ''; ?>> esquerdo<br/>
                        <input type="radio" name="lado" value="lado_out" <?= $ficha['lado'] == "lado_out" ? 'checked' : ''; ?>> outro
                    </p>
                    <p class="col-lg-3 pt-3">faz tratamento oncológico: <br/>
                        <input type="radio" name="trat_onco" value="trat_onco_sim" <?= $ficha['trat_onco'] == "trat_onco_sim" ? 'checked' : ''; ?>> sim<br/>
                        <input type="radio" name="trat_onco" value="trat_onco_nao" <?= $ficha['trat_onco'] == "trat_onco_nao" ? 'checked' : ''; ?>> não
                    </p>
                    <p class="col-lg-3 pt-3">algum procedimento feito recentemente nos olhos? <br/>
                        <input type="radio" name="proc_rec" value="proc_rec_sim" <?= $ficha['proc_rec'] == "proc_rec_sim" ? 'checked' : ''; ?>> sim<br/>
                        <input type="radio" name="proc_rec" value="proc_rec_nao" <?= $ficha['proc_rec'] == "proc_rec_nao" ? 'checked' : ''; ?>> não
                    </p>
                    <p class="col-lg-3 pt-3">algum problema ocular? (Glaucoma/blefarite/etc) <br/>
                        <input type="radio" name="prob_oc" value="prob_oc_sim" <?= $ficha['prob_oc'] == "prob_oc_sim" ? 'checked' : ''; ?>> sim<br/>
                        <input type="radio" name="prob_oc" value="prob_oc_nao" <?= $ficha['prob_oc'] == "prob_oc_nao" ? 'checked' : ''; ?>> não
                    </p>
                </div>
                <div class="row mt-4"> 
                    <p>Se existir algum problema que julgue ser necessário informar a profissional antes do procedimento, descreva-o por favor:</p>
                        <textarea class="form-control" name="prob_out" id="prob_out" readonly><?= isset($ficha) ? $ficha['prob_out'] : ''; ?></textarea>
                    <p class="pt-3 pb-3"><b class="text-uppercase">Autorizo</b> também que fotografem o local do “antes” e “depois” para efeito de documentação, <i>book</i>, divulgação do trabalho da profissional, e que este material<b class="text-uppercase"> seja ou não utilizado</b>, para fins científicos em congressos, simpósios, etc.</p>                        
                    <p class="col-lg-4 pt-2">Executado: <br/>
                        <input type="radio" name="extensao" value="extensao_fio" <?= $ficha['extensao'] == "extensao_fio" ? 'checked' : ''; ?>> Fio a Fio<br/>
                        <input type="radio" name="extensao" value="extensao_russo" <?= $ficha['extensao'] == "extensao_russo" ? 'checked' : ''; ?>> Volume Russo<br/>
                        <input type="radio" name="extensao" value="extensao_mega" <?= $ficha['extensao'] == "extensao_mega" ? 'checked' : ''; ?>> Mega Volume<br/>
                        <input type="radio" name="extensao" value="extensao_outra" <?= $ficha['extensao'] == "extensao_outra" ? 'checked' : ''; ?>> Outra<br/>
                    </p>
                    <p class="col-lg-8">
                        <label for="data_proc">Data do Procedimento: </label><input class="form-control" type="date" value="<?= isset($ficha) ? $ficha['data_proc'] : ''; ?>" id="data_proc" name="data_proc" maxlenght="8" readonly/>
                        <label for="cola" class="pt-3">Cola: </label><input class="form-control" type="text" value="<?= isset($ficha) ? $ficha['cola'] : ''; ?>" id="cola" name="cola" maxlenght="128" />
                        </p>
                    </div>
                    <h3 class="text-uppercase text-center mb-4 pt-3">termo de responsabilidade</h3>
                    <div class="row mb-5">
                        <p>Manutenção válida por <b>15 dias</b>, após 15 dias o valor <b class="text-uppercase">integral</b> será cobrado.</p>
                        <p class="mb-4">A <b class="text-uppercase">durabilidade</b> da aplicação depende muito dos <b class="text-uppercase">cuidados da cliente</b>, que deverá seguir às <b class="text-uppercase">recomendações</b>.</p>
                        <label for="assinatura">Assinatura da Cliente: </label><input class="form-control" type="text" readonly/>
                    </div>
                    <div class="col-md-2 mx-auto mb-5">
                        <div class="row text-center">
                            <input type="button" class="btn btn-primary" value="Imprimir" id="imprimir" onClick="window.print();"/>
                        </div>
                    </div>
                </div>
        </form>
    </div>
  </div>
</div>