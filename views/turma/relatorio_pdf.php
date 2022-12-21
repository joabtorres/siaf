<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/gif" href="<?php echo BASE_URL ?>/assets/imagens/icon.png" sizes="32x32" />
        <meta property="ogg:title" content="<?php echo NAME_PROJECT; ?>">
        <meta property="ogg:description" content="<?php echo NAME_PROJECT; ?>">
        <title> <?php echo NAME_PROJECT; ?> </title>
        <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/relatorio_1.css" media=”print” >
        <style>
            .table td{
                border: 1px solid black;    
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <table style="width:100%; ">	    
            <tr>
                <td align="left">
                    <img src="<?php echo BASE_URL . '/assets/imagens/ifpa.png'; ?>" alt="Logo" style="width: 100px;"/>

                </td>
                <td align="left">
                    <h4 class="text-center text-upercase" style="margin: 0;"> <?php echo $cidade['nome_siglas'] ?> <?php echo $cidade['nome_completo'] ?> </h4>
                    <p class="text-center">                    
                        <small>
                            <?php echo $cidade['endereco'] ?> - CEP: <?php echo $cidade['cep'] ?><br/>
                            <?php echo $cidade['telefone'] ?> | <?php echo $cidade['email'] ?><br/>
                            CNPJ <?php echo $cidade['cnpj'] ?>
                        </small>
                    </p>
                </td>
                <td align="right">
                    <img src="<?php echo BASE_URL . '/assets/imagens/logo.png'; ?>" alt="Logo" style="width: 140px;"/>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="3">
                    <p><?php echo NAME_PROJECT ?></p><br/>
                    <h4>Relatório de Turmas</h4>
                </td>
            </tr>
        </table>
        <div align="right">Este documento foi gerado em <?php echo $this->formatDateView(date("Y-m-d")) . ' as ' . date("H:i:s", (time() - $this->ajustaHorario())) ?>.</div>
        <div id="conteudo">
            <div id="section">
                <?php if (isset($busca) && !empty($busca)): ?>
                    <table class="table">

                        <tr>
                            <th>Curso</th>
                            <th>Por</th>
                            <th>Buscar</th>
                        </tr>
                        <tr>
                            <td><?php echo $busca['curso'] ?></td>
                            <td><?php echo $busca['por'] ?></td>
                            <td><?php echo $busca['campo'] ?></td>
                        </tr>
                    </table>
                <?php endif; ?>
                <hr>
                <?php if (!empty($turmas)): ?>
                    <h4 class="text-right">Total: <?php echo count($turmas) > 1 ? count($turmas) . ' registros encontrados' : count($turmas) . ' registro encontrado' ?>.</h4>
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Curso</th>
                            <th>Turma</th>
                            <th>Ano</th>
                            <th>Qtd de Alunos</th>
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
                            </tr>
                            <?php
                            ++$qtd;
                        endforeach;
                        ?>
                    </table>
                <?php endif; ?>
            </div>

        </div>
    </body>
</html>