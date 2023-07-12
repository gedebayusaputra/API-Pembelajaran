@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Category</h1>
    </div>
    <div class="col-lg-8">
      <a href="/dashboard/categories" class="btn btn-success mb-3"><i class="bi bi-arrow-90deg-up me-1"></i>Back to categories</a>

    <form method="POST" action="/dashboard/categories/{{ $post->slug }}" class="mb-5" >
      @method('put')  
      @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Category Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $post->name)  }}">
          @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Category Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
          @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
    
    {{-- script -> trix-file-accept | bakalan nge prevent user dari upload file secara bebas. --}}
    <script>
      const name = document.querySelector('#name');
      const slug = document.querySelector('#slug');

      name.addEventListener('change',function(){
        fetch('/dashboard/categories/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
      });

      
    </script>
@endsection