@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Elenco Articoli</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>titolo</th>
                <th>slug</th>
                <th colspan='3'>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.posts.show',$item->id) }}">SHOW</a>
                    </td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection