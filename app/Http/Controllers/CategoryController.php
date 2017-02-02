<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
class CategoryController extends Controller
{
    public function getCategory($slug){
        $categories = Category::where("slug",$slug)->first();


        return view("categories")->withCategories($categories);



    }
}
