<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    // SoftDeletes 트레이트 : 해당 모델에 소프트딜리트를 적용하고 싶을 때 추가한다.
    // trait(트레이트) : 기능을 정의하는 특성?
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // 테이블명 정의하는 프로퍼티 (디폴트는 모델명의 복수형)
    protected $table = 'users';

    // PK 지정하는 프로퍼티
    // 기본으로 'id'로 인식한다.
    protected $primaryKey = 'u_id';

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    // const 기존 컬럼명 = '바꿀 컬럼명';

    // upsert(update+insert)시 변경을 허용할 컬럼들을 설정하는 프로퍼티(화이트리스트)
    protected $fillable = [
        'u_email'
        ,'u_password'
        ,'u_name'
        ,'created_at'
        ,'updated_at'
        ,'deleted_at'
    ];
    // PK는 내부적으로 다른 동작을 하기 때문에 제외시킨다.

    // upsert(update+insert)시 변경을 비허용할 컬럼들을 설정하는 프로퍼티(블랙리스트)
    // protected $guarded = [
    //     'id'
    // ];
    // PK라서 의미는 없지만 이런 형식으로 진행된다는 것을 알고있으면 됨



}
