@extends('layouts.admin', ['title' => 'Все статьи'])

@section('content')
    <h1 class="mb-4 text-center">Все статьи</h1>
    @can('create articles')
    <a href="{{ route('admin.article.create') }}" class="btn btn-success mb-4">
        Создать статью
    </a>
    @endcan
    @if ($articles->count())
        <table class="text-center table table-bordered">
            <tr>
                <th width="15%">Дата</th>
                <th width="55%">Наименование</th>
                @can('edit articles')
                    <th width="15%">Изменить</th>
                @endcan
                @can('delete articles')
                    <th width="15%">Удалить</th>
                @endcan
            </tr>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->name }}</td>
                    @can('edit articles')
                    <td>
                        <a href="{{ route('admin.article.edit', ['article' => $article->id]) }}">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    @endcan
                    @can('delete articles')
                    <td>
                        <form action="{{ route('admin.article.destroy', ['article' => $article->id]) }}"
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
        {{ $articles->links() }}
    @endif
@endsection