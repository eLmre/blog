@extends('manager.layouts.main')

@section('content')
<div class="container">
  <a href="{{route('manager.article.create')}}" class="btn btn-outline-primary pull-right mb-3"><i class="fa fa-plus-square-o"></i> Создать</a>
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
    <tfoot>
      <tr>
        <td colspan="3">
          <ul class="pagination mt-3 pull-right">
            {{ $articles->links() }}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection
