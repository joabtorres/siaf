<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Editar Entrada</h2>
            <ol class="breadcrumb">
                <li><a href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-edit "></i> Entrada</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                <button class="close" data-hide="alert">&times;</button>
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
            </div>
        </div>
        <div class="col-md-12 clear">
            <form autocomplete="off" method="POST" id="myFormFinanca">
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-plus-square"></i> Turma</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <input type="hidden" name="nCod" value="<?php echo!empty($cadForm['cod']) ? $cadForm['cod'] : 0; ?>"/>
                            <div class="col-md-12 form-group">
                                <label for="iStatus" class="control-label">Curso:* </label><br/>
                                <select id="iStatus" name="nCurso" class="form-control">
                                    <?php
                                    $array = array('Técnico em Informática Integrado ao Ensino Médio', 'Técnico em Edificação Integrado ao Ensino Médio', 'Técnico em Agroecologia Integrado ao Ensino Médio');
                                    for ($i = 0; $i < count($array); $i++) {
                                        if (isset($cadForm['curso']) && $array[$i] == $cadForm['curso']) {
                                            echo '<option value="' . $array[$i] . '" selected="true">' . $array[$i] . '</option>';
                                        } else {
                                            echo '<option value="' . $array[$i] . '">' . $array[$i] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for='iDescricao'>Nome da turma:* </label>
                                <input type="text" id="iDescricao" name="nTuma" class="form-control" placeholder="Exemplo: TI22" value="<?php echo (!empty($cadForm['turma'])) ? $cadForm['turma'] : ''; ?>"/>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for='iData'>Ano da turma:* </label>
                                <input type="text" id="iData" name="nAno" class="form-control" placeholder="Exemplo: 2018" value="<?php echo (!empty($cadForm['ano'])) ? $cadForm['ano'] : ''; ?>"/>
                            </div>
                        </div>
                    </article>
                </section>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-success" name="nSalvar" value="Salvar"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo BASE_URL ?>/home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>