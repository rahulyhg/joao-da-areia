<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Parceiros</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="<?= $conf['site_url']; ?>" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Ver Site</a>
            <ol class="breadcrumb">
                <li><a href="/">Dashboard</a></li>
                <li><a href="/parceiros">Parceiros</a></li>
                <li class="active">Editar</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <form method="post" enctype="multipart/form-data" onsubmit="required();return false;">

                    <div class="actions btn-set">
                        <a href="parceiros/" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Voltar </a>
                        <button type="submit" name="edit" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Salvar</button>
                    </div>

                    <div class="response-validate">
                        <?php echo $this->Session->flash(); ?>
                    </div>

                    <section>
                        <div class="sttabs tabs-style-line">
                            <nav>
                                <ul>
                                    <li><a href="#section-line-1"><span>Geral</span></a></li>
                                    <li><a href="#section-line-4"><span>Imagem Principal</span></a></li>
                                </ul>
                            </nav>
                            <div class="content-wrap">
                                <section id="section-line-1">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nome: <span class="required">* </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control irequired js-maxlength" name="nome" maxlength="100" data-always-show="true" value="<?= $item['Parceiros']['nome'];?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Link: </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control js-maxlength" name="link" maxlength="100" data-always-show="true" value="<?= $item['Parceiros']['link'];?>">
                                            </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Status: <span class="required">* </span></label>
                                            <div class="col-md-10">
                                                <select class="form-control irequired" name="status">
                                                    <option value="1" <?=( $item['Parceiros']['status'] == 1 ) ? "selected": ""; ?>>Ativado</option>
                                                    <option value="0" <?=( $item['Parceiros']['status'] == 0 ) ? "selected": ""; ?>>Desativado</option>
                                                </select>
                                            </div>
                                        </div>
										
                                    </div>
                                </section>
                            </div>


                            <div class="content-wrap">
                                <section id="section-line-4">

                                    <div class="white-box">
                                        <h3 class="box-title">Upload de imagem - Tamanho livre</h3>
                                        <label for="input-file-max-fs">Você pode adicionar imagens com no máximo 2 MB</label>

                                        <?php echo $this->Form->input('imagem',array( 'type' => 'file', 'id' => 'input-file-max-fs','label' => false, 'div' => false, 'class' => 'dropify', 'data-max-file-size' => '2M', 'onchange' => 'fileSelectHandler()') ); ?>

                                    </div>

                                </section>
                            </div>
                        </div>
                    </section>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    .titulo {
        width: 80%;
        float: left;
    }
    .actions {
        width: 100%;
    }
    .actions a {
        width: 100px;
    }
    .actions button {
        width: 120px;
        color: #FFFFFF;
        background-color: #3a9c95;
    }
    .actions button:hover {
        opacity: 0.8;
    }
    .white-box .box-title {
        margin-top: 0px !important;
    }
    .alert {
        margin-top: 20px;
    }
</style>
