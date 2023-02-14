<?php

class Board
{
    private $id_board;
    private $title;
    private $background_img;
    private $id_user;

    public function __construct(int $id_board, $title, $background_img, $id_user)
    {
        $this->id_board = $id_board;
        $this->title = $title;
        $this->background_img = $background_img;
        $this->id_user = $id_user;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getBackground_img(): string
    {
        return $this->background_img;
    }

    public function setBackground_img(string $background_img)
    {
        $this->background_img = $background_img;
    }

    public function getUserId(): string
    {
        return $this -> id_user;
    }

    public function setUserId(string $user_id)
    {
        $this->user_id = $user_id;
    }

    public function getIdBoard(): int
    {
        return $this->id_board;
    }

}