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








}
