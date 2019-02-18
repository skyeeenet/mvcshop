<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Order;

class CheckOutController extends Controller
{
    function __construct() {

        $this->middleware('auth');

        session_start();

        app()->setLocale('ru');
    }

    public function actionIndex(Request $request) {

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {

            $productsIds = array_keys($productsInCart);

            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        } else {

            return view('checkout.error');
        }

        if ($request->submit) {

            $this->validate($request, [

                'billing_first_name' => 'required|max:20|min:2',
                'billing_last_name' => 'required|max:30|min:2',
                'billing_post_number' => 'required|max:6',
                'billing_city' => 'required|max:30',
                'billing_email' => 'required|email|max:30|min:5',
                'billing_phone' => 'required|alpha_num|min:10|max:14',
                'billing_comment' => 'max:100',
                'payment_method' => 'required'
            ]);

            $first_name = $request->billing_first_name;

            $last_name = $request->billing_last_name;

            $post_number = $request->billing_post_number;

            $city = $request->billing_city;

            $email = $request->billing_email;

            $phone = $request->billing_phone;

            $comment = $request->billing_comment;

            $products_in_cart = Cart::getProducts();

            $prodJson = json_encode($products_in_cart, JSON_UNESCAPED_UNICODE);

            $payment_method = $request->payment_method;

            if(Order::addNewOrder($first_name, $last_name, $post_number, $city, $email,
                $phone, $comment,$payment_method, $totalPrice ,$prodJson)) {

                Cart::clear();

                return view('checkout.success');
            }
        }

        return view('checkout.index', compact('productsInCart', 'products', 'totalPrice'));
    }
}
