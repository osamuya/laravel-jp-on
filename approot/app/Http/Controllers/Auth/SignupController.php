<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

/* Hepler service provider */
use Helper;

class SignupController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**=============================================
   * メンバー登録の確認画面
   *
   *
   *
   */
  public function registerConfirm(Request $request)
  {

    /* Validation */
    $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:base_users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    /* Request data */
    $regist_data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ];

    /* Session flash keep */
    $request->session()->flash("name", $request->input('name'));
    $request->session()->flash("email", $request->input('email'));
    $request->session()->flash("password", $request->input('password'));

    /* Reload prevention request and session */
    $request->session()->flash('new_regist_store_flag',true);

    // $value = Helper::xxx('Hello world!!');
    // var_dump($value);

    return view("auth.confirm")->with("regist_data", $regist_data);
  }

  /**=============================================
   * メンバー登録完了
   *
   * メンバー情報の仮登録
   *
   */
  public function registerStore(Request $request)
  {

    // $re = RegisterHelper::xxx('Hello world!!');
    // var_dump($re);
    /* Session flash keep */
    $request->session()->get("name");
    $request->session()->get("email");
    $request->session()->get("password");

    \Debugbar::info($request->session()->get("name"));
    \Debugbar::info($request->session()->get("email"));
    \Debugbar::info($request->session()->get("password"));



    return view("auth.store");
  }

}
