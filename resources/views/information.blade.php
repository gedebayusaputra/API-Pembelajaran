@extends('layouts.main')

@section('container')
    <h1 class="mb-3 mt-5"><b>{{ $title }}</b></h1>

    <div class="row">
        <div class="col-md-6">
            <form action="/information">
                @csrf
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    
                @endif
                @if (request('authors'))
                    <input type="hidden" name="authors" value="{{ request('authors') }}">
                    
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit" >Search</button>
                  </div>
            </form>
        </div>
    </div>

    <a href="/categories" class="text-decoration-none mb-3">
        See Categories
    </a>
    <br><br>

    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
            <div style="max-height: 400px; overflow:hidden;">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt=""  class="card-img-top">

            </div>
                
            @else
                <img src="https://picsum.photos/seed/picsum/1200/400" class="card-img-top" alt="...">
                
            @endif
            <div class="card-body">
                <h3 class="card-title"><a href="/information/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                <p>Category: 
                    <a href="/information?category={{ $posts[0]->category->slug }}" class="text-decoration-none">
                        {{ $posts[0]->category->name }}
                    </a>
                </p>
                
                <p>
                    Author: 
                        <a href="/information?authors={{ $posts[0]->author->username }}" class="text-decoration-none">
                            {{ $posts[0]->author->name }}
                        </a>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/information/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary mb-2">Read more </a>
                <p class="card-text"><small class="text-body-secondary">Last updated {{ $posts[0]->created_at->diffForHumans() }} </small></p>
            </div>
        </div>
   

    
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($posts->skip(1) as $post)
        <div class="col">
          <div class="card">
            <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">
                <a href="/information?category={{ $post->category->slug }}" class="text-decoration-none text-white">
                    {{ $post->category->name }}
                </a>
            </div>
            @if ($post->image)
            <div style="max-height: 400px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" alt=""  class="img-fluid">

            </div>
                
            @else
                <img src="https://picsum.photos/seed/picsum/800/400" class="card-img-top" alt="...">
                
            @endif
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/information/{{ $post->slug }}" class="text-decoration-none text-dark">
                        {{ $post->title }}
                    </a>
                </h5>
                <p>
                    Author: 
                    <a href="/information?authors={{ $post->author->username }}" class="text-decoration-none">
                        {{ $post->author->name }}
                    </a>
                </p>
                <p class="card-text">{{ $post->excerpt }}</p>
                <a href="/information/{{ $post->slug }}" class="text-decoration-none btn btn-primary mb-2">Read more </a>
                <p class="card-text"><small class="text-body-secondary">Last updated {{ $post->created_at->diffForHumans() }} </small></p>
            </div>
          </div>
        </div>
     @endforeach
    </div>
    

     @else
         <p class="text-center fs">No Post Found.</p>
     @endif

     <div class="d-flex justify-content-center p-3">
        
        {{ $posts->links() }}

     </div>

@endsection

