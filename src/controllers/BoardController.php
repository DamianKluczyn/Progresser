<?php
session_start();

require_once 'AppController.php';
require_once __DIR__.'/../models/Board.php';
require_once __DIR__.'/../repository/BoardRepository.php';


class BoardController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $boardRepository;

    public function __construct()
    {
        parent::__construct();
        $this->boardRepository = new BoardRepository();
    }

    public function boards()
    {
        $boards = $this->boardRepository->getBoards($_SESSION['id_user']);
        $this -> render('boards',['boards' => $boards]);
    }

    public function task_board() {
        $lists = $this -> boardRepository -> getLists($_GET['id_board']);
        $tasks = [];
        foreach ($lists as $list):
            $tasks[$list -> getLTitle()] = $this->boardRepository ->getTasks($list -> getIdList());
        endforeach;
        $this -> render('task_board',['lists' => $lists, 'tasks' => $tasks]);
    }

    public function addBoard() {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $board = new Board("", $_POST['title'], $_FILES['file']['name'], $_SESSION['id_user']);
            $this->boardRepository->addBoard($board);

            /*$url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/boards");*/

            return $this->render("boards", [
                'messages' => $this->messages,
                'boards' => $this->boardRepository->getBoards($_SESSION['id_user'])
            ]);
        }

        return $this->render('add_board', ['messages' => $this->messages]);
    }

    public function addTask() {
        if($this->isPost()) {

            $task = new Task();
            $list = new Lists();
            $this->boardRepository->addTask();

            return $this->render("task_board", [
                'messages' => $this->messages,
                'boards' => $this->boardRepository->getBoards($_SESSION['id_user'])
            ]);
        }

        return $this->render('add_task', ['messages' => $this->messages]);
    }

    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported';
            return false;
        }

        return true;
    }

}