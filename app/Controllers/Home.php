<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home || Dashboard'
        ];
        return view('admin/dashboard', $data);
    }
}
