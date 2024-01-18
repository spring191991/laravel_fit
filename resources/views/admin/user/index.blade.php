@extends('layouts.admin', ['title' => 'Все пользователи'])

@section('content')
    <h1 class="mb-4 text-center">Все пользователи</h1>

    <table class="text-center table table-bordered">
        <tr>
            <th>#</th>
            <th>Дата регистрации</th>
            <th>Имя, фамилия</th>
            <th>Роль</th>
            <th>Адрес почты</th>
            @can('edit users')
                <th>Изменить</th>
            @endcan
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->roles[0]->name }}</td>
                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                @can('edit users')
                <td>
                    <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                @endcan
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
@endsection