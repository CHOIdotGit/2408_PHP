<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index() {
        $boardList = Board::orderBy('created_at', 'DESC')->paginate(12);
        $user = User::find(1);
        $this->myTokenService->createTokens($user);        
        $responseData = [
            'success' => true
            ,'msg' => '게시글 획득 성공'
            ,'boardList' => $boardList->toArray()
        ];

        return response()->json($responseData, 200);
    }

    public function show() {

    }

    public function store() {

    }
}
