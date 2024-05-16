<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function display(){
        // $posts=Post::all();
        $post_infos = Post::with('user')->where('status','published')->inRandomOrder()->paginate(20);
        // hnaya khdemt b Eager Loading li howa wahed lblan ky9lel lwe9t dyl execution
        // w kykhdem m3a les relation b sbabo hadi li lta7t mab9inach m7tajinha
        // $posts = Post::inRandomOrder()->get();
        // 7it matalan ila kan 3ndna 25posts ghytexecuta lquery 26 mra 
        // lmera lwla bach nakhdo ga3 les post w 25 mra bach nakhdo user dyl kola post
        // Thankfully, we can use eager loading to reduce this operation to just two queries.  

        return view('/home')->with(['post_infos'=>$post_infos]);
    }

    

}
