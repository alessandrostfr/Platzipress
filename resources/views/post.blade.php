@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            {{ $post->body }}
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
        </div>
    </div>
</div>
@endsection
