<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function dashboard() {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('dashboard.dashboard', ['categories' => $categories]);
    }
}
