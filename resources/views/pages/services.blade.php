@extends('layouts.services')

@section('title-block')Услуги@endsection

@section('content')
  {{ Breadcrumbs::render('services') }}

	<h1 class="text-center">Услуги</h1>
  <div class="album py-3 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($services as $service): ?>
          <div class="col">
            <div class="card shadow-sm">
              <img src="<?php if($service->image) echo '/storage/service/source/'.$service->image; else echo asset('img/fit1.jpg'); ?>" alt="" class="img-fluid">
              <div class="card-body">
                <p class="card-text">{{ $service->excerpt }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                  </div>
                  <small class="text-body-secondary">9 mins</small>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  {{ $services->links() }}
@endsection