<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function add()
    {
        echo __METHOD__;
        return view('admin.news.create');
    }
}
