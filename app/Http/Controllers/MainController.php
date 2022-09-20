<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use App\Message;
use App\Category;
use Illuminate\Http\Request;
use App\Notifications\ReceivesMessage;
use App\Http\Requests\ContactUsRequest;
use Illuminate\Support\Facades\Notification;

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
        return view('main_views.category', ['category' => $category, 'categories' => $categories, 'news' => $news]);
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

    public function contact_us() {
        return view('main_views.contact-us');
    }

    public function post_contact_us(ContactUsRequest $request) {
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        $admins = User::all();
        foreach($admins as $admin) {
            Notification::send($admin, new ReceivesMessage($request->name));
        }

        echo "<script>alert('پیام شما با موفقیت ثبت شد.');</script>";
        echo "<script>window.location.href='" . env('APP_URL') . "';</script>";
    }
}
