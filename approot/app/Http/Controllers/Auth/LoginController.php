<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
/* add */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }

    /* ログイン条件の変更 */
    public function credentials(Request $request)
    {
        /* 通常のメンバーログインはrole + status + delflag */
        $authConditionsOrigin = $request->only($this->username(), 'password');
        $authConditionsCustom = array_merge(
            $authConditionsOrigin,
            ['status' => 2],
            ['deleted_at' => NULL]
        );
        return $authConditionsCustom;
    }

    /**
     * 認証失敗時の日本語化
     */
    protected function sendFailedLoginResponse(Request $request)
    {
      /* Login */
      throw ValidationException::withMessages([
        $this->username() => [trans('認証に失敗しました。')],
      ]);
      /* auth.throttle */

    }









    
}
