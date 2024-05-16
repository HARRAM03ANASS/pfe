<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostPageController extends Controller
{
    //
    public function showPost($slug){
        // $post=Post::find($id); had finf katkhdem ghi m3a id 
        // ila 7na ghankhdmo bslug ghykhessna ndiro where
        $post=Post::where('slug',$slug)->first();
        return view('postPage')->with(['post_infos'=>$post]);
    }
}
