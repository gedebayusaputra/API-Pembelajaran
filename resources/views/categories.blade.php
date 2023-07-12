@extends('layouts.main')

@section('container')
    <b>Information Categories</b>
    <br><br>

    <div class="container">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4">
                <a href="/information?category={{ $category->slug }}">

                
                <div class="card text-bg-dark mb-4">
                    <img src="https://picsum.photos/seed/picsum/700/500" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex align-items-end p-0">
                      <h5 class="card-title text-center flex-fill p-2 " style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                    </div>
                  </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    
    <a href="/information/">back to Information</a>

@endsection

