@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h2><i class="fas fa-plus-circle"></i>Crear Articulo</h2>
                    </center>
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form 
                        action="{{ route('posts.store') }}" 
                        method="POST" enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label for="title"class="font-weight-bold">Titulo *:</label>
                            <input type="text" name="title" id="title"class="form-control" placeholder="Titulo" required>
                        </div>

                        <div class="form-group custom-file">
                            <input type="file"class="custom-file-input" name="file" id="file">
                            <label class="custom-file-label"for="file" data-browse="Elige una imagen"><i class="far fa-file-image"></i> Elige una imagen</label>                           
                        </div>
                        
                        <div class="form-group">
                            <label for="body"class="font-weight-bold">Contenido *:</label>
                            <textarea class="form-control" name="body" id="body" rows="5" required></textarea>
                        </div>

                         <div class="form-group">
                            <label for="iframe"class="font-weight-bold">Contenido embebido:</label>
                            <textarea class="form-control" name="iframe" id="iframe"></textarea>
                        </div>

                        <div class="form-group text-center">
                            @csrf
                            <input type="submit" value="Enviar"class="btn btn-outline-primary col-2 btn-lg">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
