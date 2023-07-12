@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new data warga</h1>
    </div>
    <div class="col-lg-8">
      <a href="/dashboard/database-warga" class="btn btn-success mb-3"><i class="bi bi-arrow-90deg-up me-1"></i>Back to Database-Warga</a>

    <form method="POST" action="/dashboard/database-warga" class="mb-5" >
        @csrf
        <div class="mb-3 mt-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}" placeholder="Ex: Budi Setiawati">
          @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
       
        <div class="mb-3">
          <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
          <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required value="{{ old('nik') }}">
          @error('nik')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        
        <div class="mb-3">
          <label for="jk" class="form-label">Jenis Kelamin</label>
          <select class="form-select" name="jk">
              <option value="Laki-Laki" {{ (old('jk') === 'Laki-Laki' ? "selected" : '' ) }}>Laki-Laki</option>
              <option value="Perempuan" {{ (old('jk') === 'Perempuan' ? "selected" : '' ) }}>Perempuan</option>
                
          </select>
        </div>

        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" required value="{{ old('tempat_lahir') }}" placeholder="Jakarta">
            @error('tempat_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
            @error('tanggal_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select class="form-select" name="agama">
                <option value="Islam" {{ (old('agama') === 'Islam' ? "selected" : '' ) }}>Islam</option>
                <option value="Kristen" {{ (old('agama') === 'Kristen' ? "selected" : '' ) }}>Kristen</option>
                <option value="Katolik" {{ (old('agama') === 'Katolik' ? "selected" : '' ) }}>Katolik</option>
                <option value="Buddha" {{ (old('agama') === 'Buddha' ? "selected" : '' ) }}>Buddha</option>
                <option value="Hindu" {{ (old('agama') === 'Hindu' ? "selected" : '' ) }}>Hindu</option>
                <option value="Konghucu" {{ (old('agama') === 'Konghucu' ? "selected" : '' ) }}>Konghucu</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <select class="form-select" name="pendidikan">
                <option value="Tamat SD" {{ (old('pendidikan') === 'Tamat SD' ? "selected" : '' ) }}>Tamat SD</option>
                <option value="SLTP" {{ (old('pendidikan') === 'SLTP' ? "selected" : '' ) }}>SLTP</option>
                <option value="SLTA" {{ (old('pendidikan') === 'SLTA' ? "selected" : '' ) }}>SLTA</option>
                <option value="Diploma IV/Strata I" {{ (old('pendidikan') === 'Diploma IV/Strata I' ? "selected" : '' ) }}>Diploma IV/Strata I</option>
                <option value="Strata II" {{ (old('pendidikan') === 'Strata II' ? "selected" : '' ) }}>Strata II</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
            <input type="text" class="form-control @error('jenis_pekerjaan') is-invalid @enderror" id="jenis_pekerjaan" name="jenis_pekerjaan" required value="{{ old('jenis_pekerjaan') }}" placeholder="Karyawan Swasta">
            @error('jenis_pekerjaan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" >Create</button>
      </form>
    </div>
    
    
@endsection