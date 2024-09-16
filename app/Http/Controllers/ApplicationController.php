<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function create(){
        return view('application.create');
    }
}
