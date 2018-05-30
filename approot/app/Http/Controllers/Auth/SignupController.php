<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class SignupController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest');
  }

  public function registerConfirm(Request $request)
  {


    return view("auth.confirm");
  }

  public function registerStore()
  {

    return view("auth.store");
  }

}
