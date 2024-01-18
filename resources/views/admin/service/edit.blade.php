@extends('layouts.admin', ['title' => 'Редактирование услуги'])

@section('content')
    <h1 class="text-center">Редактирование услуги</h1>
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.service.update', ['service' => $service->id]) }}">
        @method('PUT')
        @include('admin.service.part.form')
    </form>
@endsection