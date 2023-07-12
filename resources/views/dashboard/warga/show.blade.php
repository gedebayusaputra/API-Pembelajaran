@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row  my-4">
        <div class="col-lg-8">
            
            


            <h3 class="mb-3">{{ $post->nama }}</h3>

            <a href="/dashboard/database-warga" class="btn btn-success"><i class="bi bi-arrow-90deg-up me-1"></i>Back to database-warga</a>
            <a href="/dashboard/database-warga/{{ $post->otoken }}/edit" class="btn btn-warning"><i class="bi bi-pencil-fill me-1"></i>Edit</a>
            
            <form action="/dashboard/database-warga/{{ $post->otoken }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn bg-danger " style="color: white" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill me-1"></i>Delete</button>
            </form>

            <p class="card-text mt-3"><small class="text-body-secondary">Last updated: {{ $post->updated_at->format('d-m-Y | H:i:s') }} </small></p>
            
            <table class="table table-bordered table-striped-columns">
                <thead>
                  <tr >
                    <th scope="col">Nama Lengkap</th>
                    <td >{{ $post->nama }}</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">NIK</th>
                    <td>{{ $post->nik }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Jenis Kelamin</th>
                    <td>{{ $post->jk }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Tempat Lahir</th>
                    <td >{{ $post->tempat_lahir }}</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Tanggal Lahir</th>
                    <td >{{ \Carbon\Carbon::parse($post->tanggal_lahir)->format('d-m-Y') }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Agama</th>
                    <td >{{ $post->agama }}</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Pendidikan</th>
                    <td >{{ $post->pendidikan }}</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Jenis Pekerjaan</th>
                    <td >{{ $post->jenis_pekerjaan }}</td>
                    
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection