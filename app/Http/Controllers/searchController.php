<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class searchController extends Controller
{
    
    public function search(Request $req){
        if($req->search){
            // flwel knt kansearchi ghi b body
            // $searchPosts= Post::with('user')->where('body','LIKE','%'.$req->search.'%')->latest()->paginate(10);
            // db wlit kansearci b title w body
            $searchPosts = Post::with('user')->where(function ($query) use ($req) {
                $query->where('body', 'LIKE', '%' . $req->search . '%')
                ->orWhere('title', 'LIKE', '%' . $req->search . '%');
            })->latest()->paginate(10);
            
            return view('searchPage')->with(['searchPosts'=>$searchPosts]);
            // dd($searchPosts);
        }else{
            return redirect()->back()->with('message','empty search');
        } 
    }
}
