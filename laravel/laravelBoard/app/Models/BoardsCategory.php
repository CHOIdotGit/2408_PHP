<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardsCategory extends Model
{
    // 팩토리를 사용하지 않아 trait 지움
    protected $table = 'boards_category';
    protected $primaryKey = 'bc_id';

    protected $fillable = [
        'bc_type'
        ,'bc_name'
    ];
}
