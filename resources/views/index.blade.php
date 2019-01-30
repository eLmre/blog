@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <form class="row">
                    <div class="form-group col-6">
                        <label for="">Категория</label>
                        <select class="form-control select2" name="categories[]" multiple="">
                            @foreach(\App\Category::where('published', 1)->get() as $category)
                                <option value="{{ $category->id }}" @if(isset($filter['categories']) && in_array($category->id, $filter['categories'])) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Поиск</label>
                        <input class="form-control" value="{{ $filter['search'] ?? '' }}" name="search">
                    </div>
                    <div class="form-group col-12">
                        <input class="btn btn-primary" type="submit" value="Найти">
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @forelse($articles as $article)
                @include('partials.article_card')
            @empty
                <div class="col-12 text-center">Ничего не найдено</div>
            @endforelse
        </div>

        @php
            $append = [];
            if(isset($filter['categories'])) {
                $append['categories'] = $filter['categories'];
            }
            if(isset($filter['search'])) {
                $append['search'] = $filter['search'];
            }
        @endphp
        {{ $articles->appends($append)->links() }}
    </div>
@endsection
