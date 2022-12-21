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
     * Está função pertence a uma action do controle MVC, ela chama a  função alunos();
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index() {
        $this->aluno();
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para mostra todas os alunos.
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function aluno($page = 1) {
        if ($this->checkUser() >= 2) {
            $view = "aluno/relatorio_avancado";
            $dados = array();
            $alunoModel = new aluno();
            $crudModel = new crud_db();
            $dados['turmas'] = $crudModel->read("SELECT * FROM turma WHERE cod_instituicao=:cod", array('cod' => $this->getCodInstituicao()));
            $dados['modo_exebicao'] = 1;
            $campos_buscar = array();
            if (isset($_POST['nBuscarBT'])) {
                $sql = "SELECT a.*, t.turma, t.curso FROM aluno as a INNER JOIN turma as t WHERE t.cod=a.cod_turma AND t.cod_instituicao= " . $this->getCodInstituicao() . " AND a.cod >= 1";
                $filtro = array();
                //curso
                if (isset($_POST['nCurso']) && !empty($_POST['nCurso'])) {
                    $sql = $sql . " AND t.curso = :curso ";
                    $filtro['curso'] = addslashes($_POST['nCurso']);
                    $campos_buscar['curso'] = addslashes($_POST['nCurso']);
                } else {
                    $campos_buscar['curso'] = 'Todos';
                }
                //turma
                if (isset($_POST['nTurma']) && !empty($_POST['nTurma'])) {
                    $sql = $sql . " AND a.cod_turma = :cod_turma ";
                    $filtro['cod_turma'] = addslashes($_POST['nTurma']);
                    $turma = $crudModel->read_specific('SELECT * FROM turma WHERE cod=:cod', array('cod' => $_POST['nTurma']));
                    $campos_buscar['turma'] = $turma['turma'];
                } else {
                    $campos_buscar['turma'] = 'Todas';
                }
                //nGenero
                if (isset($_POST['nGenero']) && !empty($_POST['nGenero'])) {
                    $sql = $sql . " AND a.genero = :genero ";
                    $filtro['genero'] = addslashes($_POST['nGenero']);
                    $campos_buscar['genero'] = addslashes($_POST['nGenero']);
                } else {
                    $campos_buscar['genero'] = 'Todos';
                }
                //nCor
                if (isset($_POST['nCor']) && !empty($_POST['nCor'])) {
                    $sql = $sql . " AND a.cor = :cor ";
                    $filtro['cor'] = addslashes($_POST['nCor']);
                    $campos_buscar['cor'] = addslashes($_POST['nCor']);
                } else {
                    $campos_buscar['cor'] = 'Todos';
                }
                //nIntensidadeFisica
                if (isset($_POST['nIntensidadeFisica']) && !empty($_POST['nIntensidadeFisica'])) {
                    $sql = $sql . " AND a.intensidade_fisica = :intensidade_fisica ";
                    $filtro['intensidade_fisica'] = addslashes($_POST['nIntensidadeFisica']);
                    $campos_buscar['intensidade_fisica'] = addslashes($_POST['nIntensidadeFisica']);
                } else {
                    $campos_buscar['intensidade_fisica'] = 'Todos';
                }
                //objetivo
                if (isset($_POST['nObjetivo']) && !empty($_POST['nObjetivo'])) {
                    $sql = $sql . " AND a.objetivo = :objetivo ";
                    $filtro['objetivo'] = addslashes($_POST['nObjetivo']);
                    $campos_buscar['objetivo'] = addslashes($_POST['nObjetivo']);
                } else {
                    $campos_buscar['objetivo'] = 'Todos';
                }

                if (isset($_POST['nPor']) && !empty($_POST['nPor']) && !empty($_POST['nBuscar'])) {
                    switch ($_POST['nPor']) {
                        case 'Nome':
                            $sql = $sql . " AND a.nome LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Fumante':
                            $sql = $sql . " AND a.fumante LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Alergico':
                            $sql = $sql . " AND a.alergia LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Lesão':
                            $sql = $sql . " AND a.lesao LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Medicamento Controlado':
                            $sql = $sql . " AND a.medicamento LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Número de refeições diárias':
                            $sql = $sql . " AND a.refeicoes LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Bebidas':
                            $sql = $sql . " AND a.bebidas LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Praticante de atividades físicas semanais':
                            $sql = $sql . " AND a.atividade_fisica LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
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
                    $viewPDF = "aluno/relatorio_pdf";
                    $dadosPDF = array();
                    $dadosPDF['busca'] = $campos_buscar;
                    $dadosPDF['cidade'] = $crudModel->read_specific('SELECT * FROM instituicao WHERE cod=:cod', array('cod' => $this->getCodInstituicao()));
                    $dadosPDF['alunos'] = $dados['alunos'];
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
                $dados['alunos'] = $alunoModel->read('SELECT a.*, t.turma, t.curso FROM aluno as a INNER JOIN turma as t WHERE t.cod=a.cod_turma AND t.cod_instituicao= ' . $this->getCodInstituicao() . ' AND a.cod >= 1');
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
                $sql = "SELECT a.*, t.turma, t.curso FROM aluno as a INNER JOIN turma as t WHERE t.cod=a.cod_turma AND t.cod_instituicao= " . $this->getCodInstituicao() . " AND a.cod >= 1";
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
                $sql = "SELECT t.*, COUNT(a.cod) as qtd FROM turma as t LEFT JOIN aluno AS a ON t.cod=a.cod_turma WHERE t.cod_instituicao=:cod AND t.cod >= 1";
                $campos_buscar = array();
                $filtro = array('cod' => $this->getCodInstituicao());
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
                $sql = $sql . " GROUP BY t.turma";
                $dados['turmas'] = $crudModel->read($sql, $filtro);
                if ($_POST['nModoPDF'] == 1) {
                    $viewPDF = "turma/relatorio_pdf";
                    $dadosPDF = array();
                    $crudModel = new crud_db();
                    $dadosPDF['busca'] = $campos_buscar;
                    $dadosPDF['cidade'] = $crudModel->read_specific('SELECT * FROM instituicao WHERE cod=:cod', array('cod' => $this->getCodInstituicao()));
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
                $dados['turmas'] = $crudModel->read('SELECT t.*, COUNT(a.cod) as qtd FROM turma as t LEFT JOIN aluno AS a ON t.cod=a.cod_turma WHERE t.cod_instituicao=:cod GROUP BY t.turma', array('cod' => $this->getCodInstituicao()));
            }

            $this->loadTemplate($view, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

}
