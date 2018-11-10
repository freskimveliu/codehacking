<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReplay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentRepliesController extends Controller
{
    public function createReply(Request $request){
        $user = Auth::user();
        $data = [
            'comment_id' => $request->get('comment_id'),
            'author'     => $user->name ?? '',
            'email'      => $user->email ?? '',
            'body'       => $request->get('body'),
            'photo'      => $user->photo->file ?? '',
        ];

        CommentReplay::create($data);

        session()->flash('success','Your message has been submitted!');

        return redirect()->back();
    }
}
