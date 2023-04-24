<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class IndexController extends Controller
{
    function index() {
        return view('auth.login');
    }
}
