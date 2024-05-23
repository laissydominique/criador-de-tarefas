<?php


function todasAsTarefas(\PDO $pdo): array
{
    $tarefas = [];

    $sql = "SELECT * FROM tarefas.tarefas_cumprir";
    $stmt = $pdo->query($sql);
    $tarefasDados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($tarefasDados as $tarefa) {
        $tarefaObjeto = new Tarefa($tarefa['tarefa'], $tarefa['descricao_tarefa']);
        $tarefaObjeto->id = $tarefa['tarefas_id'];
        $tarefas[] = $tarefaObjeto;
    }

    return $tarefas;
}

function criarTarefa(\PDO $pdo, Tarefa $tarefa): void
{

    $sql = "INSERT INTO tarefas.tarefas_cumprir (tarefa, descricao_tarefa) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tarefa->tarefa, $tarefa->descricao]);
}

function excluirTarefa(\PDO $pdo, $idTarefa): void
{
    $sql= "DELETE FROM tarefas.tarefas_cumprir WHERE tarefas_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idTarefa]);
}
