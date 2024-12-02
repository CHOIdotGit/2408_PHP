<?php

namespace App\Http\Controllers;

use App\Services\MyTokenService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    protected $myTokenService;
    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(MyTokenService $myTokenService)
    {
        $this->myTokenService = $myTokenService;
    }
}
