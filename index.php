<?php

require_once 'vendor/autoload.php';
require 'conexao-banco-de-dados.php';
require 'tarefa.php';
require 'tarefa-funcoes.php';


$tarefas = todasAsTarefas($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="titulo">
        <h1>Lista de tarefas a serem cumpridas hoje </h1>
        <p class="data-dia"><time datetime="<?php echo date('c'); ?>"><?php echo date('d/m/Y'); ?></time></p>
    </div>
    <div>
        <form action="/criar-tarefa.php" method="post">
        <input type="text" name="tarefa" id="tarefa" placeholder="Digite a tarefa" required>
        <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição">
        <br>
        <button>Salvar</button>

        </form>
    </div>
    <div class=" tabela-tarefas">
        <table>
            <thead>
                <tr>
                <th class="feito">Feito</th>
                    <th class="tarefa">Tarefa</th>
                    <th class="descricao">Descrição</th>
                    <th class="eliminar">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarefas as $tarefa) : ?>
                    <tr>
                        <td><div class="check"><input type="checkbox"></div></td>
                        <td><?php echo $tarefa->tarefa ?></td>
                        <td><?php echo $tarefa->descricao ?></td>
                        <td><a href="apagar-tarefa.php?id=<?= $tarefa->id?>">Excluir</a></td> 
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</body>

</html>