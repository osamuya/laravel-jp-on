<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'base_users';

    /**
     * The attributes that are mass assignable.
     * 追加の日本語関連カラムのfillを追加する
     *
     * @var array
     */
    protected $fillable = [
      'name',
      // 'password',
      'email',
      'gender',
      'birth_date',
      'family_name',
      'given_name',
      'family_name_kana',
      'given_name_kana',
      'tel',
      'uniqueid',
      'uniquehash',
      // 'remember_token',
      'description',
      'role',
      'status',
      'last_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
