<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index() {
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

        var_dump($result);
        return '';
    }
}
