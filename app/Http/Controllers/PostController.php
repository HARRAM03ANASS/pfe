<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //

    public function form(){
        return view('addPosts');
    }

    public function add(Request $req){
        $validated=$req->validate([
            'image'=>'required|image|mimes:png,jpg,jpeg|max:2048',
            'title'=>'required|min:3|max:100',
            'body'=>'required|min:10|max:1000',
            'categories' => 'required|exists:categories,id'
            ]);
        // dd($req->all());
        $userId = Auth::id(); 
        $categoryId = $req->input('categories');
        if($req->has('image')){
            $image=$req->image;
            $image_name=time()."_".$image->getClientOriginalName(); //had lfunction katrecupiri lina smiya dyl img
            $image->move(public_path('uploads'),$image_name);
        }
        
        Post::create([
            'title'=>$req->title,
            'slug'=>Str::slug($req->title),
            'body'=>$req->body,
            'user_id'=>$userId,
            'category_id'=>$categoryId,
            'image'=>$image_name
        ]);
        Session::flash('success', 'Post added successfully!');
        return redirect()->route('home');
    }
}



// public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'category' => 'required|not_in:0',
//     ]);

//     $category = $validatedData['category'];
//     // Proceed with the selected category
// }