<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Board.php';

class BoardRepository extends Repository {
    public  function getBoard(int $id_board): ?Board {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.board WHERE id_board = :id_board
        ');
        $stmt->bindParam(':id_board', $id_board, PDO::PARAM_INT);
        $stmt->execute();

        $board = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($board == false) {
            return null;
        }

        return new Board(
            $board['title'],
            $board['background_img']
        );
    }

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
            SELECT list.order as lorder, t.order as torder, *  FROM public.list JOIN task t on list.id_list = t.id_list_fk WHERE "id_board_FK" = :id_board;
        ');

        $stmt->bindParam(':id_boartd', $id_board, PDO::PARAM_INT);
        $stmt -> execute();
        $boards = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lists as $list) {
            $result[] = new Board(
                $board['title'],
                $board['background_img'],
                $user_id
            );
        }

        return $result;

    }

}