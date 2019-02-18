<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Interfaces\SiteControllerInterface;
use App\Product;
use Illuminate\Http\Request;

class SiteController extends Controller implements SiteControllerInterface
{
    public function actionIndex()
    {

        $active = 0;

        $categories = Category::getCategoryList();

        $latest_products = Product::getLatestProducts();

        return view('home_page.index',compact('categories', 'latest_products', 'active'));
    }

    public function actionContact(Request $request)
    {
        // TODO: Implement actionContact() method.
    }
}
