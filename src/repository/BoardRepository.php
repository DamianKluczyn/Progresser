<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Board.php';

class BoardRepository extends Repository {

    public function addBoard(Board $board): void {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.board (title, background_img, id_created_by)
            VALUES(?, ?, ?)
        ');


        $stmt->execute([
            $board->getTitle(),
            $board->getBackground_img(),
            $board->getUserId()
        ]);
    }

    public  function getBoards(int $user_id): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.board WHERE id_created_by = :user_id;
        ');

        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt -> execute();
        $boards = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($boards as $board) {
            $result[] = new Board(
                $board['id_board'],
                $board['title'],
                $board['background_img'],
                $user_id
            );
        }

        return $result;
    }

    public function getLists(int $id_board): array{
        $result =[];

        $stmt = $this -> database-> connect() -> prepare('
            SELECT l."id_board_FK" as id_board, l.id_list as id_list, l.order as l_order, l.list_name as l_title
            FROM public.list l
            WHERE "id_board_FK" = :id_board;
        ');

        $stmt->bindParam(':id_board', $id_board, PDO::PARAM_INT);
        $stmt -> execute();
        $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lists as $list) {
            $result[] = new Lists(
                $list['id_board'],
                $list['id_list'],
                $list['l_order'],
                $list['l_title']
            );
        }

        return $result;
    }

    public function getTasks(int $id_list): array{
        $result =[];

        $stmt = $this -> database-> connect() -> prepare('
            SELECT t."id_list_fk" as id_list, t.id_task as id_task, t.priority as t_priority, t.difficulty as t_difficulty, t.name as t_name
            FROM public.task t
            WHERE "id_list_fk" = :id_list;
        ');

        $stmt->bindParam(':id_list', $id_list, PDO::PARAM_INT);
        $stmt -> execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tasks as $task) {
            $result[] = new Task(
                $task['id_list'],
                $task['id_task'],
                $task['t_priority'],
                $task['t_difficulty'],
                $task['t_name']
            );
        }

        return $result;
    }

}