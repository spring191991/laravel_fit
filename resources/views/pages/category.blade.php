@extends('layouts.services')

@section('title-block')Услуги@endsection

@section('content')
  {{ Breadcrumbs::render('category', $category) }}

  <h1 class="text-center">{{ $category->name }}</h1>

  <?php if($category->image){ ?>
    <img src="/storage/category/source/{{ $category->image }}" alt="" class="img-full">
  <?php } else { ?>
    <img src="{{ asset('img/fit3.jpg') }}" alt="" class="img-full">
  <?php } ?>

  <div class="album py-5 bg-body-tertiary">
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