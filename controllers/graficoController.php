<?php

class graficoController extends controller {

    public function aluno_objetivo() {
        if ($this->checkUser()) {
            $crud = new crud_db();
            $resultado = $crud->read("SELECT objetivo as label, COUNT(*) as data FROM aluno GROUP BY objetivo");
            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
        }
    }

    public function aluno_genero() {
        if ($this->checkUser()) {
            $crud = new crud_db();
            $resultado = $crud->read("SELECT genero as label, COUNT(*) as data FROM aluno GROUP BY genero");
            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
        }
    }

    public function grafico_financeiro() {
        if ($this->checkUser()) {
            $crud = new crud_db();
            $resultado = array();
            $resultado[] = $crud->read_specific('SELECT "Entrada" as label, SUM(valor) as data FROM sig_lucro WHERE data BETWEEN "' . date('Y-01-01') . '" AND "' . date('Y-12-31') . '"');
            $resultado[] = $crud->read_specific('SELECT "Despesa" as label, SUM(valor) as data FROM sig_despesa WHERE data BETWEEN "' . date('Y-01-01') . '" AND "' . date('Y-12-31') . '"');
            $resultado[] = $crud->read_specific('SELECT "Investimento" as label, SUM(valor) as data FROM sig_investimento WHERE data BETWEEN "' . date('Y-01-01') . '" AND "' . date('Y-12-31') . '"');
            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
        }
    }

}
