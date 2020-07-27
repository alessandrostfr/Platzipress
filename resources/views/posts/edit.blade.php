@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h2><i class="fas fa-edit"></i>Editar Articulo</h2>
                    </center>
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form 
                        action="{{ route('posts.update', $post->id) }}" 
                        method="POST" enctype="multipart/form-data"
                    >
                        @method('PUT')
                        <div class="form-group">
                            <label for="title"class="font-weight-bold">Titulo *:</label>
                            <input type="text" name="title" id="title"class="form-control" placeholder="Titulo" required value="{{ old('title', $post->title) }}">
                        </div>

                        <div class="form-group">
                            <img src="{{url('storage/'. old('image', $post->image))}}" style="width: 25%;" class="rounded" alt="imagen">
                        </div>

                        <div class="form-group custom-file">
                            <input type="file"class="custom-file-input" name="file" id="file">
                            <label class="custom-file-label"for="file" data-browse="Elige una imagen"><i class="far fa-file-image"></i> Elige una imagen</label>                           
                        </div>
                        
                        <div class="form-group">
                            <label for="body"class="font-weight-bold">Contenido *:</label>
                            <textarea class="form-control" name="body" id="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
                        </div>

                         <div class="form-group">
                            <label for="iframe"class="font-weight-bold">Contenido embebido:</label>
                            <textarea class="form-control" name="iframe" id="iframe">{{ old('iframe', $post->iframe) }}</textarea>
                        </div>

                        <div class="form-group text-center">
                            @csrf
                            <input type="submit" value="Actualizar" class="btn btn-outline-primary col-2 btn-lg">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
