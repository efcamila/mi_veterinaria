<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['cabecera'] = view('template/cabecera');
        return view('menu',$data);
    }
}
