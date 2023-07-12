@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">My Categories</h1>
    </div>
    <h2>Category List</h2>

      <div class="table-responsive small col-lg-8 ">
        <a href="/dashboard/categories/create" class="btn btn-primary mb-3 mt-3">Create new Category</a>

        @if(session()->has('success'))
          <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
          </div>
        @endif
        
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col" class="">Category name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
                {{-- yang bagian $post->id ini nanti diganti pake $loop->iteration --}}
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                </form>
            </td>
            </tr>
                
            @endforeach
            
          </tbody>
        </table>
      </div>


@endsection