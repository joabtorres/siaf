<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Inicial</h2>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-tachometer-alt"></i> Inicial</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Olá <strong><?php echo trim($_SESSION['usuario_sessao']['nome']); ?></strong>, bem-vindo ao <?php echo NAME_PROJECT; ?>.
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-black">
                <div class="panel-heading">
                    <i class="fa fa-calculator fa-3x pull-left"></i>                               
                    <div class="font-bold">Associados</div>
                    <div>Total de Registros</div>
                </div>
                <div class="panel-body">
                    <div class="text-right"><?php echo!empty($totalAssociados) ? $totalAssociados['qtd'] : '0' ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-black">
                <div class="panel-heading">
                    <i class="fa fa-calculator fa-3x pull-left"></i>                               
                    <div class="font-bold">Entrada</div>
                    <div>Valor Total</div>
                </div>
                <div class="panel-body">
                    <div class="text-right"><?php echo!empty($totalEntradas) ? $this->formatDinheiroView($totalEntradas['valor']) : '0' ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-black">
                <div class="panel-heading">
                    <i class="fa fa-calculator fa-3x pull-left"></i>                               
                    <div class="font-bold">Despesa</div>
                    <div>Valor Total</div>
                </div>
                <div class="panel-body">
                    <div class="text-right"><?php echo!empty($totalDespesas) ? $this->formatDinheiroView($totalDespesas['valor']) : '0' ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-black">
                <div class="panel-heading">
                    <i class="fa fa-calculator fa-3x pull-left"></i>                               
                    <div class="font-bold">Investimento</div>
                    <div>Valor Total</div>
                </div>
                <div class="panel-body">
                    <div class="text-right"><?php echo!empty($totalInvestimentos) ? $this->formatDinheiroView($totalInvestimentos['valor']) : '0' ?></div>
                </div>
            </div>
        </div>
    </div>
    <!--FIM .ROW-->
    <div class="row">
        <div class="col-md-6">
            <section class=" panel panel-black">
                <header class="panel-heading">
                    <i class="fa fa-chart-pie fa-3x pull-left" ></i>
                    <h4 class="panel-title font-bold">Associados </h4>
                    <div>Associados Registrados</div>
                </header>
                <article class="panel-body">
                    <canvas id="grafico_tipo_associado" width="100%" ></canvas>
                </article>
            </section>
        </div>
        <div class="col-md-6">
            <section class=" panel panel-black">
                <header class="panel-heading">
                    <i class="fa fa-chart-pie fa-3x pull-left" ></i>
                    <h4 class="panel-title font-bold">Associados </h4>
                    <div>Associados Registrados</div>
                </header>
                <article class="panel-body">
                    <canvas id="grafico_associado_status" width="100%"></canvas>
                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class=" panel panel-black">
                <header class="panel-heading">
                    <i class="fa fa-chart-bar fa-3x pull-left" ></i>
                    <h4 class="panel-title font-bold">Financeiro </h4>
                    <div>Lucro, Despesa e Investimento</div>
                </header>
                <article class="panel-body">
                    <canvas id="grafico_protocolo_objetivo" height="60vh"></canvas>
                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="panel panel-black">
                <header class="panel-heading">
                    <i class="fa fa-child  fa-3x pull-left"></i>                    
                    <div class="font-bold">Produção</div>
                    <div>Lista dos produtos produzidos na associção</div>
                </header>
                <article class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <tr>
                            <th width="50px">#</th>
                            <th width="400px">Produto</th>
                            <th width="150px">Total de produtores</th>
                            <th>Porcentagem</th>
                        </tr>
                        <?php
                        if (!empty($producao)):
                            $qtd = 1;
                            foreach ($producao as $index) :
                                ?>
                                <tr>
                                    <td><?php echo $qtd ?></td>
                                    <td><?php echo $index['producao'] ?></td>
                                    <td><?php echo $index['qtd'] ?></td>
                                    <td>
                                        <div class = "progress" style = "margin-bottom: 0;">
                                            <div class = "progress-bar progress-bar-striped progress-bar-animated bg-danger active" role = "progressbar" style = "width: <?php echo $this->getporcentagem($index['qtd'], $totalProducao) ?>%; height: 100%;" aria-valuenow = "100" aria-valuemin = "0" aria-valuemax = "<?php echo $this->getporcentagem($index['qtd'], $totalProducao) ?>"><?php echo $this->getporcentagem($index['qtd'], $totalProducao) ?>%</div>
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
