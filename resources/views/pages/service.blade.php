@extends('layouts.services')

@section('content')

    <div class="row">
        <div class="col-12">
            {{ Breadcrumbs::render('services.show', $services) }}
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h1>{{ $services->name }}</h1>
                </div>
                <div class="card-body">
                    <img src="<?php if($services->image) echo '/storage/service/source/'.$services->image; else echo asset('img/fit1.jpg'); ?>" alt="" class="img-full">
                    <p class="mt-3 mb-0">{{ $services->content }}</p>
                </div>
                <div class="card-footer">
                    <div class="clearfix">
                        <span class="float-left">
                            Дата: {{ date_format($services->created_at, 'd.m.Y H:i') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection