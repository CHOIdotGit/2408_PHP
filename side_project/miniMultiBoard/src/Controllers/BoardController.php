<?php

namespace Controllers;
use Controllers\Controller;
use Models\Board;
use Models\BoardsCategory;

class BoardController extends Controller {
    private $arrBoardList = []; // 게시글 정보 리스트
    private $boardName = ''; // 게시판 이름

    // getter
    public function getArrBoardList() {
        return $this->arrBoardList;
    }

    public function getBoardName() {
        return $this->boardName;
    }

    // setter
    public function setArrBoardList($arrBoardList) {
        $this->arrBoardList = $arrBoardList;
    }

    public function setBoardName($boardName) {
        $this->boardName = $boardName;
    }

    public function index() {
        // board 타입 획득
        $requestData = [
            'bc_type' => isset($_GET['bc_type']) ? $_GET['bc_type'] : '0',
        ];

        // 게시글 정보 획득
        $boardModel = new Board();
        $this->setArrBoardList($boardModel->getBoardList($requestData));

        // 보드 이름 획득
        $boardCategoryModel = new BoardsCategory();
        $resultBoardCategory = $boardCategoryModel->getBoardName($requestData);
        $this->setBoardName($resultBoardCategory['bc_name']);

            return 'board.php';
    }
}