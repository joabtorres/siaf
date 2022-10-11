<?php

/**
 * A classe 'relatorioController' é responsável para fazer o carregamento das views relacionado a relatorios e validações de exibição de campos
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe relatorioController
 */
class relatorioController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela chama a  função cooperados();
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index() {
        $this->cooperados();
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para mostra todas os cooperados.
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function aluno($page = 1) {
        if ($this->checkUser() >= 2) {
            $view = "aluno/relatorio_avancado";
            $dados = array();
            $alunoModel = new aluno();
            $dados['modo_exebicao'] = 1;
            $campos_buscar = array();
            if (isset($_POST['nBuscarBT'])) {
                $sql = "SELECT cooperado.cod, cooperado.apelido, cooperado.nome_completo, cooperado.data_inscricao, cooperado.imagem, cooperado.tipo FROM associado as cooperado WHERE cooperado.cod >= 1";
                $filtro = array();
                if (isset($_POST['nTipo']) && !empty($_POST['nTipo'])) {
                    $sql = $sql . " AND cooperado.tipo = :tipo ";
                    $filtro['tipo'] = addslashes($_POST['nTipo']);
                    $campos_buscar['tipo'] = addslashes($_POST['nTipo']);
                } else {
                    $campos_buscar['tipo'] = 'Todos';
                }
                if (isset($_POST['nStatus']) && !empty($_POST['nStatus'])) {
                    $sql = $sql . " AND cooperado.status = :status ";
                    $filtro['status'] = (addslashes($_POST['nStatus']) == 'Ativo') ? 1 : 0;
                    $campos_buscar['status'] = addslashes($_POST['nStatus']);
                } else {
                    $campos_buscar['status'] = 'Todos';
                }
                if (isset($_POST['nPor']) && !empty($_POST['nPor']) && !empty($_POST['nBuscar'])) {
                    switch ($_POST['nPor']) {
                        case 'matricula':
                            $sql = $sql . " AND cooperado.cod = '" . addslashes($_POST['nBuscar']) . "' ";
                            break;
                        case 'Apelido':
                            $sql = $sql . " AND cooperado.apelido LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Nome Completo':
                            $sql = $sql . " AND cooperado.nome_completo LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Ano de Inscrição':
                            $sql = $sql . " AND cooperado.data_inscricao LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        default :
                            break;
                    }
                    $campos_buscar['por'] = $_POST['nPor'];
                    $campos_buscar['campo'] = $_POST['nBuscar'];
                } else {
                    $campos_buscar['por'] = 'Todos';
                    $campos_buscar['campo'] = '';
                }
                $dados['alunos'] = $alunoModel->read($sql, $filtro);
                //modo de exebição
                $dados['modo_exebicao'] = $_POST['nModoExibicao'];

                if ($_POST['nModoPDF'] == 1) {
                    $viewPDF = "associado/relatorio_pdf";
                    $dadosPDF = array();
                    $crudModel = new crud_db();
                    $dadosPDF['busca'] = $campos_buscar;
                    $dadosPDF['cidade'] = $crudModel->read('SELECT * FROM instituicao WHERE cod=:cod', array('cod' => $this->getCodInstituicao()));
                    $dadosPDF['cidade'] = $dadosPDF['cidade'][0];
                    $dadosPDF['cooperados'] = $dados['cooperados'];
                    ob_start();
                    $this->loadView($viewPDF, $dadosPDF);
                    $html = ob_get_contents();
                    ob_end_clean();
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf->WriteHTML($html);
                    $arquivo = 'Associados_' . date('d_m_Y.') . 'pdf';
                    $mpdf->Output($arquivo, 'I');
                }
            } else {
                $dados['alunos'] = $alunoModel->read('SELECT a.*, t.turma, t.curso FROM aluno as a INNER JOIN turma as t WHERE t.cod=a.cod_turma AND a.cod >= 1');
            }
            $this->loadTemplate($view, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, responsável para fazer uma buscar rápida, por nz ou nome.
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function buscarapida($page = 1) {
        if ($this->checkUser() >= 2) {
            $view = "aluno/relatorio_busca_rapido";
            $dados = array();
            $alunoModel = new aluno();
            $dados['modo_exebicao'] = 1;
            if (isset($_POST['nSerachCampo']) && !empty($_POST['nSerachCampo'])) {
                $sql = "SELECT a.*, t.turma, t.curso FROM aluno as a INNER JOIN turma as t WHERE t.cod=a.cod_turma AND a.cod >= 1";
                switch ($_POST['nSearchFinalidade']) {
                    case 'matricula':
                        $sql = $sql . " AND a.cod = '" . addslashes($_POST['nSerachCampo']) . "' ";
                        break;
                    default :
                        $sql = $sql . " AND a.nome LIKE '%" . addslashes($_POST['nSerachCampo']) . "%' ";
                        break;
                }
                $dados['alunos'] = $alunoModel->read($sql);
            } else {
                $dados['alunos'] = $alunoModel->read('SELECT a.*, t.turma, t.curso FROM aluno as a INNER JOIN turma as t WHERE t.cod=a.cod_turma AND a.cod >= 1');
            }
            $this->loadTemplate($view, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para mostra todas as turmas, podendo fazer a filtragem deste registro
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function turma($page = 1) {
        if ($this->checkUser() >= 1) {
            $view = "turma/relatorio";
            $dados = array();
            $crudModel = new crud_db();
            if (isset($_POST['nBuscarBT']) && !empty($_POST['nBuscarBT'])) {
                $sql = "SELECT * FROM turma as t WHERE t.cod >= 1";
                $campos_buscar = array();
                $filtro = array();
                if ($_POST['nCurso'] == "Todos") {
                    $campos_buscar['curso'] = 'Todos';
                } else {
                    $sql = $sql . " AND t.curso LIKE '%" . addslashes($_POST['nCurso']) . "%' ";
                    $campos_buscar['curso'] = addslashes($_POST['nCurso']);
                }

                if (isset($_POST['nPor']) && !empty($_POST['nPor']) && !empty($_POST['nBuscar'])) {
                    switch ($_POST['nPor']) {
                        case 'nome':
                            $sql = $sql . " AND t.turma LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'ano':
                            $sql = $sql . " AND t.ano LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        default :
                            break;
                    }
                    $campos_buscar['por'] = $_POST['nPor'];
                    $campos_buscar['campo'] = $_POST['nBuscar'];
                } else {
                    $campos_buscar['por'] = 'Todos';
                    $campos_buscar['campo'] = '';
                }
                $dados['turmas'] = $crudModel->read($sql, $filtro);
                if ($_POST['nModoPDF'] == 1) {
                    $viewPDF = "turma/relatorio_pdf";
                    $dadosPDF = array();
                    $crudModel = new crud_db();
                    $dadosPDF['busca'] = $campos_buscar;
                    $dadosPDF['cidade'] = $crudModel->read('SELECT * FROM instituicao WHERE cod=:cod', array('cod' => $this->getCodInstituicao()));
                    $dadosPDF['cidade'] = $dadosPDF['cidade'][0];
                    $dadosPDF['turmas'] = $dados['turmas'];
                    ob_start();
                    $this->loadView($viewPDF, $dadosPDF);
                    $html = ob_get_contents();
                    ob_end_clean();
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf->WriteHTML($html);
                    $arquivo = 'Associados_' . date('d_m_Y.') . 'pdf';
                    $mpdf->Output($arquivo, 'I');
                }
            } else {
                $dados['turmas'] = $crudModel->read('SELECT * FROM turma WHERE cod_instituicao=:cod', array('cod' => $this->getCodInstituicao()));
            }

            $this->loadTemplate($view, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

}
