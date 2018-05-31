<?php

namespace App\Helpers;

class Helper
{
    /**
     * XXXする関数
     *
     * @param string $value
     * @return string
     */
    public static function xxx($value)
    {
        // 処理
        return $value;
    }

    /**
     * ユニークIDを作成
     *
     *
     *
     */
    public static function makeUniqueId($prefix="")
    {
      $uniqueid = uniqid($prefix.mt_rand(111,999)."-");
      return $uniqueid;
    }

    /**
     * ユニークIDを作成
     *
     *
     *
     */
     public static function makeUniqueHash()
     {
       $add_string = mt_rand(1111,9999);
       $uniqehash = hash_hmac(
         'ripemd256',
         env("APP_KEY"),
         $add_string
       );

       return $uniqehash;
     }

}
