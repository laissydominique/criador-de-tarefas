<?php

class Tarefa {
    public $tarefa;
    public $descricao;
    public $id;


    public function __construct($tarefa, $descricao)
    {
        $this->tarefa=$tarefa;
        $this->descricao=$descricao;
        
    }
}
