@extends('manager.layouts.main')

@section('content')
<div class="container">
  <form class="form-horizontal" action="{{ route('manager.category.update', $category) }}" method="post">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}
    @include('manager.categories.partials.form')
  </form>
</div>
@endsection
