<div class="row">
    <div class="col-md-6 mb-3">
        <label for="">Заголовок</label>
        @if($errors->has('title'))
            <div class="error small text-danger">{{ $errors->first('title') }}</div>
        @endif
        <input type="text" class="form-control" name="title" placeholder="" value="{{ $article->title ?? '' }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Статус</label>
        <select class="form-control" name="published">
            <option value="0" @if(isset($article->published) && $article->published == 0) selected @endif>Не опубликовано</option>
            <option value="1" @if(isset($article->published) && $article->published == 1) selected @endif>Опубликовано</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="">Категория</label>
        @if($errors->has('categories'))
            <div class="error small text-danger">{{ $errors->first('categories') }}</div>
        @endif
        <select class="form-control select2" name="categories[]" multiple="">
            @foreach(\App\Category::where('published', 1)->get() as $category)
                <option value="{{ $category->id }}" @if($article->categories()->where('id', $category->id)->count()) selected @endif>{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-12 mb-4">
        @if($errors->has('description'))
            <div class="error small text-danger">{{ $errors->first('description') }}</div>
        @endif
        <label for="description">Содержание</label>
        <textarea id="ckeditor" class="form-control" id="description" name="description">{{ $article->description ?? '' }}</textarea>
    </div>
</div>

<input class="btn btn-primary pull-right" type="submit" value="Сохранить">
