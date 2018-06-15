@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">No.{{$user["id"]}} ダッシュボード（ユーザーページ）</div>
                <div class="card-body">
                  <div class="mb10">ユーザー情報</div>

                  <table class="table">
                    <tbody>
                      <tr>
                        <td scope="row">ユーザー名</td>
                        <td>{{$user["name"]}}</td>
                      </tr>
                      <tr>
                        <td scope="row">Emailアドレス</td>
                        <td>{{$user["email"]}}</td>
                      </tr>
                      <tr>
                        <td scope="row">性別</td>
                        <td>{{$user["gender"]}}</td>
                      </tr>
                      <tr>
                        <td scope="row">生年月日</td>
                        <td>{{$user["birth_date"]}}</td>
                      </tr>
                      <tr>
                        <td scope="row">姓名</td>
                        <td>{{$user["family_name"]}} {{$user["given_name"]}}</td>
                      </tr>
                      <tr>
                        <td scope="row">フリガナ</td>
                        <td>{{$user["family_name_kana"]}} {{$user["given_name_kana"]}}</td>
                      </tr>
                      <tr>
                        <td scope="row">電話番号</td>
                        <td>{{$user["tel"]}}</td>
                      </tr>
                      <tr>
                        <td scope="row">ラストログイン</td>
                        <td>{{$user["last_login"]}}</td>
                      </tr>
                      <tr>
                        <td scope="row">登録日</td>
                        <td>{{$user["created_at"]}}</td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="col-md-6 offset-md-4 mt30 mb30">
                    <a href="/home/user_update" class="btn btn-primary active" role="button" aria-pressed="true">ユーザー情報を更新する</a>
                  </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-header">メニュー</div>
            <ul　class="mt30">
              <li><a href="/home">ダッシュボード</a></li>
              <li><a href="/home/user">ユーザー情報</a></li>
            </ul>
          </div>
        </div>
    </div>
</div>
@endsection
