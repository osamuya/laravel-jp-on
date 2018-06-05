<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
         return $next($request);
      });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function user()
    {

      /* Password伏せ字 */
      
      return view('home.user')->with("user",$this->user);
    }

    public function user_update()
    {

        return view('home.user_update');
    }
}
