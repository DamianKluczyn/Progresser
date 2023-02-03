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
            //TODO wyjatek zamiast nulla ktorego odbierze security controller w login()
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

        // TODO pobrac z sesji
        $id_created_by = 1;

        $stmt->execute([
            $board->getTitle(),
            $board->getBackground_img(),
            $id_created_by
        ]);
    }

    public  function getBoards(): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.board;
        ');
        $stmt -> execute();
        $boards = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($boards as $board) {
            $result[] = new Board(
                $board['title'],
                $board['background_img']
            );
        }

        return $result;
    }
}