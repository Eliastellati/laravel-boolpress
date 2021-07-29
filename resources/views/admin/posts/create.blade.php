@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Scrivi un nuovo articolo</h1>
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Email address</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Inserisci il titolo">
                @error('title')
                   <small>{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Testo</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci il testo" rows="6">{{ old('content') }}</textarea>
                @error('content')
                   <small>{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a  class="btn btn-secondary ml-2" href="{{ route('admin.posts.index') }}">Torna all'elenco</a>
        </form>
    </div>
@endsection