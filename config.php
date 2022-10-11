<?php

/*
 * config.php  - Este arquivo contem informações referente a: Conexão com banco de dados e URL Pádrão
 */

require 'environment.php';
$config = array();
if (ENVIRONMENT == 'development') {
    //Raiz
    define("BASE_URL", "http://localhost/siaf");
    //nome do projeto
    define("NAME_PROJECT", "SIAF - Sistema de Informação de Avaliação Físico");
    //Nome do banco
    $config['dbname'] = 'siaf_db';
    //host
    $config['host'] = 'localhost';
    //usuario
    $config['dbuser'] = 'root';
    //senha
    $config['dbpass'] = '';
} else {
    //Raiz
    define("BASE_URL", "https://sig.cootax.com.br");
    //nome do projeto
    define("NAME_PROJECT", "SIAF - Sistema de Informação de Avaliação Físico");
    //Nome do banco
    $config['dbname'] = 'BANCO_DE_DADOS';
    //host
    $config['host'] = 'localhost';
    //usuario
    $config['dbuser'] = 'USUARIO_MYSQL';
    //senha
    $config['dbpass'] = 'SENHA_DO_USUÁRIO';
}
?>
