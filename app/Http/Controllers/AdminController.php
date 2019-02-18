<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkRole');
    }

    public function actionIndex() {

        return view('admin.index');
    }

    public function actionCategory() {

        $categories = Category::getCategoryList();

        return view('admin.category.category_index', compact('categories'));
    }

    public function actionCategoryCreate(Request $request) {

        if ($request->submit) {

            $name = $request->name;

            $sort = $request->sort_order;

            $status = $request->status;

            Category::createNewCategory($name, $sort, $status);

            return redirect('/admin/category');
        }

        return view('admin.category.category_create');
    }

    public function actionCategoryDelete(Request $request) {

        $id = $request->id;

        $post = $request->submit;

        if ($post) {

            Category::deleteCategoryById($id);

            return redirect('/admin/category');
        }

        return view('admin.category.category_delete', compact('id'));
    }

    public function actionCategoryUpdate(Request $request) {


    }
}
