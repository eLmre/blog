@extends('manager.layouts.main')

@section('content')
<div class="container">
  <a href="{{ route('manager.category.create') }}" class="btn btn-outline-primary pull-right mb-3"><i class="fa fa-plus-square-o"></i> Создать</a>
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
    <tfoot>
      <tr>
        <td colspan="3">
          <ul class="pagination mt-3 pull-right">
            {{ $categories->links() }}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection
