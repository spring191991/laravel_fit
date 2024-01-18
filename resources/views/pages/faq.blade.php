@extends('layouts.app')

@section('title-block')FAQ @endsection

@section('content')
{{ Breadcrumbs::render('faq') }}
	<h1 class="text-center">FAQ</h1>
	<div id="accordion">
		<div class="card">
			<div class="card-header" id="headingOne">
			<h5 class="mb-0">
				<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				Вопрос 1
				</button>
			</h5>
			</div>

			<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
			<div class="card-body">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
			</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header" id="headingTwo">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				Вопрос 2
				</button>
			</h5>
			</div>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
			<div class="card-body">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry.
			</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header" id="headingThree">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				Вопрос 3
				</button>
			</h5>
			</div>
			<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
			<div class="card-body">
				Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
			</div>
			</div>
		</div>
		</div>
@endsection