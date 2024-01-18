@csrf
<div class="form-group">
    <label for="name">Наименование</label>
    <input type="text" class="form-control" name="name" placeholder="Наименование"
           required maxlength="100" value="{{ old('name') ?? $service->name ?? '' }}">
</div>
<div class="form-group">
    <label for="slug">ЧПУ</label>
    <input type="text" class="form-control" name="slug" placeholder="ЧПУ"
           required maxlength="100" value="{{ old('slug') ?? $service->slug ?? '' }}">
</div>
<div class="form-group">
    @php
        $category_id = old('category_id') ?? $service->category_id ?? 0;
    @endphp
    <label for="category_id">Категория</label>
    <select name="category_id" class="form-control" title="Категория">
        @include('admin.service.part.categories', ['category_id' => $category_id])
    </select>
</div>
<div class="form-group">
    <label for="excerpt">Анонс</label>
    <textarea class="form-control" name="excerpt" placeholder="Анонс"
              required maxlength="500">{{ old('excerpt') ?? $service->excerpt ?? '' }}</textarea>
</div>
<div class="form-group">
    <label for="content">Текст</label>
    <textarea class="form-control" name="content" placeholder="Текст"
              required rows="4">{{ old('content') ?? $service->content ?? '' }}</textarea>
</div>
<div class="form-group">
    <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
</div>
@isset($service->image)
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