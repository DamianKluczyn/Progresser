<?php

class Board
{
    private $title;

    private $background_img;

    public function __construct($title, $background_img)
    {
        $this->title = $title;
        $this->background_img = $background_img;
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


}