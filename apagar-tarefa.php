<?php

require_once 'vendor/autoload.php';
require 'tarefa-funcoes.php';
require 'conexao-banco-de-dados.php';

$idTarefa = $_GET['id'];

excluirTarefa($pdo, $idTarefa);

header('Location: index.php');