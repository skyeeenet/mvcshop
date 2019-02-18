<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    function __construct()
    {

        session_start();
    }

    public function actionIndex(Request $request) {


        if (isset($request->submit)) {

            return redirect('/checkout');
        }

        $active = 3;

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {

            $productsIds = array_keys($productsInCart);

            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);

            return view('cart.index', compact('productsInCart', 'totalPrice', 'products', 'categories', 'active'));
        } else {

            return view('checkout.error');
        }


    }

    public function actionAdd($id) {

        Cart::addProduct($id);

        return redirect('/cart');
    }

    public function actionDeduct($id) {

        Cart::deductProduct($id);

        return redirect('/cart');
    }

    public function actionAddAjax(Request $request) {

        $id = $request->id;

        Cart::addProduct($id);

        return Cart::countItems();
    }

    public function actionRemove(Request $request) {

        $id = intval($request->id);

        Cart::deleteProductById($id);

        return redirect('/cart');
    }
}
