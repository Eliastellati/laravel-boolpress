@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Elenco Articoli</h1>
    <a  class="btn btn-primary mb-4" href="{{ route('admin.posts.create') }}">Nuovo Articolo</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Slug</th>
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
                        @if ($item->category)
                            {{ $item->category->name }}
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.posts.show',$item->id) }}">SHOW</a>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('admin.posts.edit', $item->id) }}">EDIT</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.posts.destroy', $item->id) }}" onsubmit="return confirm('Sei sicuro di voler eliminare il post \'{{ $item->title }}\'')" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="DELETE">
                          </form>
                        </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
