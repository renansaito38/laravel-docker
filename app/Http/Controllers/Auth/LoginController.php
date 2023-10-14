<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        return view('login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('web')->attempt($credentials)) {
            dd($credentials);
            return redirect()->intended('dashboard')
                        ->withSuccess('Você esta logado');
        }
  
        return redirect("login")->withSuccess('Credenciais Invalidas');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
