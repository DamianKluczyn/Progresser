<?php
require_once 'AppController.php';

class BoardController extends AppController
{
    public function addBoard(){
        $this->render('add_board');
    }

}