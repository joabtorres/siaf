<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Inicial</h2>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-tachometer-alt"></i> Inicial</li>
            </ol>
        </div>
    </div>
    <!--FIM .ROW-->
    <div class="row">
        <div class="col-md-6">
            <section class=" panel panel-black">
                <header class="panel-heading">
                    <i class="fa fa-chart-pie fa-3x pull-left" ></i>
                    <h4 class="panel-title font-bold">Aluno </h4>
                    <div>Objetivos Registrados</div>
                </header>
                <article class="panel-body">
                    <canvas id="grafico_aluno_objetivo" width="100%" ></canvas>
                </article>
            </section>
        </div>
        <div class="col-md-6">
            <section class=" panel panel-black">
                <header class="panel-heading">
                    <i class="fa fa-chart-pie fa-3x pull-left" ></i>
                    <h4 class="panel-title font-bold">Alunos </h4>
                    <div>Gêneros Registrados</div>
                </header>
                <article class="panel-body">
                    <canvas id="grafico_aluno_genero" width="100%"></canvas>
                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="panel panel-black">
                <header class="panel-heading">
                    <i class="fa fa-child  fa-3x pull-left"></i>                    
                    <div class="font-bold">Turmas</div>
                    <div>Lista de todos os alunos vinculado por turmas</div>
                </header>
                <article class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <tr>
                            <th width="50px">#</th>
                            <th width="400px">Turma</th>
                            <th width="150px">Total de alunos</th>
                            <th>Porcentagem</th>
                        </tr>
                        <?php
                        if (!empty($alunos)):
                            $qtd = 1;
                            foreach ($alunos as $index) :
                                ?>
                                <tr>
                                    <td><?php echo $qtd ?></td>
                                    <td><?php echo $index['turma'].' - '. $index['curso'] ?></td>
                                    <td><?php echo $index['qtd'] ?></td>
                                    <td>
                                        <div class = "progress" style = "margin-bottom: 0;">
                                            <div class = "progress-bar progress-bar-striped progress-bar-animated bg-danger active" role = "progressbar" style = "width: <?php echo $this->getporcentagem($index['qtd'], $totalAluno) ?>%; height: 100%;" aria-valuenow = "100" aria-valuemin = "0" aria-valuemax = "<?php echo $this->getporcentagem($index['qtd'], $totalAluno) ?>"><?php echo $this->getporcentagem($index['qtd'], $totalAluno) ?>%</div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $qtd++;
                            endforeach;
                        endif;
                        ?>
                    </table>
                </article>
            </section>
        </div>
    </div>
</div>
<!-- /#section-container -->

<script src="<?php echo BASE_URL ?>/assets/js/Chart.min.js"></script>
<script src="<?php echo BASE_URL ?>/assets/js/graficos.js"></script>
