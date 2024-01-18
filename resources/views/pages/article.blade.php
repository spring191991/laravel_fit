@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Breadcrumbs::render('articles.show', $articles) }}
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h1>{{ $articles->name }}</h1>
                </div>
                <div class="card-body">
                    <img src="<?php if($articles->image) echo '/storage/article/source/'.$articles->image; else echo asset('img/fit2.jpg'); ?>" alt="" class="img-full">
                    <p class="mt-3 mb-0">{{ $articles->content }}</p>
                </div>
                <div class="card-footer">
                    <div class="clearfix">
                        <span class="float-left">
                            Дата: {{ date_format($articles->created_at, 'd.m.Y H:i') }}
                        </span>
                    </div>
                </div>
            </div>    
        <h4 class="text-center">Теги</h4>
        @if ($articles->tags->count())
            <ul class="tags">
            @foreach($articles->tags as $tag)
                <li class="btn btn-lg btn-secondary m-2">
                    <a class="text-white" href="{{ route('tag', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                </li>
            @endforeach
            </ul>
        @endif
        </div>
    </div>
@endsection