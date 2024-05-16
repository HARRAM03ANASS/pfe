<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
        public function store(Request $req){
            $validated=$req->validate([
                'content'=>'required',
                ]);
            if(Auth::check()){
                $post=Post::where('slug',$req->slug)->first();
                if($post){
                    Comment::create([
                        'post_id'=>$post->id,
                        'user_id'=>Auth::user()->id,
                        'content'=>$req->content
                    ]);
                    return redirect()->back()->with('message','Comment Successfully Added!');

                }else{
                    return redirect()->back()->with(['message'=>'No such post found']);
                    // return redirect()->back()->with(['post'=>$post,'message'=>'No such post found']);
                }
            }else{
                return redirect()->route('login');
                // hadi makhedmach 7it ana deja dyr dik @auth 3la lcomment form
            }
        }

        public function delete(Request $req){
            $comment=Comment::Where('id',$req->id)->where('user_id',Auth::user()->id)->first();
            $comment->delete();
            return redirect()->back()->with('message','Comment Has been Deleted');
        }
}