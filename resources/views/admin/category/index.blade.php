@extends('layouts.admin', ['title' => 'Все категории услуг'])

@section('content')
    <h1 class="mb-4 text-center">Все категории услуг</h1>
    @can('create categories')
    <a href="{{ route('admin.category.create') }}" class="btn btn-success mb-4">
        Создать категорию
    </a>
    @endcan
    <table class="text-center table table-bordered">
        <tr>
            <th>#</th>
            <th width="35%">Наименование</th>
            <th width="35%">ЧПУ</th>
            @can('edit categories')
                <th>Изменить</th>
            @endcan
            @can('delete categories')
                <th>Удалить</th>
            @endcan
        </tr>
        @include('admin.category.part.all-ctgs', ['level' => -1, 'parent' => 0])
    </table>
@endsection