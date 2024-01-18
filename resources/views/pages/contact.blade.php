@extends('layouts.app')

@section('title-block')Контакты@endsection

@section('content')
{{ Breadcrumbs::render('contact') }}
	<h1 class="text-center">Контакты</h1>
    <div class="row">
        <div class="col-md-6">
            <p>Адрес: г. Москва, ул. Образцова, д. 765</p>
            <p>Телефон: +7 (888) 888-88-88</p>
            <p>E-mail: <a href="mailto:test@mail.ru">test@mail.ru</a></p>
			<div style="position:relative;overflow:hidden;">
                <a href="https://yandex.ru/maps/191/bryansk/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Брянск</a><a href="https://yandex.ru/maps/191/bryansk/?ll=34.351205%2C53.242380&utm_medium=mapframe&utm_source=maps&z=15.66" style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация, поиск мест</a>
                <iframe src="https://yandex.ru/map-widget/v1/?ll=34.351205%2C53.242380&z=15.66" style="width:100%" height="300" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
            </div>
        </div>
		<div class="col-md-1"></div>
        <div class="col-md-5">
			@include('inc.contact-form')
        </div>
    </div>
@endsection