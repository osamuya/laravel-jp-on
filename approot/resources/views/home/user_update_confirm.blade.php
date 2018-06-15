@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ダッシュボード（ユーザーページ）</div>

                <div class="card-body">
                  <div class="mb10">ユーザー情報</div>

                  <form method="POST" action="/home/user_update_store" novalidate="novalidate" class="mb40">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名</label>
                        <div class="col-md-6 mt10">
                            {{$user["name"]}}
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Emailアドレス</label>
                        <div class="col-md-6 mt10">
                            {{$user["email"]}}
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">性別</label>
                        <div class="col-md-6 mt10">
                          {{$user["gender"]}}
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">生年月日</label>
                        <div class="col-md-6 mt10">
                          foobar
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">姓</label>
                        <div class="col-md-6 mt10">
                          foobar
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">名</label>
                        <div class="col-md-6 mt10">
                          foobar
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">フリガナ（姓）</label>
                        <div class="col-md-6 mt10">
                          foobar
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">フリガナ（名）</label>
                        <div class="col-md-6 mt10">
                          foobar
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">電話番号</label>
                        <div class="col-md-6 mt10">
                          foobar
                        </div>
                    </div>

                    <div class="col-md-12 mt10 text-center">
                      <a href="javascript:history.back();" class="btn btn-info" role="button">戻る</a>
                      <input type="submit" class="btn btn-primary" value="ユーザー情報を更新する">
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
