<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\Http\Requests\AddAndEditCategoryRequest;
use App\Http\Requests\AddAndEditNewsRequest;
use App\Http\Requests\UploadNewsImageRequest;
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

    public function set_flash_message($type, $message) {
        session()->put('flash_' . $type, $message);
    }

    public function dashboard() {
        $categories = Category::orderBy('id', 'DESC')->get();

        if(isset($_GET['edit-category']) && !empty($_GET['edit-category'])) {
            $category_for_edit = Category::find($_GET['edit-category']);
        } else {
            $category_for_edit = ['id' => 0, 'category_name' => ''];
        }

        return view('dashboard.dashboard', ['categories' => $categories, 'flashed_messages' => self::get_flashed_messages(), 'category_for_edit' => $category_for_edit]);
    }

    public function delete_category(Category $category) {
        if(!$category->allow_for_delete()) {
            abort(404);
        }

        $category->delete();
        self::set_flash_message('success', 'دسته بندی شما با موفقیت حذف شد.');
        return redirect()->route('dashboard');
    }

    public function add_category(AddAndEditCategoryRequest $request) {
        Category::insert([
            'category_name' => $request->category_name
        ]);

        self::set_flash_message('success', 'دسته بندی شما با موفقیت اضافه شد.');
        return redirect()->route('dashboard');
    }

    public function edit_category(Category $category, AddAndEditCategoryRequest $request) {
        $category->update([
            'category_name' => $request->category_name
        ]);

        self::set_flash_message('success', 'دسته بندی مورد نظر شما با موفقیت ویرایش شد.');
        return redirect()->route('dashboard');
    }

    public function news() {
        $news = News::orderBy('id', 'DESC')->get();
        $flashed_messages = self::get_flashed_messages();
        return view('dashboard.news', ['news' => $news, 'flashed_messages' => $flashed_messages]);
    }

    public function delete_news(News $news) {
        $news->delete();
        self::set_flash_message('success', 'خبر شما به سطل زباله منتقل شد.');
        return redirect()->route('dashboard.news');
    }

    public function add_news() {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('dashboard.add_news_form', ['categories' => $categories]);
    }

    public function create_news(AddAndEditNewsRequest $request) {
        $new_news = News::create([
            'name' => $request->name,
            'image' => '',
            'category_id' => $request->category_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description
        ]);

        return redirect()->route('upload.image.for.news', ['news' => $new_news->id]);
    }

    public function upload_image_for_news(News $news) {
        return view('dashboard.upload_image_for_news', ['news' => $news]);
    }

    public function insert_image_for_news(News $news, UploadNewsImageRequest $request) {
        $imagePath = $request->image->path();
        $imageName = $request->image->getClientOriginalName();
        $imageNewName = $news->id . '_' . $imageName;
        move_uploaded_file($imagePath, 'uploads/' . $imageName);
        rename('uploads/' . $imageName, 'uploads/' . $imageNewName);
        copy('uploads/' . $imageNewName, 'images/news_images/' . $imageNewName);
        unlink('uploads/' . $imageNewName);
        $news->update([
            'image' => $imageNewName
        ]);

        return redirect()->route('single.news', ['news' => $news->id]);
    }

    public function edit_news(News $news) {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('dashboard.edit_news_form', ['categories' => $categories, 'news' => $news]);
    }

    public function update_news(News $news, AddAndEditNewsRequest $request) {
        if(!empty($request->new_image)) {
            $imagePath = $request->new_image->path();
            $imageName = $request->new_image->getClientOriginalName();
            $imageNewName = $news->id . '_' . $imageName;
            move_uploaded_file($imagePath, 'uploads/' . $imageName);
            rename('uploads/' . $imageName, 'uploads/' . $imageNewName);
            unlink('images/news_images/' . $news->image);
            copy('uploads/' . $imageNewName, 'images/news_images/' . $imageNewName);
            unlink('uploads/' . $imageNewName);
        } else {
            $imageNewName = $news->image;
        }

        $news->update([
            'name' => $request->name,
            'image' => $imageNewName,
            'category_id' => $request->category_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description
        ]);

        return redirect()->route('single.news', ['news' => $news->id]);
    }

    public function trash() {
        $news = News::orderBy('id', 'DESC')->onlyTrashed()->get();
        return view('dashboard.trash', ['news' => $news, 'flashed_messages' => self::get_flashed_messages()]);
    }

    public function move_to_trash(News $news) {
        $image = $news->image;
        copy('images/news_images/' . $image, 'images/trash_images/' . $image);
        unlink('images/news_images/' . $image);
        $news->delete();
        self::set_flash_message('success', 'خبر شما با موفقیت به سطل زباله منتقل شد.');
        return redirect()->route('trash');
    }

    public function recovery($news) {
        $news = News::onlyTrashed()->find($news);
        $image = $news->image;
        copy('images/trash_images/' . $image, 'images/news_images/' . $image);
        unlink('images/trash_images/' . $image);
        $news->restore();
        self::set_flash_message('success', 'خبر شما با موفقیت بازیابی شد.');
        return redirect()->route('dashboard.news');
    }
}
