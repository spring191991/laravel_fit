@if ($items->count())
    @foreach ($items as $item)
        <option value="{{ $item->name }}" @if ($item->id == $role) selected @endif>
            {{ $item->name }}
        </option>
    @endforeach
@endif