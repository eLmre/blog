@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>{{ $category->title }}</h2>
		<hr>

		<div class="row mb-3">
			@forelse($articles as $article)
				@include('partials.article_card')
			@empty
				<div class="col-12 text-center">Ничего не найдено</div>
			@endforelse
		</div>

		{{ $articles->links() }}

	</div>
@endsection