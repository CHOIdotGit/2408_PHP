<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Throwable;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        // 인덱스는 여러개의 목록을 출력하는 List
        // eloquent를 사용해 소프트 딜리트 된 항목은 제외하고 출력된다.

        // 게시글 타입 획득
        $bcType = '0';
        if($request->has('bc_type')) {
            $bcType = $request->bc_type;
        }

        // 리스트 데이터 획득
        $result = Board::select('b_id', 'b_title', 'b_content', 'b_img')
                        ->where('bc_type', $bcType) // '='은 생략가능
                        ->orderBy('created_at', 'DESC')
                        ->orderBy('b_id', 'DESC')
                        ->limit(100)
                        ->get();

        // 게시판 이름 획득
        $boardInfo = BoardsCategory::where('bc_type', $bcType)->first();

        return view('boardList')
                ->with('data', $result)
                ->with('boardInfo', $boardInfo); 
                // 위와 같이 with을 따로따로 보내는 것은 지양해야 한다.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 작성 페이지로 이동(새로운 것을 작성하는 페이지로 이동) - redirect
        return view('insert')
                ->with('bcType', $request->bc_type); // 파일 이름
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
        // 유효성 검사
        
        // 방법 1 : 무조건 요청이 오기 직전의 페이지로 이동(create 페이지로)(로그인 페이지에서 요청이 오면 로그인 페이지로)
        // $request->validate([
        //     'b_title' => ['required', 'between:2,50']
        //     ,'b_content' => ['required', 'between:2,200']
        //     ,'file' => ['required', 'image']
        //     ,'bc_type' => ['required', 'exists:boards_category,bc_type']
        // ]);

        // 방법 2
        $validator = Validator::make(
            $request->only('b_title', 'b_content', 'file' /*, 'bc_type'*/)
            ,[
            'b_title' => ['required', 'between:2,50']
            ,'b_content' => ['required', 'between:2,200']
            ,'file' => ['required', 'image']
            // ,'bc_type' => ['required']
        ]);

        // 방법 1로 만들 경우 사용하지 않는다(if($validator->fails()) {...})
        // 유효성 검사 실패 시 에러 메세지와 함께 회원가입페이지 리다이렉션
        if($validator->fails()) {
            return redirect()
                    ->route('boards.create')
                    ->withErrors($validator->errors()) // errors는 생략 가능($validator만)
                    ->withInput();
        }
        
        // 라라벨 파일 저장 방법 1
        // $filePath = $request->file('file')->store('img');

        // 글 작성 처리 - 선생님 코드
        // $insertData = $request->only('b_title', 'b_content', 'bc_type');
        // $insertData['b_img'] = '/'.$filePath;
        // $insertData['u_id'] = Auth::id(); // 세션에 저장된 것은 유효성 체크를 하지 않는다
        // Board::created($insertData);
        // return redirect()->route('boards.index', ['bc_type' => $request->bc_type]);

        $flePath ='.jpg';
        // 게시글 저장
        try {
            // 라라벨 파일 저장 방법 2
            $path = $request->file('file')->store('img');
            DB::beginTransaction();
            Board::create([
                'b_title' => $request->b_title
                ,'b_content' => $request->b_content
                ,'b_img' => $path
                ,'u_id' => Auth::id()
                ,'bc_type' => '0' // 자유게시판으로 설정
            ]);
            DB::commit();
    
        } catch(Throwable $th) {
            DB::rollBack();
            // if(Storage::exists($filePath)) {
            //     Storage::delete($filePath);
            // }
            return redirect()->route('boards.create')->withErrors($th->getMessage());
        }
        return redirect()->route('boards.index');
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
        // Log::debug(('******** boards.show ********'));
        // Log::debug('request id : '.$id);

        $result = Board::find($id);
        
        $responseData = $result->toArray();
        $responseData['delete_flg'] = false;
        
        if($result->u_id === Auth::id()) {
            $responseData['delete_flg'] = true;
        }
        
        // Log::debug('획득한 상세 데이터 : ', $result->toArray());
        return response()->json($responseData);

        $board = Board::findOrFail($id);
        return view('/boards')->with('data', $board);
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
    
        $result = Board::destroy($id);

        $responseData = [
            'success' => $result === 1 ? true : false
        ];

        return response()->json($responseData);
    }
}
