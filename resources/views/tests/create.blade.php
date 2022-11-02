@extends('layouts.app')

@section('content')

<h1>新規作成</h1>
<p>{{ $page }}</p>

<!-- エラーナッシング -->
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
    <!-- 会員登録フォーム -->
    <form action="{{ route('tests.store') }}" method="POST" >
    {{ csrf_field()}}

        <!-- 会員名 -->
        <div class="form-group">
            <label for="test-name" class="col-sm-3 control-label">氏名</label>
            <div class="col-sm-6">
                <input type="text" name="user_name" id="form-name" class="form-control">
            </div>
        </div>
        <!-- 会員電話番号 -->
        <div class="form-group">
            <label for="test-phone" class="col-sm-3 control-label">電話番号</label>
            <div class="col-sm-6">
                <input type="text" name="phone_number" id="form-phone" class="form-control">
            </div>
        </div>
        <!-- 会員メールアドレス -->
        <div class="form-group">
            <label for="test-email" class="col-sm-3 control-label">メースアドレス</label>
            <div class="col-sm-6">
                <input type="text" name="email" id="form-email" class="form-control">
            </div>
        </div>

    <button type="submit">登録</button>

</form>
@endsection