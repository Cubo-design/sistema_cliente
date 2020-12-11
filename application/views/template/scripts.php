    <script src="<?= base_url(); ?>public/assets/js/core/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/core/mdb.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/bootstrap-switch.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/moment.min.js"></script>
    <script src="<?= base_url(); ?>public/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/ui-kit.js?v=2.2.0" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/sweetalert2.all.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/datatables.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>public/assets/js/funcoes.js" type="text/javascript"></script>
    <?php if (isset($scripts)) {
      foreach ($scripts as $script_name) {
        $src = base_url() . "public/assets/js/" . $script_name; ?>
        <script src="<?=$src?>"></script>
      <?php }
    } ?>
</body>
</html>