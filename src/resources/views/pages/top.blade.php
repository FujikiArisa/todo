@extends('layouts.layout')
@section('title','ToDoリスト')

@section('content')
<main id="todo-app" class="vh-100 pt-3 bg-light">
    <!-- ========== ユーザー情報 ========== -->
    <div class="d-flex align-items-center gap-2 ms-3">
        <img src="{{ asset('images/icon.png') }}" alt="user icon" class="rounded-circle border border-muted"
            style="aspect-ratio: 1/1; width: 40px;">
        <p class="text-muted my-0">example@email.com</p>
    </div>

    <!-- ========== リスト ========== -->
    <div class="card mt-5 mx-auto" style="max-width: 700px; padding-block: 80px;">
        <!-- 見出し -->
        <h1 class="text-center mb-0">ToDoリスト</h1>

        <todo-list></todo-list>
    </div>
</main>

@vite('resources/js/app.js')
@endsection