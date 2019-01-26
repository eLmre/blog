@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>{{ $article->title }}</h1>
				<p>{!! $article->description !!}</p>
			</div>
		</div>
	</div>
@endsection