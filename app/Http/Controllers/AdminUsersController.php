<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index(){
        return view('admin.users.index');
    }

    public function create(){
        return view('admin.users.create');
    }
}
