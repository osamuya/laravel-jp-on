<?php

namespace App\Helpers;

/* Datetime package "Carbon" for laravel */
use Carbon\Carbon;
/* For custom logger */
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Support\Facades\Log;



class Helper
{
    /**
     * XXXする関数
     *
     * @param string $value
     * @return string
     */
    public static function helloHelper()
    {
      return "Hello helper!";
    }

    /**
     * ユニークIDを作成
     * (例）PREFIX602-5b1510747bfeb
     * これは本当にユニバーサルユニークなのか疑問
     * @param string $prefix
     * @return string
     *
     */
    public static function makeUniqueId($prefix="")
    {
      $uniqueid = uniqid($prefix.mt_rand(111,999)."-");
      return $uniqueid;
    }

    /**
     * ユニークハッシュを作成
     * (例）9a27488d86d8bf40c4661fc22356329be7fa15c55b300d916dc1db7efe9e24ea
     * これはかなりユニークになる筈
     * @param none
     * @return string
     *
     */
     public static function makeUniqueHash()
     {
       $dt = Carbon::now();
       $add_string = mt_rand(1111,9999).$dt->format('Ymdhis').$dt->micro;;
       $uniqehash = hash_hmac(
         'ripemd256',
         env("APP_KEY"),
         $add_string
       );
       return $uniqehash;
     }

     /**
      * Select(プルダウン)の西暦生成
      * selectYears()
      *
      * @return array
      */
     public static function selectYears($start_year=NULL, $end_year=NULL, $term=100) {

       if ($end_year == NULL) {
          $end_year = Carbon::today()->format('Y');
       }
       if ($start_year == NULL) {
          $start_year = Carbon::today()->subYear($term)->format('Y');
       }

        $years = [];
        for ( $i = intval($start_year); $i < $start_year + $term; $i++) {
          array_push($years,$i);
        }
        return $years;
     }

     /**
      * Select(プルダウン)の月
      * selectMonth()
      *
      * @return array
      */
     public static function selectMonth() {

        $month = [];
        for ( $i = 1; $i <= 12; $i++) {
          array_push($month,$i);
        }
        return $month;
     }

     /**
      * Select(プルダウン)の月
      * selectMonth()
      *
      * @return array
      */
     public static function selectDay() {

        $day = [];
        for ( $i = 1; $i <= 31; $i++) {
          array_push($day,$i);
        }
        return $day;
     }
}
