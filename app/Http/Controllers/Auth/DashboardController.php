<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
  public function index(): View
  {
    if(Auth::check()){
      return view('dashboard');
  }

  return redirect("login")->withSuccess('Você não tem permissão para acessar');
  }
}
