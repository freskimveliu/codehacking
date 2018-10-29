<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
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

        $input = $request->all();

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }

        $check_email = User::whereEmail($request->email)->first();
        if($check_email != null){
            return redirect()->back()->withErrors('This email has already been taken.');
        }
        if($file = $request->file('photo_id')){
             $name = time().'_'.$file->getClientOriginalName();

             $file->move('images',$name);

             $photo = Photo::create([
                 'file' => $name
             ]);
             $input['photo_id'] = $photo->id;
        }

        $user = User::create($input);

        return redirect('/admin/users');
    }

    public function edit($id){
        $user  = User::findOrFail($id);
        $roles = Role::latest()->get();

        return view('admin.users.edit',compact('user','roles'));
    }

    public function update(UsersEditRequest $request,$id){
        $input = $request->all();

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }

        if($file = $request->file('photo_id')){
            $name = time().'_'.$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create([
                'file' => $name
            ]);

            $input['photo_id'] = $photo->id;
        }

        $user = User::findOrFail($id);

        $user->update($input);

        return redirect('/admin/users');
    }
}
