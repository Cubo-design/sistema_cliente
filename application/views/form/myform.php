<div class="container">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
        <?= validation_errors(); ?>
            <form class="text-center p-5" method="post" name="cadastro" action="#!">
                <p class="h4 mb-4">Cadastro</p>
                <input type="text" id="nome" class="form-control mb-4"  name="nome" plac value="" size="50" placeholder="Nome">
                <input type="email" id="email" class="form-control mb-4" name="email" value="" size="50" placeholder="E-mail">
                <input type="password" id="senha" class="form-control mb-4" name="senha" value="" size="50" placeholder="Senha">
                <input type="password" id="confsenha" class="form-control mb-4" name="confsenha" value="" size="50" placeholder="Confirme a Senha">
                <button class="btn btn-info btn-block my-4" type="submit">Cadastre-se</button>
                <p>Já é um membro?
                    <a href="<?= base_url(); ?>login/autentica">Login</a>
                </p>
            </form>
        </div>
    </div>
</div>