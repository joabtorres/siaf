<?php
ob_start();
?>
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
    </head>

    <body>
        <table style="width:100%; ">	    
            <tr>
                <td align="left">
                    <img src="<?php echo BASE_URL . '/assets/imagens/logo-aparaa.png'; ?>" alt="Logo" style="width: 80px;"/>

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
                    <img src="<?php echo BASE_URL . '/assets/imagens/ifpa_sigapa.png'; ?>" alt="Logo" style="width: 140px;"/>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="3">
                    <p><?php echo NAME_PROJECT ?></p><br/>
                    <h4>Ficha do Associado</h4>
                </td>
            </tr>
        </table>

        <table class="table">
            <tr>
                <th colspan="4"><h4 class="text-destaque">Dados Pessoais</h4></th>
            </tr>
            <tr>
                <td rowspan="6"><img src="<?php echo!empty($cooperado['cooperado']['imagem']) ? BASE_URL . '/' . $cooperado['cooperado']['imagem'] : BASE_URL . '/assets/imagens/foto_ilustrato3x4.png' ?>" width="100px"/></td>
            </tr>
            <tr>
                <td><span class="text-destaque">Apelido:</span><br> <?php echo!empty($cooperado['cooperado']['apelido']) ? $cooperado['cooperado']['apelido'] : '' ?></td>
                <td><span class="text-destaque">Nome:</span><br> <?php echo!empty($cooperado['cooperado']['nome_completo']) ? $cooperado['cooperado']['nome_completo'] : '' ?></td>
                <td><span class="text-destaque">Categoria:</span> <br><?php echo!empty($cooperado['cooperado']['tipo']) ? $cooperado['cooperado']['tipo'] : '' ?></td>
            </tr>
            <tr>
                <td><span class="text-destaque">Nº DE MATRICULA:</span> <br><?php echo!empty($cooperado['cooperado']['cod']) ? str_pad($cooperado['cooperado']['cod'], 3, '0', STR_PAD_LEFT) : '' ?></td>
                <td><span class="text-destaque">Nº DO CAR:</span> <br><?php echo!empty($cooperado['cooperado']['dap']) ? $cooperado['cooperado']['dap'] : '' ?></td>
                <td><span class="text-destaque">Nº DO DAP:</span> <br><?php echo!empty($cooperado['cooperado']['cpf']) ? $cooperado['cooperado']['cpf'] : '' ?></td>
            </tr>
            <tr>
                <td><span class="text-destaque">Status:</span> <br><?php echo!empty($cooperado['cooperado']['status']) ? "Ativo" : "Inativo" ?></td>
                <td><span class="text-destaque">RG:</span> <br><?php echo!empty($cooperado['cooperado']['rg']) ? $cooperado['cooperado']['rg'] : '' ?></td>                                      
                <td><span class="text-destaque">CPF:</span> <br><?php echo!empty($cooperado['cooperado']['cpf']) ? $cooperado['cooperado']['cpf'] : '' ?></td>
            </tr>
            <tr>
                <td><span class="text-destaque">Gênero:</span> <br><?php echo!empty($cooperado['cooperado']['genero']) ? $cooperado['cooperado']['genero'] : '' ?></td>                                      
                <td><span class="text-destaque">Estado Cívil:</span> <br><?php echo!empty($cooperado['cooperado']['estado_civil']) ? $cooperado['cooperado']['estado_civil'] : '' ?></td>
                <td><span class="text-destaque">Nacionalidade:</span> <br><?php echo!empty($cooperado['cooperado']['nacionalidade']) ? $cooperado['cooperado']['nacionalidade'] : '' ?></td>
            </tr>
            <tr>
                <td><span class="text-destaque">Nascimento:</span> <br><?php echo!empty($cooperado['cooperado']['data_nascimento']) ? $this->formatDateView($cooperado['cooperado']['data_nascimento']) : '' ?></td>
                <td><span class="text-destaque">Data de Inscrição:</span> <br><?php echo!empty($cooperado['cooperado']['data_inscricao']) ? $this->formatDateView($cooperado['cooperado']['data_inscricao']) : '' ?></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <th colspan="2"><h4 class="text-destaque">Familiares</h4></th>
            </tr>
            <tr>
                <td><span class="text-destaque">Pai:</span><br> <?php echo!empty($cooperado['cooperado']['pai']) ? $cooperado['cooperado']['pai'] : '' ?></td>
                <td><span class="text-destaque">Mãe:</span><br> <?php echo!empty($cooperado['cooperado']['mae']) ? $cooperado['cooperado']['mae'] : '' ?></td>
            </tr>
            <tr>
                <td><span class="text-destaque">Cônjuge:</span><br> <?php echo!empty($cooperado['cooperado']['conjugue']) ? $cooperado['cooperado']['conjugue'] : '' ?></td>
                <td><span class="text-destaque">Filhos:</span><br> <?php echo!empty($cooperado['cooperado']['filhos']) ? $cooperado['cooperado']['filhos'] : '' ?></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <th colspan="1"><h4 class="text-destaque">Endereço</h4></th>
            </tr>
            <tr>
                <td> <?php echo!empty($cooperado['endereco']['logradouro']) ? $cooperado['endereco']['logradouro'] : '' ?>, <?php echo!empty($cooperado['endereco']['numero']) ? 'nº ' . $cooperado['endereco']['numero'] : 'S/N' ?>, <?php echo!empty($cooperado['endereco']['bairro']) ? 'bairro ' . $cooperado['endereco']['bairro'] : '' ?>, <?php echo!empty($cooperado['endereco']['complemento']) ? $cooperado['endereco']['complemento'] : '' ?> - <?php echo!empty($cooperado['endereco']['cidade']) ? $cooperado['endereco']['cidade'] : '' ?>  - <?php echo!empty($cooperado['endereco']['estado']) ? $cooperado['endereco']['estado'] : '' ?> <?php echo!empty($cooperado['endereco']['cep']) ? ' - CEP: ' . $cooperado['endereco']['cep'] : '' ?></td>
            </tr>
        </table>        
        <table class="table">
            <tr>
                <th colspan="3"><h4 class="text-destaque">Validade da Carteira</h4></th>
            </tr>
            <tr>
                <td><span class="text-destaque">Data de Emissão:</span><br> <?php echo!empty($cooperado['carteira']['data_inicial']) ? $this->formatDateView($cooperado['carteira']['data_inicial']) : '' ?></td>
                <td><span class="text-destaque">Data de Validade:</span><br> <?php echo!empty($cooperado['carteira']['data_validade']) ? $this->formatDateView($cooperado['carteira']['data_validade']) : '' ?></td>
            </tr>
        </table>

        <table class="table">
            <tr>
                <th colspan="3"><h4 class="text-destaque">Relatório de Produção</h4></th>
            </tr>
            <?php
            if (isset($cooperado['producao']) && !empty($cooperado['producao'])) {
                $qtd = 1;
                ?>
                <tr>
                    <th width="50px">#</th>
                    <th> Produto</th>
                    <th width="300px">Área em metro quadrado(m²)</th>
                </tr>
                <?php
                foreach ($cooperado['producao'] as $index):
                    ?>
                    <tr>
                        <td class="linha"><?php echo $qtd ?></td>
                        <td class="linha"><?php echo $index['producao'] . " - " . $index['categoria'] ?></td>
                        <td class="linha"><?php echo!empty($index['area']) ? $index['area'] . ' m²' : '' ?></td>
                    </tr>
                    <?php
                    $qtd++;
                endforeach;
            } else {
                echo '<tr><td colspan="1">Desculpe, não foi possível localizar nenhum registro.</td></tr>';
            }
            ?>

        </table>

        <table class="table table2">
            <tr>
                <th colspan="13"> <h4 class="text-destaque"> Relatório de Mensalidade</h4></th>
            </tr>
            <?php
            if (isset($cooperado['mensalidades']) && !empty($cooperado['mensalidades'])) {
                $qtd = 1;
                ?>
                <tr>
                    <th class="font-small">Ano</th>
                    <th class="font-small">Janeiro</th>
                    <th class="font-small">Fevereiro</th>
                    <th class="font-small">Março</th>
                    <th class="font-small">Abril</th>
                    <th class="font-small">Maio</th>
                    <th class="font-small">Junho</th>
                    <th class="font-small">Julho</th>
                    <th class="font-small">Agosto</th>
                    <th class="font-small">Setembro</th>
                    <th class="font-small">Outubro</th>
                    <th class="font-small">Novembro</th>
                    <th class="font-small">Dezembro</th>
                </tr>
                <?php
                foreach ($cooperado['mensalidades'] as $mensalidade):
                    ?>
                    <tr>
                        <td class="font-small"><?php echo!empty($mensalidade['ano']) ? $mensalidade['ano'] : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['janeiro']) ? $this->formatDinheiroView($mensalidade['janeiro']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['fevereiro']) ? $this->formatDinheiroView($mensalidade['fevereiro']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['marco']) ? $this->formatDinheiroView($mensalidade['marco']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['abril']) ? $this->formatDinheiroView($mensalidade['abril']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['maio']) ? $this->formatDinheiroView($mensalidade['maio']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['junho']) ? $this->formatDinheiroView($mensalidade['junho']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['julho']) ? $this->formatDinheiroView($mensalidade['julho']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['agosto']) ? $this->formatDinheiroView($mensalidade['agosto']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['setembro']) ? $this->formatDinheiroView($mensalidade['setembro']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['outubro']) ? $this->formatDinheiroView($mensalidade['outubro']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['novembro']) ? $this->formatDinheiroView($mensalidade['novembro']) : '' ?></td>
                        <td class="font-small"><?php echo!empty($mensalidade['dezembro']) ? $this->formatDinheiroView($mensalidade['dezembro']) : '' ?></td>
                    </tr>
                    <?php
                endforeach;
            } else {
                echo '<tr><td colspan="13">Desculpe, não foi possível localizar nenhum registro.</td></tr>';
            }
            ?>

        </table>

        <table class="table">
            <tr>
                <th colspan="3"><h4 class="text-destaque"> Relatório de Histórico</h4></th>
            </tr>

            <?php
            if (isset($cooperado['historicos']) && !empty($cooperado['historicos'])) {
                $qtd = 1;
                ?>
                <tr>
                    <th width="50px">#</th>
                    <th width="200px">Data</th>
                    <th>Descrição / Atendimento</th>
                </tr>
                <?php
                $qtd = 1;
                foreach ($cooperado['historicos'] as $historico):
                    ?>
                    <tr>
                        <td class="linha"><?php echo $qtd ?></td>
                        <td class="linha"><?php echo $this->formatDateViewComplet($historico['data_historico']) ?></td>
                        <td class="linha"><?php echo $historico['descricao_historico'] ?></td>
                    </tr>
                    <?php
                    ++$qtd;
                endforeach;
            } else {
                echo '<tr><td colspan="3">Desculpe, não foi possível localizar nenhum registro.</td></tr>';
            }
            ?>

        </table>
        <table>
            <tr>
                <td align="right">Este documento foi gerado em <?php echo $this->formatDateView(date("Y-m-d")) . ' as ' . date("H:i:s", (time() - 10800)) ?>.</td>
            </tr>
        </table>
    </body>

</html>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
$mpdf->WriteHTML($html);
$arquivo = 'ficha_do_servidor_' . md5(time()) . '.pdf';
$mpdf->Output($arquivo, 'I');
?>
