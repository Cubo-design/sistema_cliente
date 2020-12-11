<div class="container">
  <a class="btn btn-round bot-dourado mt-4" href="<?= base_url('index.php/auth/lista'); ?>"><i class="fas fa-caret-left"></i>&nbsp;&nbsp;Voltar</a>
  <div class="row">
    <div class="col-md-9 mx-auto text-center">
      
        <h1><?php echo lang('deactivate_heading');?></h1>
        <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?>?</p>
        <?php echo form_open("auth/deactivate/".$user->id);?>
          <p>
            <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
            <input type="radio" name="confirm" value="yes" checked="checked" /><br/>
            <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
            <input type="radio" name="confirm" value="no" />
          </p>
          <?php echo form_hidden($csrf); ?>
          <?php echo form_hidden(['id' => $user->id]); ?>
          <p><?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class="btn btn-primary"');?></p>
        <?php echo form_close();?>

    </div>
  </div>
</div>