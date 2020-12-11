<div class="container">
      <a class="btn btn-round bot-dourado mt-4" href="<?= base_url('index.php/auth/lista'); ?>"><i class="fas fa-caret-left"></i>&nbsp;&nbsp;Voltar</a>
      <div class="row">
            <div class="col-md-5 col-xs-10 mx-auto">
                  <h1><?php echo lang('edit_group_heading');?></h1>
                  <p><?php echo lang('edit_group_subheading');?></p>
                  <div id="infoMessage"><?php echo $message;?></div>
                  <?php echo form_open(current_url());?>
                        <p>
                              <?php echo lang('edit_group_name_label', 'group_name', 'class="mt-3"');?><br/>
                              <?php echo form_input($group_name);?>
                        </p>
                        <p>
                              <?php echo lang('edit_group_desc_label', 'description', 'class="mt-3"');?><br/>
                              <?php echo form_input($group_description);?>
                        </p>
                        <p><?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-primary mt-3"');?></p>
                  <?php echo form_close();?>
            </div>
      </div>
</div>