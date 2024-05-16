<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($categoryId){


        if ($categoryId == 1) {
            $title = "questions";
        } elseif ($categoryId == 2) {
            $title = "reviews";
        } elseif ($categoryId == 3) {
            $title = "recommendations";
        } elseif ($categoryId == 4) {
            $title = "analysis";
        } elseif ($categoryId == 5) {
            $title = "news&rumors";
        } elseif ($categoryId == 6) {
            $title = "others";
        } elseif ($categoryId == 7) {
            $title = "pov";
        } else {
            $title = "there is no category with this id";
        }
        
        $category_info = Post::where('category_id', $categoryId)->get();
        
        if ($category_info->count() > 0) {
            return view('categoryPage', ['category_info' => $category_info,'title'=>$title]);
        } else {
            return view('categoryPage', ['category_info' => null]);
        }
}
}
