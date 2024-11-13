<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 인덱스는 여러개의 목록을 출력하는 List
        // 리스트 데이터 획득
        $result = Board::select('b_id', 'b_title', 'b_content', 'b_img')
                        ->orderBy('created_at', 'DESC')
                        ->orderBy('b_id', 'DESC')
                        ->limit(100)
                        ->get();
        // eloquent를 사용해 소프트 딜리트 된 항목은 제외하고 출력된다.

        return view('boardList')->with('data', $result); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 작성 페이지로 이동(새로운 것을 작성하는 페이지로 이동) - redirect
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 실제로 작성하는 페이지(작성 처리)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 상세 정보를 전달해주는 역할
        // 상세 데이터를 만들어서 보내준다.
        // 현재는 디테일 페이지로 이동 또는 모달 상세 페이지
        // 라라벨에서 json형태로 데이터 받아오는 방법
        // 그전에 라라벨 로그
        Log::debug(('******** boards.show ********'));
        Log::debug('request id : '.$id);

        $result = Board::find($id);
        Log::debug('획득한 상세 데이터 : ', $result->toArray());

        return response()->json($result->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 해당 게시글의 수정 페이지로 이동
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 실제 수정 처리(수정 완료 버튼 클릭 시 변경 처리)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 데이터 삭제 / 요즘은 모달로 삭제처리를 한다.
        // 만약, 삭제 페이지가 따로 있다면 액션 메소드를 하나 더 만들어야 한다.
    }
}
