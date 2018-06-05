@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ダッシュボード（ユーザーページ）</div>

                <div class="card-body">
                  <div class="mb10">ユーザー情報</div>

                  <form method="POST" action="/home/user_update_confirm" novalidate="novalidate" class="mb40">
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">パスワード</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Emailアドレス</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">性別</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">生年月日</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">姓名</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">フリガナ</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">電話番号</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row mb-0 mt40">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                ユーザー情報を更新する
                            </button>
                        </div>
                    </div>

                  </form>
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
