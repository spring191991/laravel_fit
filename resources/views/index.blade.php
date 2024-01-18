@extends('layouts.app')

@section('content') 
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <main class="px-3">
    <div class="p-3 bg-info rounded-3 text-white text-center">
      <h1>Fitfit</h1>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div><br><br>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner text-center">
        <div class="carousel-item active">
          <img class="d-block w-100 rounded" src="/img/fit1.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block bg-secondary rounded-3 opacity-75">
            <h5>Slide 1</h5>
            <p>Lorem Ipsum is simply dummy text</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 rounded" src="/img/fit2.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block bg-secondary rounded-3 opacity-75">
            <h5>Slide 2</h5>
            <p>Lorem Ipsum is simply dummy text</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 rounded" src="/img/fit4.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block bg-secondary rounded-3 opacity-75">
            <h5>Slide 3</h5>
            <p>Lorem Ipsum is simply dummy text</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 rounded" src="/img/fit5.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block bg-secondary rounded-3 opacity-75">
            <h5>Slide 4</h5>
            <p>Lorem Ipsum is simply dummy text</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
    </div><br><br>

    <h2 class="text-center">Наши цены</h2>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Пробное занятие</h4>
          </div>
          <div class="card-body">
            <p class="card-title pricing-card-title">бесплатно</p>
            <a class="w-100 btn btn-lg btn-outline-primary" href="/contact">Связаться с нами</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Одно занятие</h4>
          </div>
          <div class="card-body">
            <p class="card-title pricing-card-title">300 <small class="text-body-secondary fw-light">руб.</small></p>
            <a class="w-100 btn btn-lg btn-primary" href="/contact">Связаться с нами</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h4 class="my-0 fw-normal">Месяц тренировок</h4>
          </div>
          <div class="card-body">
            <p class="card-title pricing-card-title">3 000 <small class="text-body-secondary fw-light">руб.</small></p>
            <a class="w-100 btn btn-lg btn-primary" href="/contact">Связаться с нами</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4 class="text-center">Популярные теги статей</h4>
          @include('layouts.part.popular-tags')
        </div>
      </div>
    </div>
  </main>
</div>
@endsection