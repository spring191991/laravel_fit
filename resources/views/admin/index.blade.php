@extends('layouts.admin', ['title' => 'Панель управления'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center card">
                <div class="card-header"><h1>Панель управления</h1></div>

                <div class="card-body">
                    <p>Добрый день {{ auth()->user()->name }}!</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection