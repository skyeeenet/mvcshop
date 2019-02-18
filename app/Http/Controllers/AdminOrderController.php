<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{

    function __construct()
    {
        $this->middleware('checkRole');
    }

    public function actionIndex() {

        $orderList = Order::getOrderList();

        return view('admin.order.index', compact('orderList'));
    }

    public function actionDelete($id) {

        Order::deleteOrderById($id);

        return redirect('/admin/order');
    }

    public function actionUpdate(Request $request) {

        $order = Order::getOrderById($request->id);

        $id = intval($request->id);

        if ($request->submit) {

            $this->validate($request,[
               'firstName'=>'required',
                'lastName'=>'required',
                'userPhone'=>'required',
                'userComment'=>'required',
                'date'=>'required',
                'status'=>'required'
            ]);

            $params = [
                $id,
            $first_name = $request->firstName,
            $last_name = $request->lastName,
            $phone = $request->userPhone,
            $comment = $request->userComment,
            $date = $request->date,
            $status = $request->status,
            ];

            if(Order::updateOrder($params)){

                return redirect('/admin/order');
            }
        }

        return view('admin.order.update', compact('order', 'id'));

    }

    public function actionView($id) {

        $order = Order::getOrderById($id);

        $productsQuantity = json_decode($order->products, true);

        $productsIds = array_keys($productsQuantity);

        $products = Product::getProductsByIds($productsIds);

        return view('admin.order.view', compact('order', 'products', 'productsQuantity'));
    }
}
