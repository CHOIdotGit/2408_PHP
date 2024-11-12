<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('u_id');
            // $table->string('name');
            $table->string('u_email', 100)->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('u_password', 255); // 기본이 255
            // $table->rememberToken();
            $table->string('u_name', 50)->unique(); // 이름에 유니크는 내 선택
            $table->timestamps(); // 작성일자 및 수정일자
            $table->softDeletes(); // 삭제일자
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
