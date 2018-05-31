@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー登録</div>

                <div class="card-body">
                  <p class="text-center">以下の内容で登録します。よろしいですか？</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="/register/store" novalidate="novalidate">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名</label>
                            <div class="col-md-6">
                                <div class="regster-confirm-user">{{ $regist_data["name"] }}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Eメールアドレス</label>
                            <div class="col-md-6">
                                <div class="regster-confirm-email">{{ $regist_data["email"] }}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <div class="regster-confirm-password">{{ $regist_data["password"] }}</div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    登録情報を確認する
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
