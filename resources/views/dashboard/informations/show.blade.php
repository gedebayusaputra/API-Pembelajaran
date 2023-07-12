@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row  my-4">
        <div class="col-lg-8">
            
            <h3 class="mb-3">{{ $post->title }}</h3>

            <a href="/dashboard/informations" class="btn btn-success"><i class="bi bi-arrow-90deg-up me-1"></i>Back to informations</a>
            <a href="/dashboard/informations/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-fill me-1"></i>Edit</a>

            <form action="/dashboard/informations/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn bg-danger " style="color: white" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill me-1"></i>Delete</button>
            </form>

            <p class="card-text mt-3"><small class="text-body-secondary">Last updated: {{ $post->updated_at->format('d-m-Y | H:i:s') }} </small></p>
            <p class="mt-2">Category: 
                <a href="/information?category={{ $post->category->slug }}" class="text-decoration-none ">
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
        </div>
    </div>
</div>


@endsection