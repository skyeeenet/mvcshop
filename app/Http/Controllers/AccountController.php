<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    function __construct() {

        $this->middleware('auth');

        session_start();
    }

    public function actionIndex() {

        $user_id = Auth::id();

        $user_phone = DB::table('users')->where('id',$user_id)->first()->phone;

        $history = DB::table('users_cart_orders')->where('phone',$user_phone)->get();

        return view('account.index', compact('history'));
    }
}
