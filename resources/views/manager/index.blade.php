@extends('manager.layouts.main')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="md-3 pull-left">Статьи <span class="badge badge-light">{{ $articles_count }}</span></h3>
                    <a href="{{ route('manager.article.create') }}" class="btn btn-outline-primary pull-right mb-3">
                        <i class="fa fa-plus-square-o"></i> Создать
                    </a>
                    <table class="table table-sm">
                        <thead>
                            <th>Заголовок</th>
                            <th>Статус</th>
                            <th></th>
                        </thead>
                        <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>
                                    @if($article->published == 1)
                                        <span class="badge badge-success">Активен</span>
                                    @else
                                        <span class="badge badge-secondary">Неактивен</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <form onsubmit="if(confirm('Удалить?')){ return true } else { return false }" action="{{ route('manager.article.destroy', $article) }}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <a class="btn btn-outline-dark btn-sm" href="{{route('manager.article.edit', $article)}}"><i class="fa fa-edit"></i> Изменить</a>
                                        <button type="submit" class="btn btn-outline-dark btn-sm"><i class="fa fa-trash-o"></i> Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">. . .</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="mb-3">
                        <a href="{{ route('manager.article.index') }}">Все статьи</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="md-2 pull-left">Категории <span class="badge badge-light">{{ $categories_count }}</span></h3>
                    <a href="{{ route('manager.category.create') }}" class="btn btn-outline-primary pull-right mb-3">
                        <i class="fa fa-plus-square-o"></i> Создать
                    </a>
                    <table class="table table-sm">
                        <thead>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Статус</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->title }}</td>
                                <td>
                                    @if($category->published == 1)
                                        <span class="badge badge-success">Активен</span>
                                    @else
                                        <span class="badge badge-secondary">Неактивен</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <form onsubmit="if(confirm('Удалить?')){ return true } else { return false }" action="{{ route('manager.category.destroy', $category) }}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <a class="btn btn-outline-dark btn-sm" href="{{ route('manager.category.edit', $category) }}"><i class="fa fa-edit"></i> Изменить</a>
                                        <button type="submit" class="btn btn-outline-dark btn-sm"><i class="fa fa-trash-o"></i> Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center"> . . . </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="mb-3">
                        <a href="{{ route('manager.category.index') }}">Все категории</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
