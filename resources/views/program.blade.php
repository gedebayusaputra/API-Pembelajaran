@extends('layouts.main')

@section('container')
    <b>PROGRAM </b>
    <p>in progress</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card">
            <a href="/program/feedback">
                <img src="img/program/feedback-survey-response-advice-suggestions.jpg" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
              <h5 class="card-title">Feedback</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <a href="/program/administration">
                <img src="img/program/closeup-hands-passing-contract-unrecognizable-businessman.jpg" class="card-img-top" alt="...">

            </a>
            <div class="card-body">
              <h5 class="card-title">Administration</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <a href="/program/documentation">
                <img src="img/program/ring-binder-used-stored-documents.jpg" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
              <h5 class="card-title">Documentation</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <a href="/program/achievement">
                <img src="img/program/first-place-medal.jpg" class="card-img-top" alt="...">

            </a>
            <div class="card-body">
              <h5 class="card-title">Achievement</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
      </div>
@endsection