<div class="container pt-5 pb-5 mt-5 mb-5">
	<div class="row mt-5">
		<div class="col-6 mx-auto">
			<h1 class="display-3">Página em Construção</h1>
				<?php if ($this->session->flashdata("success")) : ?>
				<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
				<?php endif ?>
			<a class="btn btn-primary" href="<?= base_url(); ?>login/logout">Sair</a>
		</div>
	</div>
</div>