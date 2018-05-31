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
/* Datetime package "Carbon" for laravel */
use Carbon\Carbon;
/* Mail */
use Mail;
use App\Mail\BaseMail;

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
    $request->session()->put("name", $request->input('name'));
    $request->session()->put("email", $request->input('email'));
    $request->session()->put("password", $request->input('password'));

    /* Reload prevention request and session */
    $request->session()->flash('new_regist_store_flag',true);

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

    /*---------------------------------------
     * Save parameter
     *
     * - name
     * - email
     * - password
     */

    /* Session flash keep */
    $request->session()->get("name");
    $request->session()->get("email");
    $request->session()->get("password");

    /* make unique id (like SMG-5b0f7937e71de) */
    $uniqueid = Helper::makeUniqueId("SMG");

    /* hash for Email auth (HMAC) */
    $uniqehash = Helper::makeUniqueHash();

    /* crypt password */
    $passwordhash = bcrypt($request->session()->get("password"));

    /*------------------------------------------------
     * Debuger
     */
    \Debugbar::info($request->session()->get("name"));
    \Debugbar::info($request->session()->get("email"));
    \Debugbar::info($request->session()->get("password"));
    \Debugbar::info($passwordhash);
    \Debugbar::info($uniqueid);

    /*------------------------------------------------
     * save data
     */
    $regist_data = [
      'name' => $request->session()->get("name"),
      'password' => $passwordhash,
      'email' => $request->session()->get("email"),
      'uniqueid' => $uniqueid,
      'uniquehash' => $uniqehash,
      'role' => 1,
      'status' => 1,
      'deleted_at' => NULL,
    ];
    $this->create($regist_data);

    /* access uri */
    $access_uri = env("APP_URL")."/mail_authenticate_user/".$uniqehash;

    /*------------------------------------------
     * Sendmail Section
     */
     /* parameter */
    $mail_to = $request->session()->get("email");
    $options = [
        'from' => env("MAIL_FROM_ADDRESS"),
        'from_jp' => '仮登録完了のお知らせです',
        'to' => $mail_to,
        'subject' => '仮登録完了のお知らせ',
        'template' => 'mails.regist',
        "bcc" => env("ADMIN_MAILADDRESS"),
    ];
    $dt = Carbon::now();
    $registed_date = $dt->format('Y年m月d日 h:i:s');

    /* mail template value */
    $sndData = [
        "name" => $request->session()->get("name"),
        "email" => $request->session()->get("email"),
        "password" => "",
        "datetime" => $registed_date,
        "accessURL" => $access_uri,
    ];

    /* sendmail */
    Mail::to($mail_to)->send(new BaseMail($options, $sndData));

    return view("auth.store");
  }


  protected function create(array $regist_data)
  {
      return User::create([
        // 'id' => $regist_data['id'],
        'name' => $regist_data['name'],
        'password' => $regist_data['password'],
        'email' => $regist_data['email'],
        // 'gender' => $regist_data['gender'],
        // 'birth_date' => $regist_data['birth_date'],
        // 'family_name' => $regist_data['family_name'],
        // 'given_name' => $regist_data['given_name'],
        // 'family_name_kana' => $regist_data['family_name_kana'],
        // 'given_name_kana' => $regist_data['given_name_kana'],
        // 'tel' => $regist_data['tel'],
        'uniqueid' => $regist_data['uniqueid'],
        'uniquehash' => $regist_data['uniquehash'],
        // 'remember_token' => $regist_data['remember_token'],
        // 'description' => $regist_data['description'],
        'role' => 1,
        'status' => 1,
        // 'last_login' => $regist_data['last_login'],
        'deleted_at' => $regist_data['deleted_at'],
        // 'created_at' => $regist_data['created_at'],
        // 'updated_at' => $regist_data['updated_at'],
      ]);
  }


  /**=============================================
   * メール認証
   *
   * accesshash
   * date
   * status
   */
  protected function mailAuthenticate($accesshash) {



    return $accesshash;
  }



}
