@extends('layouts.main')

@section('container')

    <h2 class="text-center mt-5">
        <b>About Us</b>
    </h2>
    <div class=" mt-3 img-fluid ratio ratio-4x3 d-block mx-auto" style="width: 30%; height:30%"  >
        <img src="img/logo.png" alt="">
    </div>

    <div class="text-center">
        <h4>
            RT/RW 005/014
        </h4>
        <h4>
            Desa Setia Asih, Kecamatan Tarumajaya
        </h4>
        <h4>
            Kabupaten Bekasi, Jawa Barat
        </h4>
    </div>

    <hr class="featurette-divider " style="margin: 100px">

    <div class="visi-misi">
        <h3 class="mt-5 mb-5 text-center">
            Visi-Misi
        </h3>
    
        <h4 class="text-decoration-underline">
            Visi
        </h4>
        <p>
            Mewujudkan lingkungan yang harmonis, inklusif, dan sejahtera dengan partisipasi aktif warga dalam membangun komunitas yang berdaya untuk menciptakan lingkungan yang berkualitas dan sejahtera bagi seluruh warga RT/RW 005/014.
        </p>
        <h4 class="text-decoration-underline">
            Misi
        </h4>
        <p class="lh-lg">
            1. Menggalang partisipasi aktif warga dalam pengambilan keputusan dan pelaksanaan program untuk memastikan kepentingan bersama dan menciptakan rasa memiliki terhadap lingkungan. <br>
    2. Menyelenggarakan program keamanan lingkungan yang efektif, termasuk patroli, pemantauan CCTV, dan kerjasama dengan pihak kepolisian untuk menjaga keamanan dan ketertiban di wilayah RT/RW 005/014. <br>
    3. Melaksanakan program kebersihan dan penghijauan, serta mengelola limbah secara efisien untuk menciptakan lingkungan yang bersih, hijau, dan nyaman. <br>
    4. Mendorong peningkatan pelayanan publik, seperti kesehatan, pendidikan, dan fasilitas umum, dengan mengadvokasi kebijakan yang mendukung dan bekerja sama dengan instansi terkait.
        </p>

    </div>

    <hr class="featurette-divider " style="margin: 100px">

    <div class="struktural">
        <h3 class="mt-5 mb-5 text-center">
            Struktural
        </h3>
    
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
              <div class="card">
                <img src="img/profile/pico6.png" class="card-img-top object-fit-cover rounded-circle d-block mx-auto" style="width: 50%; height:50%" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Ketua RT</h5>
                  <p class="card-text">Agus Santoso</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="img/profile/pico9.png" class="card-img-topobject-fit-cover rounded-circle d-block mx-auto" style="width: 50%; height:50%" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Sekretaris RT</h5>
                  <p class="card-text">Erlina</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="img/profile/pico2.png" class="card-img-top object-fit-cover rounded-circle d-block mx-auto" style="width: 50%; height:50%" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Bendahara RT</h5>
                  <p class="card-text">Bambang Prasetyo</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="img/profile/pico7.png" class="card-img-top object-fit-cover rounded-circle d-block mx-auto" style="width: 50%; height:50%" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Staff RT</h5>
                  <p class="card-text">Dewi Sari</p>
                </div>
              </div>
            </div>
          </div>
    
    </div>

    <hr class="featurette-divider " style="margin: 100px">
    
    <h3 class="mt-5 mb-5 text-center">
        Kunjungi Kami!
    </h3>

    <a href="https://goo.gl/maps/5j7ewZPV3msvvKP29" style="display:block">

        <img class="mx-auto d-block" src="img/gmaps.jpeg" alt="" style="width:500px; height:450px">
    </a>

    <p class="text-center mt-3">
        Alamat: Jl. Gendang 3, Setia Asih, Kec. Tarumajaya, Kabupaten Bekasi, Jawa Barat 17215
    </p>


    @endsection

