<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public static function addNewOrder($first_name, $last_name, $post_number, $city,
                                       $email, $phone, $comment,$payment_method,$totalPrice ,$prodJson) {

        DB::table('users_cart_orders')->insert(
            ['first_name'=> $first_name, 'last_name'=>$last_name, 'post_number'=>$post_number,
                'city'=>$city, 'email'=>$email, 'phone'=>$phone, 'comment'=>$comment,
                'payment_method' => $payment_method,'total'=>$totalPrice , 'products'=>$prodJson]);
        return true;
    }

    public static function getOrderList() {

        return DB::table('users_cart_orders')->get();
    }

    public static function deleteOrderById($id) {

        DB::table('users_cart_orders')->delete($id);

        return true;
    }

    public static function getOrderById($id) {

        return DB::table('users_cart_orders')->where('id', $id)->first();
    }

    public static function updateOrder($params) {

        DB::table('users_cart_orders')->where('id',$params[0])->update([
            'first_name'=>$params[1], 'last_name'=>$params[2], 'phone'=>$params[3],
            'comment'=>$params[4], 'date'=> $params[5], 'status'=>$params[6]
        ]);

        return true;
    }

    public static function makeStatus($status) {

        switch ($status) {

            case    1:
                return 'В обработке';
            break;

            case    2:
                return 'Обработан';
            break;

            case    3:
                return 'Доставляется';
            break;

            case 4:
                return 'Завершен';
            break;
        }
    }
}
