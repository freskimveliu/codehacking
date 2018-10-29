<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(PostsCreateRequest $request){
        $user = Auth::user();

        $inputs = $request->all();

        if($file = $request->file('photo_id')){
            $name = time().'_'.$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create([
                'file' => $name
            ]);

            $inputs['photo_id'] = $photo->id;
        }

        $user->posts()->create($inputs);

        session()->flash('success','The post has been created');

        return redirect('/admin/posts');
    }

}
