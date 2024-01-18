@extends('layouts.articles')

@section('title-block')Новости@endsection

@section('content')
  {{ Breadcrumbs::render('articles') }}

	<h1 class="text-center">Статьи</h1>
	
	<div class="row mb-2">
    <?php foreach ($articles as $article): ?>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <h3 class="mb-0 p-4">{{ $article->name }}</h3>
          <div class="col p-4 d-flex flex-column position-static">
            <div class="mb-1 text-body-secondary">{{ date_format($article->created_at, 'd.m.Y') }}</div>
            <p class="card-text mb-auto">{{ $article->excerpt }}</p>
            <a href="{{ route('articles.show', $article->id) }}" class="icon-link gap-1 icon-link-hover stretched-link">
              Читать дальше
              <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
            </a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="<?php if($article->image) echo '/storage/article/source/'.$article->image; else echo asset('img/fit2.jpg'); ?>" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  {{ $articles->links() }}
@endsection