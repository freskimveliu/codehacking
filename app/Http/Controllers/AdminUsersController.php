<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        $roles = Role::latest()->get();
        return view('admin.users.create',compact('roles'));
    }

    public function store(UsersRequest $request){

        $user = User::create($request->all());

        return redirect('/admin/users');
    }
}
