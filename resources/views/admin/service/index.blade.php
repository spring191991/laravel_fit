@extends('layouts.admin', ['title' => 'Все услуги'])

@section('content')
    <h1 class="mb-4 text-center">Все услуги</h1>
    @can('create services')
    <a href="{{ route('admin.service.create') }}" class="btn btn-success mb-4">
        Создать услугу
    </a>
    @endcan
    @if ($services->count())
        <table class="text-center table table-bordered">
            <tr>
                <th width="15%">Дата</th>
                <th width="35%">Наименование</th>
                <th width="20%">Категория</th>
                @can('edit services')
                    <th width="15%">Изменить</th>
                @endcan
                @can('delete services')
                    <th width="15%">Удалить</th>
                @endcan
            </tr>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->created_at }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->category->name }}</td>
                    @can('edit services')
                    <td>
                        <a href="{{ route('admin.service.edit', ['service' => $service->id]) }}">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    @endcan
                    @can('delete services')
                    <td>
                        <form action="{{ route('admin.service.destroy', ['service' => $service->id]) }}"
                                method="post" onsubmit="return confirm('Удалить эту статью?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                    </td>
                    @endcan
                </tr>
            @endforeach
        </table>
        {{ $services->links() }}
    @endif
@endsection