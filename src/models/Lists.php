<?php

class Lists
{
    private $id_board;
    private $id_list;
    private $l_order;
    private $l_title;
    private $id_task;
    private $t_priority;
    private $t_difficulty;
    private $t_name;

    public function __construct($id_board, $id_list, $l_order, $l_title, $id_task, $t_priority, $t_difficulty, $t_name)
    {
        $this->id_board = $id_board;
        $this->id_list = $id_list;
        $this->l_order = $l_order;
        $this->l_title = $l_title;
        $this->id_task = $id_task;
        $this->t_priority = $t_priority;
        $this->t_difficulty = $t_difficulty;
        $this->t_name = $t_name;
    }

    public function getIdBoard()
    {
        return $this->id_board;
    }

    public function setIdBoard($id_board): void
    {
        $this->id_board = $id_board;
    }

    public function getIdList()
    {
        return $this->id_list;
    }

    public function setIdList($id_list): void
    {
        $this->id_list = $id_list;
    }

    public function getLOrder()
    {
        return $this->l_order;
    }

    public function setLOrder($l_order): void
    {
        $this->l_order = $l_order;
    }

    public function getLTitle()
    {
        return $this->l_title;
    }

    public function setLTitle($l_title): void
    {
        $this->l_title = $l_title;
    }

    public function getIdTask()
    {
        return $this->id_task;
    }

    public function setIdTask($id_task): void
    {
        $this->id_task = $id_task;
    }

    public function getTPriority()
    {
        return $this->t_priority;
    }

    public function setTPriority($t_priority): void
    {
        $this->t_priority = $t_priority;
    }

    public function getTDifficulty()
    {
        return $this->t_difficulty;
    }

    public function setTDifficulty($t_difficulty): void
    {
        $this->t_difficulty = $t_difficulty;
    }

    public function getTName()
    {
        return $this->t_name;
    }

    public function setTName($t_name): void
    {
        $this->t_name = $t_name;
    }

    public function countTask()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT count(*) FROM public.task WHERE id_list_fk = :id_list;
        ');

        $stmt->bindParam(':id_list', $this->getIdList(), PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}