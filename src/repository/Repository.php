<?php

namespace repository;

require_once __DIR__.'/../../Database.php';

class Repository
{
    protected $database;
    //TODO zrobic singleton

    public function __construct() {
        $this -> database = new Database();
    }

}