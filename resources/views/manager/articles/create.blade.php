@extends('manager.layouts.main')

@section('content')
<div class="container">
  <form class="form-horizontal" action="{{route('manager.article.store')}}" method="post">
    {{ csrf_field() }}
    @include('manager.articles.partials.form')
  </form>
</div>
@endsection
