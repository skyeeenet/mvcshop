<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    function __construct() {

        session_start();
    }

    //
    function actionIndex(Request $request)
    {

        $active = 2;

        if ($request->route('id')) {

            $id = $request->id;

            $product = Product::getProductById($id);

            $categories = Category::getCategoryList();

            $comments = Product::getCommentsById($id);

            $relatedProducts = Product::getRelatedProducts();

            $newProducts = Product::getNewProducts();

            if ($request->submit) {

                $this->validate($request,[
                    'name'=>'required|max:15',
                    'email'=>'required|max:30|min:5',
                    'review'=>'required|max:100|min:10'
                ]);

                $email = $request->email;

                $name = $request->name;

                $comment = $request->review;

                Product::addCommentToPropductViaId($id, $email, $name, $comment);

                return redirect('/product/'.$id);
            }

            if (Auth::check()) {

                $user = Auth::user();

                return view('single_product.index', compact('product', 'categories', 'active', 'user', 'comments', 'relatedProducts'
                ,'newProducts'));
            }

            return view('single_product.index', compact('product', 'categories', 'active', 'comments', 'relatedProducts',
                'newProducts'));
        }
    }

    public function actionSearch(Request $request) {

        $productName = $request->productName;

        if (!empty($productName)) {

            $products = Product::getProductBySearch($productName);

            $title = 'Результаты поиска';

            return view('search.index', compact('products', 'title'));
        } else {

            return redirect('/');
        }


    }
}
