<?php

class graficoController extends controller {

    public function associado_tipo() {
        if ($this->checkUser()) {
            $crud = new crud_db();
            $resultado = $crud->read("SELECT tipo as label, COUNT(*) as data FROM associado GROUP BY label");
            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
        }
    }

    public function asssociado_status() {
        if ($this->checkUser()) {
            $crud = new crud_db();
            $resultado = array();
            $resultado[] = $crud->read_specific("SELECT 'Ativos' as label, COUNT(*) as data FROM associado WHERE status=1");
            $resultado[] = $crud->read_specific("SELECT 'Inativos' as label, COUNT(*) as data FROM associado WHERE status=0");
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
