@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Articulos
                    <a href="{{ route('posts.create') }}" class="btn btn-warning float-right"><i class="far fa-plus-square"></i></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-info">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" 
                                        class="btn btn-sm btn-danger" 
                                        value="Eliminar"
                                        onclick="return confirm('Deseas eliminar el articulo?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
