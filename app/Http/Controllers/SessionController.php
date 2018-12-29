<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function index_file(Request $request)
    {

        $data = $request->session()->all();
        var_dump($data);

        exit;
    }
    public function index_database(Request $request){
        $data = $request->session()->all();
        var_dump($data);

        exit;

    }

}
