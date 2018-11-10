<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    public function index(){
        $photos = Photo::latest()->get();

        return view('admin.media.index',compact('photos'));
    }

    public function create(){
        return view('admin.media.create');
    }

    public function store(Request $request){
        if($file = $request->file('file')){
            $name = time().'_'.$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
        }
    }

    public function destroy($id){
        $photo = Photo::findOrFail($id);

        $photo->delete();

        return redirect('/admin/media');
    }

    public function delete(Request $request){
        $photos = Photo::findOrFail($request->checkBoxArray);

        foreach ($photos as $photo) {
            $photo->delete();
        }
        return redirect()->back()->with('success','Medias has been deleted');
    }
}
