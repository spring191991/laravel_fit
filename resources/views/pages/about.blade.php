@extends('layouts.app')

@section('title-block')О компании@endsection

@section('content')
{{ Breadcrumbs::render('about') }}
	<h1 class="text-center">О компании</h1>
	<div class="p-3 bg-info rounded-3 text-white text-center">
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
  </div>
  <div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Наши преимущества</h2>
    <div class="row py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <h2>Низкие цены</h2>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="/" class="w-100 btn btn-lg btn-outline-info">
          Перейти к ценам
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
      <div class="feature col">
        <h2>Высокая эффективность</h2>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="/services" class="w-100 btn btn-lg btn-outline-info">
          Перейти в услуги
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
      <div class="feature col">
        <h2>Удобное расположение</h2>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="/contact" class="w-100 btn btn-lg btn-outline-info">
          Перейти в контакты
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
    </div>
  </div>
@endsection