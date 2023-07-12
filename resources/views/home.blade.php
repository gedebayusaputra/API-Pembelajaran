@extends('layouts.main')


{{-- <main> --}}
@section('container')
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-theme="light">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/carousel/Slice-1.jpeg" class="d-block w-100 " style="filter:brightness(40%) contrast(90%);" alt="Slide 1">
          <div class="container">
            <div class="carousel-caption text-start">
              <h1>Selamat datang, Warga!</h1>
              <p class="opacity-75">Selamat datang di Website RT/RW 005/014 Desa Setia Asih. Kami menyambut warga sekalian untuk turut ikut serta dalam  perkembangan lingkungan RT/RW Kami. </p>
              <p><a class="btn btn-lg btn-primary" href="#bar">Layanan Kami</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/carousel/Slice-2.png" class="d-block w-100" style="filter:brightness(55%) contrast(100%);" alt="Slide 2">
          <div class="container">
            <div class="carousel-caption">
              <h1>Cek informasi dan berita terkini!</h1>
              <p>Warga dapat melihat informasi dan berita terkini serta informasi dari pemerintah seperti vaksin, pemilu, dan program pemerintahan lainnya yang telah disediakan.</p>
              <p><a class="btn btn-lg btn-primary" href="#information">Information</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/carousel/2023-02-23.jpg" class="d-block w-100" style="filter:brightness(55%) contrast(100%);" height="700px" width="1000px" alt="Slide 2">
          <div class="container">
            <div class="carousel-caption text-end">
              <h1>Ikuti program kerja milik kami!</h1>
              <p>Warga dapat melihat program yang kami miliki.</p>
              <p><a class="btn btn-lg btn-primary" href="/program">Programs</a></p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  
  
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
  
    <div class="container marketing" >
  
      <!-- Three columns of text below the carousel -->

      <div class="row " href="#" id="bar">
        <h1 class="text-center mb-5">Our Services</h1>
        <div class="col-lg-4">
          <img src="img/icons/2480553.jpg" class="bd-placeholder-img  object-fit-cover rounded-circle" width="140" height="140" style="" alt="">
          <h2 class="fw-normal">About Us</h2>
          <p>Ingin mengenal RT/RW kami lebih lengkap?</p>
          <p><a class="btn btn-secondary" href="/about-us">Klik disini! &raquo;</a></p>
          <a href="http://www.freepik.com" style="font-size:10">Designed by pikisuperstar / Freepik</a>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="img/icons/2642704.jpg" class="bd-placeholder-img  object-fit-cover rounded-circle" width="140" height="140" style="width=100%; height=100%" alt="">
          <h2 class="fw-normal">Informations</h2>
          <p>Kami memiliki informasi paling relevan dan terbaru seputar lingkungan kami dan informasi pemerintahan.</p>
          <p><a class="btn btn-secondary" href="/information">Klik disini! &raquo;</a></p>
          <a href="http://www.freepik.com" style="font-size:10">Designed by pikisuperstar / Freepik</a>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="img/icons/20943502.jpg" class="bd-placeholder-img  object-fit-cover rounded-circle" width="140" height="140" style="width=100%; height=100%" alt="">
          <h2 class="fw-normal">Programs</h2>
          <p>Ikuti dan simak program-program dari RT/RW kami!</p>
          <p><a class="btn btn-secondary" href="/program">Klik disini! &raquo;</a></p>
          <a href="http://www.freepik.com" style="font-size:10">Designed by vectorjuice / Freepik</a>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
  
  
      <!-- START THE FEATURETTES -->
      
      <hr class="featurette-divider" style="">
      <h1 class="text-center mb-5" id="information">Latest Informations</h1>

      
      @foreach ($posts as $key => $post)
        @if($key === 3)
         @break
        @endif

        @if($key !== 1)
        <hr class="featurette-divider" style="">
        
        <div class="row featurette" >
          <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">
              <a href="/information/{{ $post->slug }}" class="text-decoration-none text-dark">
                  {{ $post->title }}
              </a> 
            </h2>
            <p class="card-text"><small class="text-body-secondary">Last updated: {{ $post->created_at->format('d-m-Y | H:i:s') }} </small></p>
            <h5 > 
              Category: 
              <a href="/information?category={{ $post->category->slug }}" class="" > 
                {{   $post->category->name }}
              </a> 
            </h5>
            <h5 > 
              Author: 
              <a href="/information?authors={{ $post->author->username }}" > 
                {{   $post->author->name }}
              </a> 
            </h5>

            <p class="lead mt-5">{{ $post->excerpt }}</p>
            <a href="/information/{{ $post->slug }}" class="btn btn-primary mt-3">Read More</a>
            
          </div>
          <div class="col-md-5">
            @if ($post->image)
            <div style="max-height: 400px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" alt=""  class="img-fluid">

            </div>
                
            @else
                <img src="https://picsum.photos/seed/picsum/300/300" class="card-img-top" alt="...">
                
            @endif
            
          </div>
        </div>
        @else
          <hr class="featurette-divider">
          
          <div class="row featurette">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading fw-normal lh-1">
                <a href="/information/{{ $post->slug }}" class="text-decoration-none text-dark">
                  {{ $post->title }}
                </a> 
             </h2>
             <p class="card-text"><small class="text-body-secondary">Last updated: {{ $post->created_at->format('d-m-Y | H:i:s') }} </small></p>
             <h5 > 
              Category: 
              <a href="/information?category={{ $post->category->slug }}" class="" > 
                {{   $post->category->name }}
              </a> 
            </h5>
            <h5 > 
              Author: 
              <a href="/information?authors={{ $post->author->username }}" > 
                {{   $post->author->name }}
              </a> 
            </h5>

              <p class="lead">{{ $post->excerpt }}</p>
              <a href="/information/{{ $post->slug }}" class="btn btn-primary mt-3">Read More</a>

            </div>
            <div class="col-md-5 order-md-1">
              @if ($post->image)
              <div style="max-height: 400px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" alt=""  class="img-fluid">
                
              </div>
              
              @else
              <img src="https://picsum.photos/seed/picsum/300/300" class="card-img-top" alt="...">
              
              @endif
            </div>
          </div>
        @endif
        @endforeach
        <hr class="featurette-divider">
        
  
      <!-- /END THE FEATURETTES -->
  
    </div><!-- /.container -->
  
  
    <!-- FOOTER -->
    
    
  {{-- </main> --}}

@endsection