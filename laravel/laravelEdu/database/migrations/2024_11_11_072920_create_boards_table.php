<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // migration 파일 생성 : php artisan make:migration 파일명
    // migration 파일 실행 : php artisan make:migrate
    // migration 파일 롤백(직전의 migration 작업 되돌리기) : php artisan migrate:rollback
    // migration 파일 리셋(모든 migration 작업 되돌리기) : php artisan migrate:reset

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 스키마 라인에서 테이블명(boards)을 제외한 것들은 고정이다.
        Schema::create('boards_test', function (Blueprint $table) {
            $table->id('b_id');
            $table->bigInteger('u_id')->unsigned();
            $table->char('bc_type', 1);
            $table->string('b_title', 50);
            $table->string('b_content', 200);
            $table->string('b_img', 100);
            $table->timestamps();
            // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamps(); << 얘가 위 2개의 코드와 같다. 그래서 컬럼명이 다르거나 독자적으로 사용하고 싶을 경우에 쓰면 될듯?
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards_test');
    }
};
