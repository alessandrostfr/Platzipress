@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body" >
                        @if ($post->image)
                            <div class="embed-responsive embed-responsive-21by9">
                                <img  class="card-img-top embed-responsive-item" 
                                src="{{url('storage/'. old('image', $post->image))}}" 
                                alt="imagen" 
                                style="object-fit: cover; border-radius: 20px;">
                            </div>
                        @elseif($post->iframe)
                            <div class="embed-responsive embed-responsive-21by9" style="border-radius: 20px;">
                                {!! $post->iframe !!}
                            </div>
                        @endif
                        <br>
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            {{ $post->body }}
                        </p>
                        
                    </div>
                    <div class="card-footer">
                        <p class="text-muted mb-0 float-left" style="padding-top: 20px;">
                            <small>
                                <em>
                                    &ndash; {{ $post->user->name }}
                                </em>
                                {{ $post->created_at->format('d M Y') }}
                            </small>
                        </p>
                        <p class="text-muted mb-0 float-right" >
                            <a href="" class="btn btn-danger"><i class="fas fa-thumbs-up"></i></a>
                            <a href="" class="btn btn-info"><i class="far fa-comments"></i></a>
                        </p>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
