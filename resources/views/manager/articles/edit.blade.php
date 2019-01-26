@extends('manager.layouts.main')

@section('content')
<div class="container">
  <form class="form-horizontal" action="{{ route('manager.article.update', $article) }}" method="post">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}
    @include('manager.articles.partials.form')
  </form>
</div>
@endsection
