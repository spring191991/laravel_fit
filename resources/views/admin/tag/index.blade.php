@extends('layouts.admin', ['title' => 'Все теги статей'])

@section('content')
    <h1 class="mb-4 text-center">Все теги статей</h1>
    @can('create tags')
    <a href="{{ route('admin.tag.create') }}" class="btn btn-success mb-4">
        Создать тег
    </a>
    @endcan
    @if ($items->count())
        <table class="text-center table table-bordered">
            <tr>
                <th>#</th>
                <th width="35%">Наименование</th>
                <th width="35%">ЧПУ</th>
                @can('edit tags')
                    <th>Изменить</th>
                @endcan
                @can('delete tags')
                    <th>Удалить</th>
                @endcan
            </tr>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                @can('edit tags')
                <td>
                    <a href="{{ route('admin.tag.edit', ['tag' => $item->id]) }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                @endcan
                @can('delete tags')
                <td>
                    <form action="{{ route('admin.tag.destroy', ['tag' => $item->id]) }}"
                          method="post" onsubmit="return confirm('Удалить этот тег?')">
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
        {{ $items->links() }}
    @endif
@endsection