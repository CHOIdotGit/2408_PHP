<?php

namespace Controllers;
use Controllers\Controller;
use Models\Board;
use Models\BoardsCategory;

class BoardController extends Controller {
    private $arrBoardList = []; // 게시글 정보 리스트
    private $boardName = ''; // 게시판 이름
    protected $boardType = ''; //게시판 코드

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
        $this->boardType = $requestData['bc_type'];

        // 게시글 정보 획득
        $boardModel = new Board();
        $this->setArrBoardList($boardModel->getBoardList($requestData));

        // 보드 이름 획득
        $boardCategoryModel = new BoardsCategory();
        $resultBoardCategory = $boardCategoryModel->getBoardName($requestData);
        $this->setBoardName($resultBoardCategory['bc_name']);

            return 'board.php';
    }
    
    // 상세(detail)
    public function show() {
        $requestData = [
            'b_id' => $_GET['b_id']
        ];

        // 게시글 정보 조회
        $boardModel = new Board();
        $resultBoard = $boardModel->getBoardDetail($requestData);
        // 여기선 예외처리 건너 뜀


        // JSON 변환 처리
        $responseData = json_encode($resultBoard);
        header('Content-Type: application/json');
        echo $responseData;
        exit;
    }

    // 작성 페이지로 이동
    public function create() {
        $this->boardType = $_GET['bc_type'];
        return 'insert.php';
    }

    // 작성 처리
    public function store() {
        $requestData = [
            'b_title' => $_POST['b_title']
            ,'b_content' => $_POST['b_content']
            ,'b_img' => ''
            ,'bc_type' => $_POST['bc_type']
            ,'u_id' => $_SESSION['u_id']
        ];

        $requestData['b_img'] = $this->saveImg($_FILES['file']);

        $boardModel = new Board();
        $boardModel->beginTransaction();
        $resultBoardInsert = $boardModel->insertBoard($requestData);
        if($resultBoardInsert !== 1) {
            $boardModel->rollBack();
            $this->arrErrorMsg[] = '게시글 작성 실패';
            $this->boardType = $requestData['bc_type'];
            return 'insert.php'; // 단순 뷰 파일 불러오는 용도
        }

        $boardModel->commit();

        return 'Location: /boards?bc_type='.$requestData['bc_type'];
    }

    private function saveImg($file) {
        $type = explode('/', $file['type']); // ['IMAGE', 확장자]
        $fileName = uniqid().'.'.$type[1]; // 34asdaw2.확장자
        $filePath = _PATH_IMG.'/'.$fileName; // /View/img/34asdaw2.확장자
        move_uploaded_file($file['tmp_name'], _ROOT.$filePath); // 파일 복사
        
        return $filePath;
    }
}