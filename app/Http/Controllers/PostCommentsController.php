<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{
    public function index(){
      $comments = Comment::latest()->get();
      return view('admin.comments.index',compact('comments'));
    }

    public function store(Request $request){
       $user = Auth::user();
       $data = [
           'post_id'    => $request->get('post_id'),
           'author'     => $user->name ?? '',
           'email'      => $user->email ?? '',
           'body'       => $request->get('body'),
           'photo'      => $user->photo->file ?? '',
       ];

       Comment::create($data);

       session()->flash('success','Your message has been submitted and is waiting moderation!');

       return redirect()->back();
    }

    public function update(Request $request, $id){
        $comment = Comment::findOrFail($id);

        $comment->update($request->all());

        session()->flash('success','Comment status has been changed!');

        return redirect('admin/comments');
    }

    public function destroy($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();

        session()->flash('errors','Comment has been deleted!');

        return redirect()->back();
    }
}
