<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/* Add validation rule */
use Validator;
use Illuminate\Validation\Rule;

/* Session */
use Session;

class HomeController extends Controller
{

    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      // $this->middleware('auth');

      $this->middleware(function ($request, $next) {
         $this->user= auth()->user();
         if ($this->user) {
           /* Under login */
           return $next($request);
         } else {
           /* Logout */
           die("logout");
         }
      });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with("name",$this->user["name"]);
    }

    public function user()
    {

        return view('home.user')->with("user",$this->user);
    }

    /**
     * userUpdate() ユーザー情報の更新フォーム
     * @var
     * @para none
     *
     * @return array $user
     */
    public function userUpdate()
    {
        // var_dump($this->user);
        return view('home.user_update')->with("user",$this->user);
    }


    public function userUpdateConfirm(Request $request)
    {
      /* Validation */
      $this->validate($request, [
        'name' => 'required|max:32',
        'email' => 'required|email',
        'gender' => 'in:男,女,TG',
      ]);
      $request->session()->put('name',$request->input('name'));
      $request->session()->put('email',$request->input('email'));
      $request->session()->put('gender',$request->input('gender'));

      $user = [
          "name" => $request->input('name'),
          "email" => $request->input('email'),
          "gender" => $request->input('gender'),
      ];

      return view('home.user_update_confirm')->with("user",$user);
    }









}
