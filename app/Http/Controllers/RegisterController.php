<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class RegisterController extends Controller
{

    public function store(Request $request)
    {
        $user=new User();
        $user->formstore($request);
        return redirect('login');
    }

    public function login(RegisterRequest $request)
    {
      if(Auth::attempt(['email'=>$request->email ,'password'=>$request->password])){
        return redirect()->intended('books');
      }
      return redirect()->back()->with('message', 'Invalid email or password .!');
    }

    public function logout()
    {
      Auth::logout();
      return redirect('login');
    }

}
