@if ($items->count())
    <ul class="categories">
    @foreach ($items as $item)
        <li class="btn btn-lg btn-secondary m-1">
            <a class="text-white" href="{{ route('category', ['category' => $item->slug]) }}">{{ $item->name }}</a>
        </li>
    @endforeach
    </ul>
@endif