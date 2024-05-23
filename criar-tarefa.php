<?php
require_once "vendor/autoload.php";
require "tarefa-funcoes.php";
require "tarefa.php";
require "conexao-banco-de-dados.php"; 

$dadosTarefa = $_POST;
if(! $dadosTarefa['tarefa']){
    header('Location: index.php'); 
    exit;
}

$tarefa = new Tarefa($dadosTarefa['tarefa'], $dadosTarefa['descricao']);

criarTarefa($pdo, $tarefa);

header('Location: index.php'); 
