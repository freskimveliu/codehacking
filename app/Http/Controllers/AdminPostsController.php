<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(5);
        return view('admin.posts.index',compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.posts.create',compact('categories'));
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

    public function edit($id){
        $post       = Post::findOrFail($id);
        $categories = Category::all();

        return view('admin.posts.edit',compact('post','categories'));
    }

    public function update(Request $request,$id){
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time().'_'.$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create([
                'file' => $name
            ]);

            $input['photo_id'] = $photo->id;
        }

        $user = Auth::user();
        $post = $user->posts()->find($id);
        $post->update($input);

        session()->flash('status','Post has been updated.');
        return redirect('/admin/posts');

    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();

        unlink(public_path().$post->photo->file);

        session()->flash('errors','The post has been deleted');

        return redirect('/admin/posts');
    }

    public function post($slug){
        $post       = Post::findBySlugOrFail($slug)->first();
        $comments    = $post->comments()->get();
        return view('post',compact('post','comments'));
    }

}
