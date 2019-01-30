<div class="row">
    <div class="col-md-6 mb-4">
        <label for="">Название</label>
        @if($errors->has('title'))
            <div class="error small text-danger">{{ $errors->first('title') }}</div>
        @endif
        <input type="text" class="form-control" name="title" placeholder="" value="{{ isset($category->title) ? $category->title : '' }}" autocomplete="off">
    </div>
    <div class="col-md-6 mb-4">
        <label for="">Статус</label>
        <select class="form-control" name="published">
          @if(isset($category->id))
            <option value="0" @if ($category->published == 0) selected="" @endif>Не опубликовано</option>
            <option value="1" @if ($category->published == 1) selected="" @endif>Опубликовано</option>
          @else
            <option value="0">Не опубликовано</option>
            <option value="1">Опубликовано</option>
          @endif
        </select>
    </div>
</div>
<input class="btn btn-primary pull-right" type="submit" value="Сохранить">
