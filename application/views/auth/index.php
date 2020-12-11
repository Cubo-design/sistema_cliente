<div class="container">
	<div class="row">
		<a class="btn btn-round bot-dourado mt-4" href="<?= base_url('index.php/admin'); ?>"><i class="fas fa-caret-left"></i>&nbsp;&nbsp;Voltar</a>
		<div class="col-md-11 mx-auto text-center">
			<h1><?= lang('index_heading');?></h1>
			<p><?= lang('index_subheading');?></p>
			<div id="infoMessage"><?= $message;?></div>
			<table class="table table-hover mt-4" cellpadding=0 cellspacing=10>
				<thead class="black white-text">	
					<tr>
						<th scope="col"><?= lang('index_fname_th');?> Completo</th>
						<th scope="col"><?= lang('index_email_th');?></th>
						<th scope="col"><?= lang('index_groups_th');?></th>
						<th scope="col"><?= lang('index_status_th');?></th>
						<th scope="col"><?= lang('index_action_th');?></th>
						<th scope="col">Ficha de Anamnese</th>
					</tr>
				</thead>
				<?php foreach ($users as $user):?>
					<tr>
						<td><?= htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?>&nbsp;<?= htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
						<td><a href="mailto:<?= htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?>?subject=Olá"><?= htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></a></td>
						<td>
							<?php foreach ($user->groups as $group):?>
								<?= anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
							<?php endforeach?>
						</td>
						<td><?= ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
						<td><?= anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
						<td><?= anchor("admin/user_ficha/".$user->id, '<i class="fas fa-clipboard-list" title="Visualizar"></i>') ;?></td>
					</tr>
				<?php endforeach;?>
			</table>
			<p class="mb-3"><?= anchor('auth/create_user', lang('index_create_user_link'))?> | <?= anchor('auth/create_group', lang('index_create_group_link'))?></p>
		</div>
	</div>
</div>