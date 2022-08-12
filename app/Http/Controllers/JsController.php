<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class JsController extends Controller
{
    public function dynamic()
    {
        $contents = View::make('admin.js.dynamic');
        $response = Response::make($contents, 200);
        $response->header('Content-Type', 'application/javascript');
        return $response;
    }
}
