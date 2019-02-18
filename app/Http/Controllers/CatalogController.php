<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    function __construct() {

        session_start();
    }

    //
    public function actionIndex()
    {

        $active = 1;

        $products = Product::getAllProducts();

        $categories = Category::getCategoryList();

        return view('catalog.index', compact('products', 'categories' , 'active'));
    }

    public function actionCategory(Request $request)
    {

        $action = 1;

        if (!$request->id) return false;

        $id = $request->id;

        $categories = Category::getCategoryList();

        $products = Product::getProductsByCategoryId($id);

        $title = Category::getCategoryNameById($id);

        return view('catalog.index', compact('products', 'categories', 'title', 'action'));
    }

}
