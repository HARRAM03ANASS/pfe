<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function display(){
        $user_posts=auth()->user()->posts()->latest()->get();

        $user_info=auth()->user();

        return view('profile')->with(['user_posts'=>$user_posts,'user_info'=>$user_info]);
    }
    public function delete($slug){
        $post=Post::where('slug',$slug)->first();
        $post->delete();
        return redirect()->back()->with(['sucess'=>'Post has been deleted']);
    }
    public function edit($slug){
        $post=Post::Where('slug',$slug)->first();
        return view('editPost')->with(['post'=>$post]);
    }

    public function update(Request $req,$slug){
        $post=Post::Where('slug',$slug)->first();
        if($req->has('image')){
            $image=$req->image;
            $image_name=time()."_".$image->getClientOriginalName(); //had lfunction katrecupiri lina smiya dyl img
            $image->move(public_path('uploads'),$image_name);
            unlink(public_path('uploads/') . $post->image);
            $post->image=$image_name;
        }
        $post->update([
            'title'=>$req->title,
            'slug'=>Str::slug($req->title),
            'body'=>$req->body,
            'categories'=>$req->category_id,
            'image'=>$post->image
        ]);
        return redirect('profile')->with(['sucess'=>'post has been modified']);

    }
    
}
