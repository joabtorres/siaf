<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Editar Aluno</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li><a  href="<?php echo BASE_URL ?>/relatorio/aluno"><i class="fa fa-list-alt"></i> Alunos</a></li>
                <li><a href="<?php echo BASE_URL ?>/aluno/index/<?php echo!empty($formCad['cod']) ? $formCad['cod'] : '' ?>"><i class="fa fa-user"></i> <?php echo!empty($formCad['nome']) ? $formCad['nome'] : '' ?></a></li>
                <li class="active"><i class="fa fa-edit"></i>Editar Aluno</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                <button class="close" data-hide="alert">&times;</button>
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Recomenda-se que todos os campos sejam preenchidos corretamente.'; ?></div>
            </div>
        </div>
        <div class="col-md-12 clear">
            <form method="POST" enctype="multipart/form-data" autocomplete="off" id="formAluno">
                <div class="col-md-6 clear">
                    <!-- comment -->
                    <section class="panel panel-black">
                        <header class="panel-heading">
                            <h4 class="panel-title"> <i class="fa fa-user-circle pull-left"></i> Aluno</h4>
                        </header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="col-md-12 form-group <?php echo (isset($formCad_error['cod_turma']['class'])) ? $formCad_error['cod_turma']['class'] : ''; ?>">
                                    <label for="inCurso" class="control-label">Curso:* <?php echo (isset($formCad_error['cod_turma']['msg'])) ? '<small><span class = "glyphicon glyphicon-remove"></span> ' . $formCad_error['cod_turma']['msg'] . ' </small>' : ''; ?></label><br/>
                                    <select id="inCurso" name="nCurso" class="form-control">
                                        <?php
                                        foreach ($turmas as $index) {
                                            if (isset($formCad['cod_turma']) && $index['cod'] == $formCad['cod_turma']) {
                                                echo '<option value="' . $index['cod'] . '" selected = "selected">Turma: ' . $index['turma'] . ' - ' . $index['ano'] . ' - Curso: ' . $index['curso'] . '</option>';
                                            } else {
                                                echo '<option value="' . $index['cod'] . '"> Turma: ' . $index['turma'] . ' - ' . $index['ano'] . ' - Curso: ' . $index['curso'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group <?php echo (isset($formCad_error['nome_completo']['class'])) ? $formCad_error['nome_completo']['class'] : ''; ?>">
                                    <label for="iNomeCompleto" class="control-label">Nome Completo:* <?php echo (isset($formCad_error['nome_completo']['msg'])) ? '<small><span class = "glyphicon glyphicon-remove"></span> ' . $formCad_error['nome_completo']['msg'] . ' </small>' : ''; ?></label>
                                    <input type="text" id="iNomeCompleto" name="nNomeCompleto" placeholder="Exemplo: João da Silva Alves" class="form-control" value="<?php echo (!empty($formCad['nome'])) ? $formCad['nome'] : ''; ?>"/>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label for="iGenero" class="control-label">Genero:</label><br/>
                                    <select id="iGenero" name="nGenero" class="form-control">
                                        <?php
                                        $generos = array(array('genero' => 'Masculino'), array('genero' => 'Feminino'));
                                        foreach ($generos as $index) {
                                            if (isset($formCad['genero']) && $index['genero'] == $formCad['genero']) {
                                                echo '<option value = "' . $index['genero'] . '" selected = "selected">' . $index['genero'] . '</option>';
                                            } else {
                                                echo '<option value = "' . $index['genero'] . '">' . $index['genero'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="iCor" class="control-label">Cor/Raça:</label><br/>
                                    <select id="iCor" name="nCor" class="form-control">

                                        <?php
                                        $cores = array(array('cor' => 'Branco'), array('cor' => 'Pardo'), array('cor' => 'Amarelo'), array('cor' => 'Indígeno'));
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
                                <div class="col-md-6 form-group <?php echo (isset($formCad_error['nascimento']['class'])) ? $formCad_error['nascimento']['class'] : ''; ?>">
                                    <label for="iIdade" class="control-label">Data de nascimento:* <?php echo (isset($formCad_error['nascimento']['msg'])) ? '<small><span class = "glyphicon glyphicon-remove"></span> ' . $formCad_error['nascimento']['msg'] . ' </small>' : ''; ?></label>
                                    <input type="text" id="iIdade" name="nNascimento" placeholder="Exemplo: 15/12/2001" class="form-control date_serach input-data" value="<?php echo (!empty($formCad['nascimento'])) ? $this->formatDateView($formCad['nascimento']) : ''; ?>"/>
                                </div>
                                <div class="col-md-6 form-group <?php echo (isset($formCad_error['altura']['class'])) ? $formCad_error['altura']['class'] : ''; ?>">
                                    <label for="iAltura" class="control-label">Altura:*  <?php echo (isset($formCad_error['altura']['msg'])) ? '<small><span class = "glyphicon glyphicon-remove"></span> ' . $formCad_error['altura']['msg'] . ' </small>' : ''; ?></label>
                                    <input type="text" id="iAltura" name="nAltura" placeholder="Exemplo: 1.71 m" class="form-control input-altura" value="<?php echo (!empty($formCad['altura'])) ? $formCad['altura'] : ''; ?>"/>
                                </div>

                                <div class="col-md-6 form-group ">
                                    <label for="iPressao" class="control-label">Pressão: </label>
                                    <input type="text" id="iPressao" name="nPressao" placeholder="Exemplo: 12/8" class="form-control input-pressao" value="<?php echo (!empty($formCad['pressao'])) ? $formCad['pressao'] : ''; ?>"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="iGlicose" class="control-label">Glicose:</label>
                                    <input type="text" id="iGlicose" name="nGlicose" placeholder="Exemplo: 99 mg/dL" class="form-control input-glicose" value="<?php echo (!empty($formCad['glicose'])) ? $formCad['glicose'] : ''; ?>"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="iFrequencia" class="control-label">Frequencia cardiaca em repouso:</label>
                                    <input type="text" id="iFrequencia" name="nFrequencia" placeholder="Exemplo: 100 bpm" class="form-control input-frequencia" value="<?php echo (!empty($formCad['frequencia_cardiaca'])) ? $formCad['frequencia_cardiaca'] : ''; ?>"/>
                                </div>



                                <div class="col-md-12">
                                    <!--panel foto-->
                                    <section class="panel panel-black">
                                        <header class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-image pull-left"></i> Foto</h4>
                                        </header>
                                        <article class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <p class="text-center" id="fotos">
                                                        <img src="<?php echo (isset($formCad['imagem']) && !empty($formCad['imagem'])) ? BASE_URL . '/' . $formCad['imagem'] : BASE_URL . '/assets/imagens/foto_ilustrato3x4.png'; ?>" class="img-center" alt="Usuario" id="viewImagem-1"/>
                                                        <input type="hidden" name="qtd_fotos" value="1">
                                                        <label class="btn btn-success" for="cFileImagem">Escolher Imagem</label>
                                                        <input type="file" name="tImagem-1" id="cFileImagem" onchange="readURL(this)"/><br/><br/>
                                                        <input type="hidden" name="nImagem"  value="<?php echo isset($formCad['imagem']) ? $formCad['imagem'] : null; ?>"/>
                                                        <span>Observação: Carregue somente imagens na proporção 3x4, caso contrário a imagem ficará distorcida.</span>
                                                    </p>
                                                </div> 
                                            </div>
                                        </article>
                                    </section> <!-- fim panel foto-->  
                                </div>
                        </article>
                    </section> <!-- fim panel Cooperado-->
                </div>
                <div class="col-md-6">
                    <!--panel foto-->
                    <section class="panel panel-black">
                        <header class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-list-ol pull-left"></i> Questões</h4>
                        </header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">É fumante?</label><br>
                                    <?php
                                    $fumante = array("Não", "Sim");
                                    $tagName = "nFumante";
                                    for ($i = 0; $i < count($fumante); $i++) {
                                        if (isset($formCad['fumante']) && $formCad['fumante'] == $fumante[$i]) {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" checked="true"/> ' . $fumante[$i] . '</label>';
                                        } else {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" /> ' . $fumante[$i] . '</label>';
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="form-group col-md-12">
                                    <span>É Alergico?</span><br>
                                    <?php
                                    $fumante = array("Não", "Sim");
                                    $tagName = "nAlergia";
                                    for ($i = 0; $i < count($fumante); $i++) {
                                        if (isset($formCad['alergia']) && $formCad['alergia'] == $fumante[$i]) {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" checked="true"/> ' . $fumante[$i] . '</label>';
                                        } else {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" /> ' . $fumante[$i] . '</label>';
                                        }
                                    }
                                    ?>
                                    <input type="text" id="idap" name="nQualAlergia" class="form-control" value="<?php echo (!empty($formCad['qual_alergia'])) ? $formCad['qual_alergia'] : ''; ?>"/>
                                </div>

                                <div class="form-group col-md-12">
                                    <span>É Doenças anteriores?</span><br>
                                    <?php
                                    $fumante = array("Não", "Sim");
                                    $tagName = "nDoenca";
                                    for ($i = 0; $i < count($fumante); $i++) {
                                        if (isset($formCad['doenca']) && $formCad['doenca'] == $fumante[$i]) {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" checked="true"/> ' . $fumante[$i] . '</label>';
                                        } else {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" /> ' . $fumante[$i] . '</label>';
                                        }
                                    }
                                    ?>
                                    <input type="text" id="idap" name="nQualDoenca" class="form-control" value="<?php echo (!empty($formCad['qual_doenca'])) ? $formCad['qual_doenca'] : ''; ?>"/>
                                </div>


                                <div class="form-group col-md-12">
                                    <span>Possui alguma lesão?</span><br>
                                    <?php
                                    $fumante = array("Não", "Sim");
                                    $tagName = "nLesao";
                                    for ($i = 0; $i < count($fumante); $i++) {
                                        if (isset($formCad['lesao']) && $formCad['lesao'] == $fumante[$i]) {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" checked="true"/> ' . $fumante[$i] . '</label>';
                                        } else {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" /> ' . $fumante[$i] . '</label>';
                                        }
                                    }
                                    ?>
                                    <input type="text" id="idap" name="nQualLesao" class="form-control" value="<?php echo (!empty($formCad['qual_lesao'])) ? $formCad['qual_lesao'] : ''; ?>"/>
                                </div>

                                <div class="form-group col-md-12">
                                    <span>Utiliza medicamento controlado?</span><br>
                                    <?php
                                    $fumante = array("Não", "Sim");
                                    $tagName = "nMedicamento";
                                    for ($i = 0; $i < count($fumante); $i++) {
                                        if (isset($formCad['medicamento']) && $formCad['medicamento'] == $fumante[$i]) {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" checked="true"/> ' . $fumante[$i] . '</label>';
                                        } else {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '"/> ' . $fumante[$i] . '</label>';
                                        }
                                    }
                                    ?>
                                    <input type="text" id="idap" name="nQualMedicamento" class="form-control" value="<?php echo (!empty($formCad['qual_medicamento'])) ? $formCad['qual_medicamento'] : ''; ?>"/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="idap" class="control-label">Número de refeições diárias:</label>
                                    <input type="text" id="idap" name="nRefeicoes"  class="form-control" value="<?php echo (!empty($formCad['refeicoes'])) ? $formCad['refeicoes'] : ''; ?>"/>
                                </div>
                                <div class="form-group col-md-12">
                                    <span>Injere bebida alcoólica?</span><br>
                                    <?php
                                    $fumante = array("Não", "Sim");
                                    $tagName = "nBebidas";
                                    for ($i = 0; $i < count($fumante); $i++) {
                                        if (isset($formCad['bebidas']) && $formCad['bebidas'] == $fumante[$i]) {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" checked="true"/> ' . $fumante[$i] . '</label>';
                                        } else {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" /> ' . $fumante[$i] . '</label>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <span>Pratica  atividades físicas semanais?</span><br>
                                    <?php
                                    $fumante = array("Não", "Sim");
                                    $tagName = "nAtividadeFisica";
                                    for ($i = 0; $i < count($fumante); $i++) {
                                        if (isset($formCad['atividade_fisica']) && $formCad['atividade_fisica'] == $fumante[$i]) {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" checked="true"/> ' . $fumante[$i] . '</label>';
                                        } else {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" /> ' . $fumante[$i] . '</label>';
                                        }
                                    }
                                    ?>
                                    <input type="text" id="idap" name="nQualAtividadeFisica" class="form-control" value="<?php echo (!empty($formCad['qual_atividade_fisica'])) ? $formCad['qual_atividade_fisica'] : ''; ?>"/>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="iCPF" class="control-label">Qual a intensidade das atividades física?</label>
                                    <select id="iGenero" name="nIntensidadeFisica" class="form-control">
                                        <?php
                                        $intensidade_atividade = array(array('atividade' => 'Inexistente'), array('atividade' => 'Leve'), array('atividade' => 'Moderada'), array('atividade' => 'Intensa'));
                                        foreach ($intensidade_atividade as $index) {
                                            if (isset($formCad['suplemento']) && $formCad['suplemento'] == $intensidade_atividade['atividade']) {
                                                echo '<option value = "' . $index['atividade'] . '" selected = "selected">' . $index['atividade'] . '</option>';
                                            } else {
                                                echo '<option value = "' . $index['atividade'] . '" >' . $index['atividade'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>   
                                </div>
                                <div class="form-group col-md-12">
                                    <span>Utiliza Suplemento?</span><br/>
                                    <?php
                                    $fumante = array("Não", "Sim");
                                    $tagName = "nSuplemento";
                                    for ($i = 0; $i < count($fumante); $i++) {
                                        if (isset($formCad['suplemento']) && $formCad['suplemento'] == $fumante[$i]) {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" checked="true"/> ' . $fumante[$i] . '</label>';
                                        } else {
                                            echo ' <label> <input type = "radio" name = "' . $tagName . '" value = "' . $fumante[$i] . '" /> ' . $fumante[$i] . '</label>';
                                        }
                                    }
                                    ?>
                                    <input type="text" id="idap" name="nQualSuplemento" class="form-control" value="<?php echo (!empty($formCad['qual_suplemento'])) ? $formCad['qual_suplemento'] : ''; ?>"/>
                                </div>
                                <div class="form-group col-md-12">
                                    <span>Qual seu objetivo?</span><br/>
                                    <select id="iGenero" name="nObjetivo" class="form-control">
                                        <?php
                                        $objetivo = array(array('objetivo' => 'Emagrecimento'), array('objetivo' => 'Ganhar Massa Muscular'), array('objetivo' => 'Condicionamento Físico'), array('objetivo' => 'Bem-estar e Socialização'));
                                        foreach ($objetivo as $index) {
                                            if (isset($formCad['objetivo']) && $index['objetivo'] == $formCad['objetivo']) {
                                                echo '<option value = "' . $index['objetivo'] . '" selected = "selected">' . $index['objetivo'] . '</option>';
                                            } else {
                                                echo '<option value = "' . $index['objetivo'] . '">' . $index['objetivo'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </article>
                    </section> <!-- fim panel foto-->  
                </div>


                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-success" name="nSalvar" value="Salvar"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo BASE_URL ?>/home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--fim row-->
</div>
