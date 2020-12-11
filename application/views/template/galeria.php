    <div class="section section-dark text-center">
      <div class="container">
        <h2 class="title">GALERIA</h2>
        <div class="row">
            <div class="section section-dark pt-o" id="carousel">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="card page-carousel">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <!--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid" src="<?= base_url('public/assets/img/vol_russo0.jpg'); ?>">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p>Volume Russo</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="<?= base_url('public/assets/img/vol_russo1.jpg'); ?>">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p>Volume Russo</p>
                                    </div>
                                </div>
                                <!--
                                <div class="carousel-item mx-auto text-center ml-5">
                                    <img class="d-block img-fluid" src="<?= base_url('public/assets/img/fio_a_fio.jpg');?>">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p>Fio a Fio</p>
                                    </div>
                                </div>
                                -->
                            </div>
                            <a class="left carousel-control carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="right carousel-control carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                                <span class="sr-only">Próxima</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <a class="btn bot-dourado" href="<?= base_url('index.php/pages/galeria'); ?>">Veja mais</a>
      </div>
    </div>