            <div class="tab-pane active">
             <div class="row mt-4">
                <div class="col-md-5 mx-auto">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group text-center">
                            <img class="img-fluid img-thumbnail" id="user_img_path" src="<?= isset($user) ? $user['user_img'] : base_url('public/assets/img/users/no_photo.jpg'); ?>" style="max-width:300px;max-height:300px;"/>
                            <label class="btn btn-block btn-success mt-2">
                              <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar Imagem
                              <input type="file" accept="image/*" id="btn_upload_user_img" style="display:none;"/>
                            </label>
                            <input id="user_img" name="user_img" style="display:none;"/>
                            <span class="help-block"></span>
                    </div>
                    <button class="btn btn-info btn-block my-4" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
          </div>