@extends('layouts.app')

@section('content')

<h1>編集</h1>
<p>{{ $page }}</p>

<!-- 会員編集パネル -->
<div class="panel-body">

    <!-- 会員編集フォーム -->
    <form action="{{ route('tests.update', $test->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field()}}

        <div>ID : {{ $test->id }}</div>

        <!-- 会員名 -->
        <div class="form-group">
            <label for="test-name" class="col-sm-3 control-label">氏名</label>
            <div class="col-sm-6">
                <input type="text" name="user_name" value="{{ $test->user_name }}" id="form-name" class="form-control">
            </div>
        </div>
        <!-- 会員電話番号 -->
        <div class="form-group">
            <label for="test-phone" class="col-sm-3 control-label">電話番号</label>
            <div class="col-sm-6">
                <input type="text" name="phone_number" value="{{ $test->phone_number }}" id="form-phone" class="form-control">
            </div>
        </div>
        <!-- 会員メールアドレス -->
        <div class="form-group">
            <label for="test-email" class="col-sm-3 control-label">メースアドレス</label>
            <div class="col-sm-6">
                <input type="text" name="email" value="{{ $test->email }}" id="form-email" class="form-control">
            </div>
        </div>

        <!-- 会員編集ボタン -->
        <button type="submit" id="edit-test-{{ $test->id }}" class="btn btn-danger">
                <i class="fa fa-btn fa-trash"></i>登録
        </button>
    </form>

        <!-- 会員削除ボタン -->
        <form action="{{ route('tests.destroy', $test->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" id="delete-test-{{ $test->id }}" class="btn btn-danger">
                <i class="fa fa-btn fa-trash"></i>削除
            </button>
        </div>
        </form>
</div>
@endsection