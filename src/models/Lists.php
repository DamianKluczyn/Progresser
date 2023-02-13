<?php

class Lists
{
    private $id_board;
    private $id_list;
    private $l_order;
    private $l_title;


    public function __construct($id_board, $id_list, $l_order, $l_title)
    {
        $this->id_board = $id_board;
        $this->id_list = $id_list;
        $this->l_order = $l_order;
        $this->l_title = $l_title;
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
}