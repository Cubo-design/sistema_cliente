<div class="container">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
            <form class="text-center p-5" method="post" name="cadastro" action="#!">
                <p class="h4 mb-4">Login</p>
				<?php if ($this->session->flashdata("danger")) : ?>
				<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
				<?php endif ?>
                <input type="email" id="email" name="email" class="form-control mb-4" value="" size="50" placeholder="E-mail" required>
                <input type="password" id="senha" name="senha" class="form-control mb-4"  value="" size="50" placeholder="Senha" required>
                <button class="btn btn-info btn-block my-4" type="submit">Login</button>
                <p>Não é um membro?
                    <a href="../form">Registre-se</a>
                </p>
            </form>
        </div>
    </div>
</div>