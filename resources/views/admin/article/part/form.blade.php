@csrf
<div class="form-group">
    <label for="name">Наименование</label>
    <input type="text" class="form-control" name="name" placeholder="Наименование"
           required maxlength="100" value="{{ old('name') ?? $article->name ?? '' }}">
</div>
<div class="form-group">
    <label for="slug">ЧПУ</label>
    <input type="text" class="form-control" name="slug" placeholder="ЧПУ"
           required maxlength="100" value="{{ old('slug') ?? $article->slug ?? '' }}">
</div>
<div class="form-group">
    <label for="excerpt">Анонс</label>
    <textarea class="form-control" name="excerpt" placeholder="Анонс"
              required maxlength="500">{{ old('excerpt') ?? $article->excerpt ?? '' }}</textarea>
</div>
<div class="form-group">
    <label for="content">Текст</label>
    <textarea class="form-control" name="content" placeholder="Текст"
              required rows="4">{{ old('content') ?? $article->content ?? '' }}</textarea>
</div>
<div class="form-group">
    <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
</div>
@isset($article->image)
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Удалить загруженное изображение
        </label>
    </div>
@endisset
@include('admin.article.part.all-tags')
<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>