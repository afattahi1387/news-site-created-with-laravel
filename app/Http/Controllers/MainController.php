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

    public function category(Category $category) {
        $categories = Category::all();
        $news = $category->news;
        return view('main_views.category', ['categories' => $categories, 'news' => $news]);
    }

    public function search() {
        if(!isset($_GET['searched_word']) || empty($_GET['searched_word'])) {
            abort(404);
        }

        $categories = Category::all();
        $news = News::where('name', 'like', '%' . $_GET['searched_word'] . '%')->orWhere('short_description', 'like', '%' . $_GET['searched_word'] . '%')->orWhere('long_description', 'like', '%' . $_GET['searched_word'] . '%')->get();
        return view('main_views.search', ['categories' => $categories, 'news' => $news]);
    }

    public function single_news(News $news) {
        $categories = Category::all();
        return view('main_views.single_news', ['categories' => $categories, 'news' => $news]);
    }
}
