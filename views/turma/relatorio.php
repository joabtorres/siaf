<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Turmas</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-users"></i> Relatórios de Turmas</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-md-12 clear">
            <form method="POST">
                <section class="panel panel-success">
                    <header class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <h4 class="panel-title"><i class="fa fa-search pull-left"></i> Painel de Busca <i class="fa fa-eye pull-right"></i></h4> </a>
                    </header>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <article class="panel-body">
                            <div class="row">

                                <div class="col-md-4 form-group">
                                    <label for="iStatus" class="control-label">Curso: </label><br/>
                                    <select id="iStatus" name="nCurso" class="form-control">
                                        <?php
                                        $array = array('Todos', 'Técnico em Informática Integrado ao Ensino Médio', 'Técnico em Edificação Integrado ao Ensino Médio', 'Técnico em Agroecologia Integrado ao Ensino Médio');
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

                                <div class="col-md-2 form-group">
                                    <label for='iPor'>Por: </label>
                                    <select id="iPor" name="nPor" class="form-control">
                                        <option value="" checked='checked'>Todos</option>
                                        <option value="nome">Nome da turma</option>
                                        <option value="ano">Ano da turma</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iBuscar'>Buscar: </label>
                                    <input type="text" id="iBuscar" name="nBuscar" class="form-control"/>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label>Gerar PDF:</label><br/>
                                    <label><input type="radio" name="nModoPDF" value="1"/> Sim </label>
                                    <label><input type="radio" name="nModoPDF" value="0" checked="checked" /> Não </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" name="nBuscarBT" value="BuscarBT" class="btn btn-warning"><i class="fa fa-search pull-left"></i> Buscar</button>
                                </div>

                            </div>
                        </article>
                    </div>
                </section>
            </form>
        </div>
        <?php if (!empty($turmas)) { ?>
            <!--modelos de resultado-->
            <div class="col-md-12">
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title">Resultados Encontrados</h4>
                    </header>
                    <article class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <tr>
                                <th>#</th>
                                <th>Curso</th>
                                <th>Turma</th>
                                <th>Ano</th>
                                <th>Qtd de Alunos</th>
                                <?php if ($this->checkUser() >= 2) : ?>
                                    <th>Ação</th>
                                <?php endif; ?>
                            </tr>
                            <?php
                            $qtd = 1;
                            foreach ($turmas as $index):
                                ?>
                                <tr>
                                    <td width="40px"><?php echo $qtd ?></td>
                                    <td><?php echo!empty($index['curso']) ? $index['curso'] : '' ?></td>
                                    <td><?php echo!empty($index['turma']) ? $index['turma'] : '' ?></td>
                                    <td><?php echo!empty($index['ano']) ? $index['ano'] : '' ?></td>
                                    <td width="120px"><?php echo!empty($index['qtd']) ? $index['qtd'] : '0' ?></td>
                                    <?php if ($this->checkUser() >= 2) { ?>
                                        <td class="table-acao">
                                            <a class="btn btn-primary btn-xs" href="<?php echo BASE_URL . '/editar/turma/' . $index['cod']; ?>" title="Editar"><i class="fa fa-pencil-alt"></i></a> 
                                            <?php if ($this->checkUser() >= 3) { ?>
                                                <button type="button"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_turma_<?php echo $index['cod'] ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                            </td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                                ++$qtd;
                            endforeach;
                            ?>
                        </table>
                    </article>
                </section>
            </div>
            <!--fim modelos de resultado-->

            <?php
        } else {
            echo '<div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Desculpe, não foi possível localizar nenhum registro !
                    </div>
                </div>';
        }
        ?>
    </div>

</div>
<?php
if (isset($turmas) && is_array($turmas)) :
    foreach ($turmas as $index) :
        ?>        
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_turma_<?php echo $index['cod'] ?>" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-md" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-primary">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 >Deseja remover este registro?</h4>
                    </header>
                    <article class="modal-body">
                        <ul class="list-unstyled">
                            <li><b>Código: </b> <?php echo!empty($index['cod']) ? $index['cod'] : '' ?>;</li>
                            <li><b>Curso: </b> <?php echo!empty($index['curso']) ? $index['curso'] : '' ?>;</li>
                            <li><b>Turma: </b> <?php echo!empty($index['turma']) ? $index['turma'] : '' ?>;</li>
                            <li><b>Anoo: </b> <?php echo!empty($index['ano']) ? $index['ano'] : '' ?>;</li>
                        </ul>
                        <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro deixará de existir no sistema.</p>
                    </article>
                    <footer class="modal-footer">
                        <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . '/excluir/turma/' . $index['cod'] ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                        <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <?php
    endforeach;
endif;
?>