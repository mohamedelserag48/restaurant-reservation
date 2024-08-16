<?php

namespace App\Http\Controllers;

use App\Http\Response\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
