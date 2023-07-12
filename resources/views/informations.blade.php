@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            
            <h3 class="mb-3 mt-5">{{ $post->title }}</h3>
            <p class="card-text"><small class="text-body-secondary">Last updated: {{ $post->created_at->format('d-m-Y | H:i:s') }} </small></p>
            <p>Category: 
                <a href="/information?category={{ $post->category->slug }}" class="text-decoration-none">
                    {{ $post->category->name }}
                </a>
            </p>
            <p>
                Author: 
                <a href="/information?authors={{ $post->author->username }}" class="text-decoration-none">
                    {{ $post->author->name }}
                </a>
            </p>
            @if ($post->image)
            <div style="max-height: 400px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" alt=""  class="img-fluid">

            </div>
                
                
            @else
                <img src="https://picsum.photos/seed/picsum/700/400" alt="" class="img-fluid">
                
            @endif
            <article class="my-3 fs-6">
                {!! $post->body !!} 
                    
            </article>
            <a href="/information">Back to Information</a>
        </div>
    </div>
</div>


@endsection