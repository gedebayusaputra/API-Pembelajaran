@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Database Warga</h1>
    </div>

      <div class="table-responsive small  ">
        <div class="d-grid  col-2 ">
          <a href="/dashboard/database-warga/create" class="btn btn-primary mb-3 mt-3">Create data warga</a>

        </div>
        @if(session()->has('success'))
          <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
          </div>
        @endif
        

          <div class="row justify-content-end">
            <div class="col-md-5 me-5">
              <form action="/dashboard/database-warga">
                <div class="input-group mb-4 ">
                  @csrf

                  

                  <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}" >
                  <button class="btn btn-primary"  type="submit" ><i class="bi bi-search"></i></button>
                  <button class="btn  btn-danger" type="button" onclick="location.href='{{ route('database-warga.index') }}'" ><i class="bi bi-x-circle"></i></button>
                </div>
              </form>
            </div>
          </div>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>

              <th scope="col" class="w-25">Nama Lengkap<a href="{{ route('database-warga.index', ['sort' => 'nama', 'order' => $sort === 'nama' && $order === 'asc' ? 'desc' : 'asc']) }}" class="" style="color: black;">
                <i class="{{ $sort === 'nama' && $order === 'asc' ? 'bi bi-sort-alpha-down' : 'bi bi-sort-alpha-up' }}"></i></a></th>
                
              <th scope="col">NIK <a href="{{ route('database-warga.index', ['sort' => 'nik', 'order' => $sort === 'nik' && $order === 'asc' ? 'desc' : 'asc']) }}" class="" style="color: black;">
                <i class="{{ $sort === 'nik' && $order === 'asc' ? 'bi bi-sort-alpha-down' : 'bi bi-sort-alpha-up' }}"></i></a></th>

              <th scope="col">Jenis Kelamin <a href="{{ route('database-warga.index', ['sort' => 'jk', 'order' => $sort === 'jk' && $order === 'asc' ? 'desc' : 'asc']) }}" class="" style="color: black;">
                <i class="{{ $sort === 'jk' && $order === 'asc' ? 'bi bi-sort-alpha-down' : 'bi bi-sort-alpha-up' }}"></i></a></th>
          
              <th scope="col">Created At<a href="{{ route('database-warga.index', ['sort' => 'created_at', 'order' => $sort === 'created_at' && $order === 'asc' ? 'desc' : 'asc']) }}" class="" style="color: black;">
                <i class="{{ $sort === 'created_at' && $order === 'asc' ? 'bi bi-sort-alpha-down' : 'bi bi-sort-alpha-up' }}"></i></a></th>
              
              <th scope="col">Updated At<a href="{{ route('database-warga.index', ['sort' => 'updated_at', 'order' => $sort === 'updated_at' && $order === 'asc' ? 'desc' : 'asc']) }}" class="" style="color: black;">
              <i class="{{ $sort === 'updated_at' && $order === 'asc' ? 'bi bi-sort-alpha-down' : 'bi bi-sort-alpha-up' }}"></i></a></th>
              
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            @php
             $iteration = ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration;
            @endphp
            <tr>
              <td>{{ $iteration }}</td>
              <td>{{ $post->nama }}</td>
              <td>{{ Str::of($post->nik)->mask('*',6)}}</td>
              <td>{{ $post->jk }}</td>  
              <td>{{ $post->created_at->format('d-m-Y | h:i:s') }}</td>
              <td>{{ $post->updated_at->format('d-m-Y | h:i:s') }}</td>
              <td>
                <a href="/dashboard/database-warga/{{ $post->otoken }}" class="badge bg-info"><i class="bi bi-search "></i></a>
                <a href="/dashboard/database-warga/{{ $post->otoken }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                <form action="/dashboard/database-warga/{{ $post->otoken }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                </form>
            </td>
            </tr>
                
            @endforeach
            
          </tbody>
        </table>
        <div class="d-flex justify-content-center p-3">
        
          {{ $posts->links() }}
  
       </div>
      </div>


@endsection