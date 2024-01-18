<div class="form-group">
    <label for="name">Наименование</label>
    <input type="text" class="form-control" name="name" placeholder="Наименование"
           required maxlength="100" value="{{ old('name') ?? $category->name ?? '' }}">
</div>
<div class="form-group">
    <label for="slug">ЧПУ</label>
    <input type="text" class="form-control" name="slug" placeholder="ЧПУ"
           required maxlength="100" value="{{ old('slug') ?? $category->slug ?? '' }}">
</div>
<div class="form-group">
    <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
</div>
@isset($category->image)
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Удалить загруженное изображение
        </label>
    </div>
@endisset
<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>