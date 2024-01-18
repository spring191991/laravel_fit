@extends('layouts.admin', ['title' => 'Редактирование пользователя'])

@section('content')
    <h1 class="mb-4">Редактирование пользователя</h1>
    <form method="post" action="{{ route('admin.user.update', ['user' => $user->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя, Фамилия</label>
            <input type="text" class="form-control" name="name" placeholder="Имя, Фамилия"
                   required maxlength="255" value="{{ old('name') ?? $user->name }}">
        </div>
        <div class="form-group">
            @php
                $role = old('role') ?? $user->roles[0]->id ?? 0;
            @endphp
            <label for="role">Роль</label>
            <select name="role" class="form-control" title="Категория">
                @include('admin.user.part.roles', ['items' => $roles])
            </select>
        </div>
        <div class="form-group">
            <label for="email">Адрес почты</label>
            <input type="email" class="form-control" name="email" placeholder="Адрес почты"
                   required maxlength="255" value="{{ old('email') ?? $user->email }}">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="change_password"
                   id="change_password">
            <label class="form-check-label" for="change_password">
                Изменить пароль пользователя
            </label>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" maxlength="255"
                   placeholder="Новый пароль" value="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password_confirmation" maxlength="255"
                   placeholder="Пароль еще раз" value="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form>
@endsection