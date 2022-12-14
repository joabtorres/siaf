<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2> Alunos</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-list-alt"></i> Relatório de Alunos</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-md-12 clear">
            <form method="POST" autocomplete="off">
                <section class="panel panel-success">
                    <header class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <h4 class="panel-title"><i class="fa fa-search pull-left"></i> Painel de Busca <i class="fa fa-eye pull-right"></i></h4> </a>
                    </header>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <article class="panel-body">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="iStatus" class="control-label">Curso: </label><br/>
                                    <select id="iStatus" name="nCurso" class="form-control">
                                        <?php
                                        echo '<option value="" selected="selected">Todos</option>';
                                        $array = array('Técnico em Informática Integrado ao Ensino Médio', 'Técnico em Edificação Integrado ao Ensino Médio', 'Técnico em Agroecologia Integrado ao Ensino Médio');
                                        for ($i = 0; $i < count($array); $i++) {
                                            echo '<option value="' . $array[$i] . '">' . $array[$i] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iTurma'>Turma: </label>
                                    <select id="iTurma" name="nTurma" class="form-control">
                                        <?php
                                        if (isset($turmas) && !empty($turmas)) {
                                            echo '<option value="" selected="selected">Todas</option>';
                                            foreach ($turmas as $index) {
                                                echo '<option value="' . $index['cod'] . '">' . $index['turma']. '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='igenero'>Gênero: </label>
                                    <select id="igenero" name="nGenero" class="form-control">
                                        <option selected='selected' value="" >Todos</option>
                                        <?php
                                        $generos = array(array('genero' => 'Masculino'), array('genero' => 'Feminino'));
                                        foreach ($generos as $index) {
                                            echo '<option value = "' . $index['genero'] . '">' . $index['genero'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iCor'>Cor/raça: </label>
                                    <select id="iCor" name="nCor" class="form-control">
                                        <option selected='selected' value="" >Todos</option>
                                        <?php
                                       $cores = array(array('cor' => 'Branco'), array('cor' => 'Pardo'), array('cor' => 'Preto'), array('cor' => 'Amarelo'), array('cor' => 'Indígena'));
                                        foreach ($cores as $index) {
                                            if (isset($formCad['cor']) && $index['cor'] == $formCad['cor']) {
                                                echo '<option value = "' . $index['cor'] . '" selected = "selected">' . $index['cor'] . '</option>';
                                            } else {
                                                echo '<option value = "' . $index['cor'] . '">' . $index['cor'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iStatus'>Intensidade de Atividade Física: </label>
                                    <select id="iStatus" name="nIntensidadeFisica" class="form-control">
                                        <option selected='selected' value="" >Todas</option>
                                        <?php
                                        $intensidade_atividade = array(array('atividade' => 'Inexistente'), array('atividade' => 'Leve'), array('atividade' => 'Moderada'), array('atividade' => 'Intensa'));
                                        foreach ($intensidade_atividade as $index) {
                                            echo '<option value = "' . $index['atividade'] . '" >' . $index['atividade'] . '</option>';
                                        }
                                        ?>
                                    </select>  
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='objetivo'>Objetivo: </label>
                                    <select id="objetivo" name="nObjetivo" class="form-control">
                                        <option selected='selected' value="" >Todos</option>
                                        <?php
                                        $objetivo = array(array('objetivo' => 'Emagrecimento'), array('objetivo' => 'Ganhar Massa Muscular'), array('objetivo' => 'Condicionamento Físico'), array('objetivo' => 'Bem-estar e Socialização'));
                                        foreach ($objetivo as $index) {
                                            echo '<option value = "' . $index['objetivo'] . '">' . $index['objetivo'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iPor'>Por: </label>
                                    <select id="iPor" name="nPor" class="form-control">
                                        <option value="" selected='selected'>Todos</option>
                                        <option value="Nome">Nome </option>
                                        <option value="Fumante">Fumante</option>
                                        <option value="Alergico">Alergico </option>
                                        <option value="Lesão">Lesão </option>
                                        <option value="Medicamento Controlado">Medicamento Controlado </option>
                                        <option value="Número de refeições diárias">Número de refeições diárias </option>
                                        <option value="Bebidas">Bebidas </option>
                                        <option value="Praticante de atividades físicas semanais">Praticante de atividades físicas semanais </option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iBuscar'>Buscar: </label>
                                    <input type="text" id="iBuscar" name="nBuscar" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Modo de exibição em:</label><br/>
                                    <label><input type="radio" checked="checked" name="nModoExibicao" value="1"/> Tabela </label>
                                    <label><input type="radio" name="nModoExibicao" value="2"/> Bloco </label>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Gerar PDF:</label><br/>
                                    <label><input type="radio" name="nModoPDF" value="1"/> Sim </label>
                                    <label><input type="radio" name="nModoPDF" value="0" checked="checked" /> Não </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" name="nBuscarBT" value="BuscarBT" class="btn btn-warning"><i class="fa fa-search pull-left"></i> Buscar</button>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <?php
    if (isset($alunos) && is_array($alunos)) {
        if ($modo_exebicao == 1) {
            ?>
            <div class="row">
                <!--modelos de resultado-->
                <div class="col-md-12">
                    <section class="panel panel-black">
                        <header class="panel-heading">
                            <h4 class="panel-title">Resultados Encontrados</h4>
                        </header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-right">Total: <?php echo count($alunos) > 1 ? count($alunos) . ' registros encontrados' : count($alunos) . ' registro encontrado' ?>.</h4 >
                                </div>
                            </div>
                        </article>
                        <article class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-condensed">
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Idade</th>
                                    <th>Turma</th>
                                    <th>Objetivo</th>
                                    <?php if ($this->checkUser() >= 2) : ?>
                                        <th>Ação</th>
                                    <?php endif; ?>
                                </tr>

                                <?php
                                $qtd = 1;
                                foreach ($alunos as $aluno) :
                                    ?>
                                    <tr>
                                        <td width="40px"><?php echo $qtd; ?></td>
                                        <td><?php echo!empty($aluno['nome']) ? $aluno['nome'] : '' ?></td>
                                        <td><?php echo!empty($aluno['nascimento']) ? $this->calcularIdade($aluno['nascimento']) : '' ?></td>
                                        <td><?php echo!empty($aluno['turma']) ? $aluno['turma'] . ' - Curso: ' . $aluno['curso'] : '' ?></td>
                                        <td><?php echo!empty($aluno['objetivo']) ? $aluno['objetivo'] : '' ?></td>
                                        <td width="120px" class=" text-center">
                                            <?php if ($this->checkUser() >= 2) { ?>
                                                <a class="btn btn-success btn-xs" href="<?php echo BASE_URL . '/aluno/index/' . $aluno['cod']; ?>" title="Visualizar"><i class="fa fa-eye"></i></a> 
                                                <a class="btn btn-primary btn-xs" href="<?php echo BASE_URL . '/editar/aluno/' . $aluno['cod']; ?>" title="Editar"><i class="fa fa-pencil-alt"></i></a> 
                                                <?php if ($this->checkUser() >= 3) { ?>
                                                    <button type="button"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_cooperado_<?php echo $aluno['cod']; ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </td>
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
            </div>
        <?php } else { ?>
            <!--modo de exibição em bloco-->
            <?php
            $qtd = 1;
            $row = 1;
            foreach ($alunos as $aluno) :
                echo ($row == 1) ? ' <div class="row">' : '';
                ?>
                <div class="col-md-4">
                    <div class=" thumbnail">
                        <a href="<?php echo BASE_URL . '/aluno/index/' . $aluno['cod'] ?>">
                            <img src="<?php echo!empty($aluno['imagem']) ? BASE_URL . '/' . $aluno['imagem'] : BASE_URL . '/assets/imagens/foto_ilustrato3x4.png' ?>" alt="SGL - Usuáio" class="img-responsive img-rounded"/>
                        </a>
                        <p class="text-center text-uppercase font-bold"><?php echo!empty($aluno['nome']) ? $aluno['nome'] : '' ?></p>
                        <p class="text-center">Turma: <?php echo!empty($aluno['turma']) ? $aluno['turma'] : '' ?> - <?php echo!empty($aluno['curso']) ? $aluno['curso'] : '' ?></p>
                        <p class="text-center">Idade: <?php echo!empty($aluno['nascimento']) ? $this->calcularIdade($aluno['nascimento']) : '' ?></p>
                        <div class="caption text-center">
                            <?php if ($this->checkUser() >= 2) { ?>
                                <a href="<?php echo BASE_URL . '/editar/aluno/' . $aluno['cod'] ?>" class="btn btn-primary btn-block btn-sm" title="Editar"><i class="fa fa-pencil-alt"></i> Editar</a> 
                                <?php if ($this->checkUser() >= 3) { ?>
                                    <button type="button"  class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#modal_aluno_<?php echo $aluno['cod']; ?>" title="Excluir"> <i class="fa fa-trash"></i> Excluir</button>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                echo ($row == 3) ? '</div>' : '';
                if ($row >= 3) {
                    $row = 1;
                } else {
                    $row++;
                }
                ++$qtd;
            endforeach;
            ?>
            <!--fim modo de exibição em bloco-->
            <?php
        }
    } else {
        echo '<div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Desculpe, não foi possível localizar nenhum registro !
                    </div>
                </div>
            </div>';
    }
    ?>
</div>


<?php
if (isset($alunos) && is_array($alunos)) :
    foreach ($alunos as $aluno) :
        ?>
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_cooperado_<?php echo $aluno['cod'] ?>" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-md" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-primary">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 >Deseja remover este registro?</h4>
                    </header>
                    <article class="modal-body">
                        <ul class="list-unstyled">
                            <li><b>Nº de Matricula: </b> <?php echo!empty($aluno['cod']) ? str_pad($aluno['cod'], 3, '0', STR_PAD_LEFT) : '' ?>;</li>
                            <li><b>Nome: </b> <?php echo!empty($aluno['nome']) ? $aluno['nome'] : '' ?>;</li>
                            <li><b>Idade: </b> <?php echo!empty($aluno['nascimento']) ? $this->calcularIdade($aluno['nascimento']) : '' ?>;</li>
                            <li><b>Turma: </b> <?php echo!empty($aluno['turma']) ? $aluno['turma'] : '' ?>.</li>
                        </ul>
                        <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Se você remove o cooperado, será removido todos os respectivos dados como, por exemplo, endereço,  contato e históricos.</p>
                    </article>
                    <footer class="modal-footer">
                        <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . '/excluir/aluno/' . $aluno['cod'] ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                        <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <?php
    endforeach;
endif;
?>