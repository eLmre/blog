<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <div class="card-body">
            <a href="{{ route('article', ['slug' => $article->slug]) }}" class="card-title"><h3>{{ $article->title }}</h3></a>
            @foreach($article->categories as $category)
                <a href="{{ route('category', ['slug' => $category->slug]) }}" class="card-subtitle mb-3 text-muted">{{ $category->title }}</a>@if(!$loop->last),@endif
            @endforeach
            <p class="card-text">{{ str_limit(strip_tags($article->description), 150) }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('article', ['slug' => $article->slug]) }}" class="btn btn-sm btn-outline-secondary">Просмотр</a>
                    @if( auth()->check() && auth()->user()->role->name == 'manager' )
                        <a href="{{ route('manager.article.edit', $article) }}" class="btn btn-sm btn-outline-secondary">Изменить</a>
                    @endif
                </div>
                <small class="text-muted">{{ $article->created_at->format('d-m H:i') }}</small>
            </div>
        </div>
    </div>
</div>
