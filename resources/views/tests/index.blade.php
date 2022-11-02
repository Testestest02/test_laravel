@extends('layouts.app')

@section('content')

<!-- 会員一覧表示 -->
@if (count($tests) > 0)
<div class="panel panel-default">
    <p style="text-align:right"><a href="{{ route('tests.create') }}"> 登録〉〉〉</a></p>

    <div class="panel-body">
        <table class="table table-striped task-table" border="1">

            <!-- テーブルヘッダ -->
            <thead>
                <th>会員名</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>&nbsp;</th>
            </thead>
            
            <!-- テーブル本体 -->
            <tbody>
                @foreach ($tests as $test)
                <tr>
                    <!-- 会員名 -->
                    <td class="table-text">
                        <div>{{ $test->user_name }}</div>
                    </td>
                    <!-- 電話番号 -->
                    <td class="table-text">
                        <div>{{ $test->phone_number }}</div>
                    </td>
                    <!-- メースアドレス -->
                    <td class="table-text">
                        <div>{{ $test->email }}</div>
                    </td>
                    <td>
                        <!-- 編集ボタン -->
                        <a href="{{ route('tests.edit', $test->id) }}">
                            <button type="submit" id="edit-test-{{ $test->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>編集
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection