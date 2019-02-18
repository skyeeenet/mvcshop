<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{

    function __construct()
    {
        $this->middleware('checkRole');
    }

    public function actionIndex(Request $request) {

        $users = User::getAllUsers();

        if ($request->search_by_phone) {

            $this->validate($request, ['phone'=>'required']);

            $phone = $request->phone;

            $user = $users->where('phone', $phone)->first();

            return view('admin.search.index', compact('users', 'user'));
        }

        if ($request->change) {

            $this->validate($request, [
               'phone'=>'required',
                'email'=>'required',
                'role'=>'required'
            ]);

            $phone = $request->phone;
            $email = $request->email;
            $role = $request->role;

            User::changeUser($email,$phone,$role);

            return redirect('/admin/search');

        }

        return view('admin.search.index', compact('users'));
    }

}
