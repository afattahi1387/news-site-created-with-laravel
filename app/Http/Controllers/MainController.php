<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {
        $categories = Category::all();
        $news = News::orderBy('id', 'DESC')->paginate(5);
        return view('main_views.home', ['categories' => $categories, 'news' => $news]);
    }

    public function single_news(News $news) {
        $categories = Category::all();
        return view('main_views.single_news', ['categories' => $categories, 'news' => $news]);
    }
}
