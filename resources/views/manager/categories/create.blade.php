@extends('manager.layouts.main')

@section('content')
<div class="container">
  <form class="form-horizontal" action="{{ route('manager.category.store') }}" method="post">
    {{ csrf_field() }}
    @include('manager.categories.partials.form')
  </form>
</div>
@endsection
