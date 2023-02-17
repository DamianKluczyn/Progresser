<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Board.php';
require_once __DIR__.'/../models/Lists.php';
require_once __DIR__.'/../models/Task.php';

class BoardRepository extends Repository {

    public function addBoard(Board $board): bool {
        $connection = $this -> database -> connect();
        try {
            $connection -> beginTransaction();
            $stmt = $connection->prepare('
            INSERT INTO public.board (title, background_img, id_created_by)
            VALUES(?, ?, ?);
            ');

            $stmt->execute([
                $board->getTitle(),
                $board->getBackground_img(),
                $board->getUserId()
            ]);

            $stmt = $connection->prepare('
            SELECT id_board FROM public.board WHERE title=:title AND id_created_by=:id_user;
            ');

            $id_board = $stmt->fetchAll(PDO::PARAM_INT);

            $stmt=$connection->prepare('
            INSERT INTO public.user_board (id_user_fk, id_board_fk)
            VALUES(?, ?);
            ');

            $stmt->execute([
                $board->getUserId(),
                $id_board
            ]);

            $connection -> commit();
            return true;

        } catch (PDOException $exception) {
            $connection -> rollBack();
            return false;
        }
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

    public function getLists($id_board): array{
        $result =[];

        $stmt = $this -> database-> connect() -> prepare('
            SELECT l."id_board_FK" as id_board, l.id_list as id_list, l.order as l_order, l.list_name as l_title
            FROM public.list l
            WHERE "id_board_FK" = :id_board;
        ');
        $id_board = intval($id_board);
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

    public function countBoard(int $id_user): bool{
        $stmt = $this -> database-> connect() -> prepare('
            SELECT premium FROM users u
            WHERE u.id_user = :id_user;
            ');

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt -> execute();

        $premium = $stmt->fetchAll(PDO::PARAM_BOOL);

        if(!$premium){
            $stmt = $this -> database-> connect() -> prepare('
            SELECT count(id_board) FROM board b JOIN users u on b.id_created_by = u.id_user
            WHERE b.id_created_by = :id_user AND u.premium = false;
            ');

            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $stmt -> execute();

            $count = $stmt->fetchAll(PDO::FETCH_NUM);

            if($count >= 5){
                return false;
            }
        }

        return true;

    }

    public function addTask(Task $task):bool{
        $connection = $this -> database -> connect();
        try {
            $connection -> beginTransaction();
            $stmt = $connection->prepare('
            INSERT INTO public.task (id_list_fk, priority, difficulty, name)
            VALUES(?,?,?,?)
        ');

            $stmt->execute([
                $task->getIdList(),
                $task->getTPriority(),
                $task->getTDifficulty(),
                $task->getTName()
            ]);

            $connection -> commit();
            return true;

        } catch (PDOException $exception) {
            $connection -> rollBack();
            return false;
        }
    }

}