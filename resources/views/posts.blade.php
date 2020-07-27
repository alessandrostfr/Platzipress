@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach ($posts as $post)
                <div class="card" style="margin: 2%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            {{ $post->get_excerpt }}
                            <a href="{{  route('post', $post) }}">Leer mas...</a>
                        </p>
                        <p class="text-muted mb-0 float-right" >
                            <small>
                                <em>
                                    &ndash; {{ $post->user->name }}
                                </em>
                                {{ $post->created_at->format('d M Y') }}
                            </small>
                            
                        </p>
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
