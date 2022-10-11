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
                    <img src="<?php echo BASE_URL . '/assets/imagens/logo-aparaa.png'; ?>" alt="Logo" style="width: 80px;"/>

                </td>
                <td align="left">
                    <h4 class="text-justify text-upercase" style="margin: 0;"> <?php echo $cidade['nome_siglas'] ?> <?php echo $cidade['nome_completo'] ?> </h4>
                    <p class="text-center">                    
                        <small>
                            <?php echo $cidade['endereco'] ?> - CEP: <?php echo $cidade['cep'] ?><br/>
                            <?php echo $cidade['telefone'] ?> | <?php echo $cidade['email'] ?><br/>
                            CNPJ <?php echo $cidade['cnpj'] ?>
                        </small>
                    </p>
                </td>
                <td align="right">
                    <img src="<?php echo BASE_URL . '/assets/imagens/ifpa_sigapa.png'; ?>" alt="Logo" style="width: 140px;"/>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="3">
                    <p><?php echo NAME_PROJECT ?></p><br/>
                    <h4>Relatório de Associados</h2>
                </td>
            </tr>
        </table>
        <div align="right">Este documento foi gerado em <?php echo $this->formatDateView(date("Y-m-d")) . ' as ' . date("H:i:s", (time() - $this->ajustaHorario())) ?>.</div>
        <div id="conteudo">
            <div id="section">                
                <table class="table">
                    <tr>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Por</th>
                        <th>Busca</th>
                    </tr>
                    <tr>
                        <td><?php echo $busca['tipo'] ?></td>
                        <td><?php echo $busca['status'] ?></td>
                        <td><?php echo $busca['por'] ?></td>
                        <td><?php echo $busca['campo'] ?></td>
                    </tr>
                </table>
                <hr>


                <?php if (!empty($cooperados)) : ?>
                    <h3 class="text-right">Total: <?php echo count($cooperados) > 1 ? count($cooperados) . ' registros encontrados' : count($cooperados) . ' registro encontrado' ?>.</h3>
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Apelido</th>
                            <th>Nome Completo</th>
                            <th>Nº de Matricula</th>
                            <th>Inscrição</th>
                        </tr>

                        <?php
                        $qtd = 1;
                        foreach ($cooperados as $cooperado) :
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $qtd; ?></td>
                                <td class="text-upercase"><?php echo!empty($cooperado['apelido']) ? $cooperado['apelido'] : '' ?></td>
                                <td class="text-upercase"><?php echo!empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : '' ?></td>
                                <td class="text-upercase"><?php echo!empty($cooperado['cod']) ? str_pad($cooperado['cod'], 3, '0', STR_PAD_LEFT) : '' ?></td>
                                <td class="text-upercase"><?php echo!empty($cooperado['data_inscricao']) ? $this->formatDateView($cooperado['data_inscricao']) : '' ?></td>
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