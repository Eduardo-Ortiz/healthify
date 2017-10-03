<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginUserController extends Controller
{
    //

    public function login(Request $request)
    {
        $name = $request->get('name');
        $password = $request->get('password');
        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            $user=auth()->user();
            if($user->role_id==3)
            {
                return redirect('/patient');
            }
            else if($user->role_id==1)
            {
                return redirect('/admin');
            }


        }else{
            return Redirect::back()->withErrors("Los datos de acceso no son validos");

        }
    }
}
