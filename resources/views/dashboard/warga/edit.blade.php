@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit data warga</h1>
    </div>
    <div class="col-lg-8">
      <a href="/dashboard/database-warga" class="btn btn-success mb-3"><i class="bi bi-arrow-90deg-up me-1"></i>Back to Database-Warga</a>

    <form method="POST" action="/dashboard/database-warga/{{ $post->otoken }}" class="mb-5" >
        @method('put')
        @csrf
        <div class="mb-3 mt-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama',$post->nama) }}" placeholder="Ex: Budi Setiawati">
          @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
       
        <div class="mb-3">
          <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
          <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required value="{{ old('nik', $post->nik) }}" >
          @error('nik')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        
        <div class="mb-3">
          <label for="jk" class="form-label">Jenis Kelamin</label>
          <select class="form-select" name="jk">
              <option value="Laki-Laki" {{ (old('jk', $post->jk) === 'Laki-Laki' ? "selected" : '' ) }}>Laki-Laki</option>
              <option value="Perempuan" {{ (old('jk', $post->jk) === 'Perempuan' ? "selected" : '' ) }}>Perempuan</option>
                
          </select>
        </div>

        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" required  placeholder="Jakarta" value="{{ old('tempat_lahir',$post->tempat_lahir) }}">
            @error('tempat_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required value="{{ old('tanggal_lahir', $post->tanggal_lahir) }}">
            @error('tanggal_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select class="form-select" name="agama">
                <option value="Islam" {{ (old('agama', $post->agama) === 'Islam' ? "selected" : '' ) }}>Islam</option>
                <option value="Kristen" {{ (old('agama', $post->agama) === 'Kristen' ? "selected" : '' ) }}>Kristen</option>
                <option value="Katolik" {{ (old('agama', $post->agama) === 'Katolik' ? "selected" : '' ) }}>Katolik</option>
                <option value="Buddha" {{ (old('agama', $post->agama) === 'Buddha' ? "selected" : '' ) }}>Buddha</option>
                <option value="Hindu" {{ (old('agama', $post->agama) === 'Hindu' ? "selected" : '' ) }}>Hindu</option>
                <option value="Konghucu" {{ (old('agama', $post->agama) === 'Konghucu' ? "selected" : '' ) }}>Konghucu</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <select class="form-select" name="pendidikan">
                <option value="Tamat SD" {{ (old('pendidikan',$post->pendidikan) === 'Tamat SD' ? "selected" : '' ) }}>Tamat SD</option>
                <option value="SLTP" {{ (old('pendidikan',$post->pendidikan) === 'SLTP' ? "selected" : '' ) }}>SLTP</option>
                <option value="SLTA" {{ (old('pendidikan',$post->pendidikan) === 'SLTA' ? "selected" : '' ) }}>SLTA</option>
                <option value="Diploma IV/Strata I" {{ (old('pendidikan',$post->pendidikan) === 'Diploma IV/Strata I' ? "selected" : '' ) }}>Diploma IV/Strata I</option>
                <option value="Strata II" {{ (old('pendidikan',$post->pendidikan) === 'Strata II' ? "selected" : '' ) }}>Strata II</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
            <input type="text" class="form-control @error('jenis_pekerjaan') is-invalid @enderror" id="jenis_pekerjaan" name="jenis_pekerjaan" required  placeholder="Karyawan Swasta" value=" {{ old('jenis_pekerjaan', $post->jenis_pekerjaan) }} ">
            @error('jenis_pekerjaan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Update</button>
      </form>
    </div>
    
    
@endsection