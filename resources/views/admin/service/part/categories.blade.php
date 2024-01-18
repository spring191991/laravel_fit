@if ($items->count())
    @foreach ($items as $item)
        <option value="{{ $item->id }}" @if ($item->id == $category_id) selected @endif>
            {{ $item->name }}
        </option>
    @endforeach
@endif