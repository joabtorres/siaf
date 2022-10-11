<?php

/**
 * A classe 'homeController' é responsável para fazer o carregamento da página home do sistema
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe homeController
 */
class homeController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel por carrega a view  presente no diretorio views/home.php, desde que o usuário esteja logado no sistema
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index() {
        if ($this->checkUser() >= 1) {
            $view = "home";
            $dados = array();
            $crudModel = new crud_db();
            /*$dados['totalAssociados'] = $crudModel->read_specific("SELECT count(*) as qtd FROM associado");
            $dados['totalEntradas'] = $crudModel->read_specific("SELECT sum(valor) as valor FROM sig_lucro");
            $dados['totalDespesas'] = $crudModel->read_specific("SELECT sum(valor) as valor FROM sig_despesa");
            $dados['totalInvestimentos'] = $crudModel->read_specific("SELECT sum(valor) as valor FROM sig_investimento");
            $dados['producao'] = $crudModel->read('SELECT p.producao, COUNT(*) as qtd FROM associado_producao as ap INNER JOIN producao as p ON p.cod=ap.producao_cod GROUP BY p.producao ORDER BY qtd DESC');
            $resultado = $crudModel->read_specific('SELECT COUNT(*) as qtd FROM associado_producao ');
            $dados['totalProducao'] = 0;
            if (!empty($resultado)) {
                $dados['totalProducao'] = $resultado['qtd'];
            }*/
            $this->loadTemplate($view, $dados);
        } else {
            $_SESSION = array();
            $url = BASE_URL . '/login';
            header("Location: " . $url);
        }
    }

}
