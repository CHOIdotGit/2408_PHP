<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QueryController extends Controller
{
    public function index(Request $request) {
        // ----------------------
        // 쿼리 빌더

        // 쿼리 빌더를 이용하지 않고 SQL 작성
        // SELECT
        $result = DB::select('select * from users'); // select할 때 대문자 소문자 상관없음 + 이렇게 다 쓰는 것을 평문이라고 하는데 평문으로 다 쓸 때도 있다.
        // 접근은 $result[0]->u_id << 이런 식으로 할 수 있다. 이전에 배웠는 것은 배열이지만 현재는 객체로 사용되고 있다.
        $result = DB::select('SELECT * FROM users WHERE u_email = :u_email', ['u_email' => 'admin@admin.com']);
        // $data = ['u_email' => 'admin@admin.com']; 넣고
        // $result = DB::select('SELECT * FROM users WHERE u_email = :u_email', $data); << 이렇게 사용한 것과 동일함
        // $result = DB::select('SELECT * FROM users WHERE u_email = ?', ['u_email' => 'admin@admin.com']); << 이 방식도 사용 할 수 있음

        // INSERT
        // DB::insert('INSERT INTO boards_category (bc_type, bc_name) VALUES(?, ?)', ['3', '테스트게시판']);
        // DB::insert('INSERT INTO boards_category (bc_type, bc_name) VALUES(?, ?)', ['4', '문희열립니다']);

        // UPDATE
        // DB::update('UPDATE boards_category SET bc_name = ? WHERE bc_type = ?', ['미어캣게시판', '3']);


        // DELETE
        // DB::delete('DELETE FROM boards_category WHERE bc_type = ?', ['3']);

        
        //------------------------
        // 쿼리 빌더 체이닝
        
        // users 테이블 모든 데이터 조회
        // select * from users;
        $result = DB::table('users')->get();

        // select * from users where u_name = ? ['관리자']
        $result = DB::table('users')
                        ->where('u_name', '=', '관리자')
                        ->get();

        // select * from boards where bc_type = ? and b_id < ? ['0', 5]
        // 조건이 and로 엮여있따면 where로 연결해 주면 된다.
        $result = DB::table('boards')
                        ->where('bc_type', '=', '0')
                        ->where('b_id', '<', 5)
                        ->get();


        // select * from boards where bc_type = ? or b_id < ? ['0', 10]
        $result = DB::table('boards')
                        ->select('b_title', 'b_content')
                        ->where('bc_type', '=', '0')
                        ->orWhere('b_id', '<', 10)
                        ->get();

        // select b_title, b_content from boards where b_id in(?, ?) [1, 2]
        $result = DB::table('boards')
                        ->whereIn('b_id', [1, 2])
                        ->get();

        // select * from boards where deleted_at us null
        $result = DB::table('boards')
                        ->whereNull('deleted_at')
                        ->get();


        // select * from users where year(created_at) = ? ['2024']
        $result = DB::table('users')
                        ->whereYear('created_at', '=', '2024')
                        ->get(); // ->dd(); 로도 사용할 수 있음 다만 dump로 출력되고 처리 종료됨

        // select * from users where created_at >= '2024-01-01 00:00:00' and created_at >= '2024-12-31 23:59:59';


        // 게시판별 글의 개수 구하기(삭제된 것 포함)
        // $result = DB::table('boards')
        //                 ->select(DB::raw('count(*) as cnt, bc_type'))
        //                 ->where('deleted_at', '=',)
        //                 ->get();

        // select bc_type, count(*) cnt from boards group by bc_type HAVING bc_type = '0'
        $result = DB::table('boards')
                        ->select('bc_type', DB::raw('COUNT(*) cnt')) 
                        ->groupBy('bc_type')
                        ->get(); // DB에 있는 메소드를 사용하고 있다면 DB::raw()를 사용해야 한다.
                        // 삭제한 것 제외 : ->whereNull('deleted_at')를 groupBy 위에 적으면 된다.
                        // Having을 추가하려면 groupBy 밑에 having('bc_type', '=', '0')을 적으면 된다.

        // select b_id, b_title from boards order by b_id limit ? offset ? [1, 2]
        $result = DB::table('boards')
                        ->select('b_id', 'b_title')
                        ->orderBy('b_id', 'asc')
                        ->limit(1)
                        ->offset(2)
                        ->get(); 

        // 동적 쿼리 when
        $requestData = [
            'u_id' => 1
        ]; // 0, '', [] 의 경우 when 조건이 실행되지 않는다.
        $result = DB::table('users')
                        ->when($requestData['u_id'], function($query, $u_id) {
                            $query->where('u_id', '=', $u_id);
                        })
                        ->get(); // 여기서 dd()를 사용하면 var_dump와 같이 출력하고 처리가 종료된다.
                        // 따라서, dd()는 var_dump까지 진행되지 않는다. - dd()는 실행 메소드
                        // $query에 $result = DB::table('users') -> 데이터가 담겨 있어 $query에->(체이닝메소드)를 이용해서 where을 적는다.

        // 삭제되지 않은 글 중 제목에 자유 또는 질문이 포함되어 있는 게시글 검색
        // select b_title from boards where (b_title like '%자유%' or b_title like '%질문%') and deleted_at is null
        // ??? 뭐지 괄호 없이 잘 가져 오는데? 왜??? 라고 생각했지만 자유3에 deleted_at에 값을 넣어보니 자유3도 들고와버리네
        $result = DB::table('boards')
                        ->select('b_title')
                        ->whereNull('deleted_at')
                        ->where(function($query) {
                            $query->where('b_title', 'like', '%자유%')
                                ->orWhere('b_title', 'like', '%질문%');
                        })
                        ->get();  
        
        // first() : 쿼리 결과 중 첫번째 레코드만 반환한다.
        $result = DB::table('users')->first();

        // find() : 지정된 pk에 해당하는 레코드를 반환한다. pk번호를 딱 하나만 select 할 때 사용
        // $result = DB::table('users')->find(1, 'u_id');

        // count() : 쿼리 결과의 레코드 수를 반환하는 실행 메소드
        $result = DB::table('users')->count();

        // insert
        // $result = DB::table('users')
        //                 ->insert([
        //                     'u_email' => 'manager@admin.com'
        //                     ,'u_password' => Hash::make('qwer1234')
        //                     ,'u_name' => '매니저'
        //                 ]);
        // 인서트는 true or false로 반환된다.


        // update
        // $result = DB::table('users')
        //                 ->where('u_id', '=', 2)
        //                 ->update([
        //                     'u_name' => '둘기'
        //                 ]);     
        // 업데이트는 영향받은 레코드 수가 반환된다.(type = int)

        // delete
        // $result = DB::table('users')
        //                 ->where('u_id', '=', 2)
        //                 ->delete();
        // 만약 해당 id가 FK로 설정되어 있다면 FK오류가 발생하고 삭제처리는 진행하지 않는다.

        // -----------------------------------
        // 이제부터 라라벨의 모델을 사용함

        // Eloquent Model

        // $result = DB::table('users')->get();
        // $result = User::get();
        // 소프트딜리트를 감지하고 deleted_at이 null인 값만 가져온다.

        // u_id가 '1'인 사람을 찾으려면
        // $result = DB::table('users')->get();
        // $result = User::where('u_name', '=', '둘기')->first();
        // $result = User::find(1);
        // $result->u_name = '테스트';

        // Insert
        // $userInsert = new User();
        // $userInsert->u_email = $request->u_email;
        // $userInsert->u_password =$request->u_password;
        // $userInsert->u_name = $request->u_name;
        // $userInsert->save();

        
// http://localhost:8000/query?u_email=manager@admin.com&u_password=qwer1234&u_name=%EB%A7%A4%EB%8B%88%EC%A0%80

// var_dump($userInsert);

        // Update
        // $userUpdate = User::find(4); 
        // $userUpdate->u_name = '중간관리자';
        // $userUpdate->save();

        // Delete
        // $userDelete = User::destroy(4); // 소프트 딜리트(논리적 삭제)
        // $user = User::find(1);
        // $user->forceDelete(); // 물리적 삭제

        // 삭제된 데이터도 포함해서 검색하고 싶을 때
        $result = User::withTrashed()->count();
        // $result = User::withTrashed()->find(4);

        // 삭제된 데이터만 검색하고 싶을 때
        $result = User::onlyTrashed()->count();
        // $result = User::onlyTrashed()->find(4);

        // 삭제한 데이터를 되살리고 싶을 때
        $result = User::where('u_id', 4)->restore();
        

    var_dump($result);
        return '';
    }
}
