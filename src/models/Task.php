<?php

class Task
{
    private $id_list;
    private $id_task;
    private $t_priority;
    private $t_difficulty;
    private $t_name;


    public function __construct($id_list, $id_task, $t_priority, $t_difficulty, $t_name)
    {
        $this->id_list = $id_list;
        $this->id_task = $id_task;
        $this->t_priority = $t_priority;
        $this->t_difficulty = $t_difficulty;
        $this->t_name = $t_name;
    }

    public function getIdList()
    {
        return $this->id_list;
    }

    public function setIdList($id_list): void
    {
        $this->id_list = $id_list;
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

    public function getNamePriority($t_priority): string{
        if($t_priority == 1){
            return "priority-low";
        } elseif ($t_priority == 2){
            return "priority-mid";
        }
        else{
            return "priority-ASAP";
        }
    }

    public function getNameDifficulty($t_difficulty): string{
        if($t_difficulty == 1){
            return "one";
        } elseif ($t_difficulty == 2){
            return "two";
        } elseif ($t_difficulty == 3) {
            return "three";
        } else{
            return "four";
        }
    }
}