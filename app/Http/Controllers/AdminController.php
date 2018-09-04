<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function register(){

        $insert             =   new Admin();

        $insert->username      =   "admin";
        $insert->password   =   Hash::make('greenergy');
        $insert->save();

        return redirect('/admin/login');

    }


    public function login_form(){

        if (Auth::guard('admin')->viaRemember() || Auth::guard('admin')->check()){


            return redirect('/admin');

        }else {

            return view('backend.login.login');

        }

    }

    public function login(Requests\AdminLogin $request){

        $username       =   Input::get('username');
        $password       =   Input::get('password');


        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password],true)) {
//            dd(auth('admin')->user()); // what is this?
            return redirect('/admin');

        }else{


            return redirect('/admin/login')->with('fail','Invalid username or password.');
        }
    }


    public function logout(){


        if(Auth::guard('admin')->check()){

            Auth::guard('admin')->logout();

            return redirect('/admin/login');

        }else{


            return redirect('/');

        }



    }




}
