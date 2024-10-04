@extends('layouts.layout')
@section('title','ログイン')

@section('content')
<main class="vh-100 bg-light" style="padding-top: 100px;">
    <div class="card mx-auto" style="max-width: 500px; padding-block: 80px;">
        <!-- ========== 見出し ========== -->
        <h1 class="text-center mb-0">ログイン</h1>
        <!-- ========== 入力フォーム ========== -->
        <form action="{{ route('submit') }}" method="post" class="w-75 mx-auto mt-5">
            @csrf
            <!-- メールアドレス -->
            <input type="email" name="email" placeholder="メールアドレスを入力" class="form-control bg-body-secondary">

            <!-- パスワード -->
            <input type="password" name="password" placeholder="パスワードを入力"
                class="form-control bg-body-secondary mt-4">

            <!-- ログインボタン -->
            <button type="submit" class="d-block btn btn-primary mt-5 mx-auto py-2 px-4">ログイン</button>
        </form>
    </div>
</main>
@endsection