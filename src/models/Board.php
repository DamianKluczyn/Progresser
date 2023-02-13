<?php

class Board
{

    private $title;

    private $background_img;
    private $id_user;

    public function __construct($title, $background_img, $id_user)
    {
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

    public function getIdBoard(): string {
        $stmt = $this->database->connect()->prepare('
            SELECT id_board FROM public.board WHERE id_created_by = :id_user AND title = :title;
        ');

        $stmt->bindParam(':id_user', $this -> getUserId(), PDO::PARAM_INT);
        $stmt->bindParam(':title', $this -> getTitle(), PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchOne(PDO::FETCH_ASSOC);
    }

}