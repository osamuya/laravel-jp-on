@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  ダッシュボード（ユーザーページ）
                </div>

                <div class="card-body">
                  <div class="alert alert-success" role="alert">
                    <div>ようこそ! {{$name}}</div>
                    <div>日付: {{ date('Y年m月d日　H時i分s秒', time()) }}</div>
                  </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-header">メニュー</div>
            <ul　class="mt30">
              <li><a href="#">dummy</a></li>
            </ul>
          </div>
        </div>
    </div>
</div>
@endsection
