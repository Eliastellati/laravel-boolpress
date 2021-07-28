@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$post->title}}</h1>
        <small>{{$post->slug}}</small>
        <div>
            <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
            <a class="btn btn-info" href="{{route('admin.posts.index') }}">Torna all'elenco</a>
        </div>
        <p class="my-3">{{$post->content}}</p>
    </div>
@endsection