@extends('layouts.app')
@inject('helper', 'App\Helpers\Helper')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ダッシュボード（ユーザーページ）</div>

                <div class="card-body">
                  <div class="mb10">ユーザー情報</div>

                  <form method="POST" action="/home/user_update_confirm" novalidate="novalidate" class="mb40">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名*</label>
                        <div class="col-md-6">

                            <input id="name" type="text" class="form-control" name="name" value="@if (!empty(old('name'))) {{old('name')}} @else {{$user['name']}} @endif">
                            <p class="validationsError">{{$errors->first('name')}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">Emailアドレス*</label>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="@if (!empty(old('email'))) {{old('email')}} @else {{$user['email']}} @endif">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>
                        <div class="col-md-6 mt10">
                          {{old('gender')}}
                            <input type="radio" name="gender" value="男" @if (old('gender')=='男' ) checked @endif>:男　
                            <input type="radio" name="gender" value="女" @if (old('gender')=='女' ) checked @endif>:女　
                            <input type="radio" name="gender" value="TG" @if (old('gender')=='TG' ) checked @endif>:TG　
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">生年月日</label>

                        <div class="col-sm-4 col-md-2">
                          <select class="form-control selectpicker" id="birth_year" name="birth_year">
                              <optgroup>
                              <option value="" style="display: none;">年</option>
                                  @foreach($helper->selectYears() as $key=>$val)
                                  <option value="{{$val}}"
                                          @if(old('birth_year') == $val) selected @endif
                                      >{{$val}}</option>
                                  @endforeach
                              </optgroup>
                          </select>
                        </div>

                        <div class="col-sm-4 col-md-2">
                          <select class="form-control selectpicker" id="birth_month" name="birth_month">
                              <optgroup>
                              <option value="" style="display: none;">月</option>
                                  @foreach($helper->selectMonth() as $key=>$val)
                                  <option value="{{$val}}"
                                          @if(old('birth_month') == $val) selected @endif
                                      >{{$val}}</option>
                                  @endforeach
                              </optgroup>
                          </select>
                        </div>

                        <div class="col-sm-4 col-md-2">
                          <select class="form-control selectpicker" id="birth_day" name="birth_day">
                              <optgroup>
                              <option value="" style="display: none;">日</option>
                                  @foreach($helper->selectDay() as $key=>$val)
                                  <option value="{{$val}}"
                                          @if(old('birth_day') == $val) selected @endif
                                      >{{$val}}</option>
                                  @endforeach
                              </optgroup>
                          </select>
                        </div>

                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">姓</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="family_name" value="{{$user['family_name']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">名</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="given_name" value="{{$user['given_name']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">フリガナ（姓）</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="family_name_kana" value="{{$user['family_name_kana']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">フリガナ（名）</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="given_name_kana" value="{{$user['given_name_kana']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">電話番号</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="tel" value="{{$user['tel']}}">
                        </div>
                    </div>
                    <div class="form-group row mb-0 mt40 center-block">
                        <div class="col-md-6 offset-md-4 ">
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
