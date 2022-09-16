<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function get_flashed_messages() {
        $flashed_messages = [];
        foreach(session()->all() as $session_name => $session) {
            if(substr($session_name, 0, 6) == 'flash_') {
                $flashed_messages[] = [substr($session_name, 6), session()->get($session_name)];
                session()->forget($session_name);
            }
        }
        return $flashed_messages;
    }

    public function dashboard() {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('dashboard.dashboard', ['categories' => $categories, 'flashed_messages' => self::get_flashed_messages()]);
    }

    public function delete_category(Category $category) {
        if(!$category->allow_for_delete()) {
            abort(404);
        }

        $category->delete();
        session()->put('flash_success', 'دسته بندی شما با موفقیت حذف شد.');
        return redirect()->route('dashboard');
    }
}
