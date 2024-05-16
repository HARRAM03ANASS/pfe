<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    //
    public function users(){
        // hadi bach n3ref kola user ch7al endo mn post
        $usersInfo = Post::select('user_id', DB::raw('COUNT(*) as post_count'))
        ->groupBy('user_id')
        ->with('user')
        ->get();        
        $postsInfo=Post::with('user')->latest()->get();

        $usersCount = DB::select('CALL CountUsers()');
        $totalUsers = $usersCount[0]->totalUsers;

        $postsCount = DB::select('CALL CountPosts()');
        $totalPosts = $postsCount[0]->totalPosts;
        return view('adminDashboard')->with(['users_infos'=>$usersInfo,'posts_infos'=>$postsInfo,'total_users'=>$totalUsers,'total_posts'=>$totalPosts]);
    }

    public function publish($slug){
        $post = Post::where('slug', $slug)->first();
        $post->status="published";
        $post->save();
        return redirect()->back()->with('message','post status changed to published');
    }

    public function unpublish($slug){
        $post = Post::where('slug', $slug)->first();
        $post->status="unpublished";
        $post->save();
        return redirect()->back()->with('message','post status changed to unpublished');
    }

    public function unban($id){
        $user = User::where('id', $id)->first();
        $user->ban=0;
        $user->save();
        return redirect()->back()->with('message','post status changed to unpublished');
    }

    public function ban($id){
        $user = User::where('id', $id)->first();
        $user->ban=1;
        $user->save();
        return redirect()->back()->with('message','post status changed to unpublished');
    }
    
    
    public function postsPdf(){
        $postsInfo = Post::with('user')->latest()->get();
        view()->share('postsInfos', $postsInfo);
        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('postsPdf', ['postsInfos' => $postsInfo]);
        return $pdf->download('PostsDashboard.pdf');
        redirect()->back();
    }

    public function usersPdf(){
        $usersInfo = Post::select('user_id', DB::raw('COUNT(*) as post_count'))
        ->groupBy('user_id')
        ->with('user')
        ->get();  
        view()->share('usersInfo',$usersInfo);
        $pdf=app()->make('dompdf.wrapper');
        $pdf->loadView('usersPdf',['usersInfo '=>$usersInfo ]);
        return $pdf->download('UsersDashboard.pdf');
        redirect()->back();
    }

}

