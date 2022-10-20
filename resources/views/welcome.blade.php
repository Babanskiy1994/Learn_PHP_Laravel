@extends('layout.app')

@section('title', 'Главная страница')

@section('content')
    @include('partials.header')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-10">
        @foreach($posts as $post)
            @include('posts.partials.item', ["post" => $post])
        @endforeach
    </div>
    <div class="px-6">
        <a href="{{route("posts.index")}}" class="text-xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">Посмотреть все посты</a><br>
    </div>
@endsection
