@extends('layouts.app')

@section('content')
        <div class="center jumbotron">
            <div class="text-center">
                <h1>タスクを確認しよう</h1>
                {!! link_to_route('login', 'ログインする', [], ['class' => 'btn btn-lg btn-outline-secondary']) !!}
                {!! link_to_route('signup.get', '登録はこちら', [], ['class' => 'btn btn-lg btn-outline-secondary']) !!}
            </div>
        </div>
@endsection