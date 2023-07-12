@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Welcome, {{ Auth::user()->name }}</h1>
    </div>

    <div class="row">
      <div class="col-sm-6">

        <div class="card mb-3">
          <a href="/dashboard/informations">
            <img src="img/dashboard/network-connection-graphic-overlay-background-computer-screen.jpg" width="50%" height="50%" class="card-img-top" alt="...">

          </a>
          <div class="card-body">
            <h5 class="card-title">My Information</h5>
            <p class="card-text">Kumpulan informasi dan berita yang berada pada menu Information. Buat, sunting, dan hapus informasi serta berita terkini.</p>
          </div>
        </div>
      </div>
      
      @can('admin')
      <div class="col-sm-6">
        <div class="card mb-3">
          <a href="/dashboard/database-warga">
            <img src="img/dashboard/cloud-computing-storage-data-network.jpg" width="50%" height="315" class="card-img-top" alt="...">
          </a>
          <div class="card-body">
            <h5 class="card-title">Database Warga</h5>
            <p class="card-text">Kumpulan data warga secara online dalam rangka migrasi ke digital. Ubah, sunting, dan hapus data warga jika dibutuhkan dan diperlukan.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card mb-3">
          <a href="/dashboard/categories">
            <img src="img/dashboard/files-index-content-details-document-archives-concept.jpg" width="50%" height="315" class="card-img-top" alt="...">
          </a>
          <div class="card-body">
            <h5 class="card-title">Information Categories</h5>
            <p class="card-text">Atur kategori untuk informasi yang diberikan. Tambah, sunting, dan hapus kategori jika diperlukan.</p>
          </div>
        </div>
      </div>
      @endcan

      <div class="col-sm-6">
        <div class="card mb-3">
          <a href="/">
            <img src="img/dashboard/keyword-seo-content-website-tags-search.jpg" height="315" class="card-img-top" alt="...">

          </a>
          <div class="card-body">
            <h5 class="card-title">View Website</h5>
            <p class="card-text">Ingin melihat perubahan secara langsung? kunjungi website.</p>
          </div>
        </div>
      </div>
  </div>

@endsection