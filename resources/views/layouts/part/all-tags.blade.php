@if ($items->count())
    <ul class="tags">
    @foreach($items as $item)
        <li class="btn btn-lg btn-secondary m-2">
            <a class="text-white" href="{{ route('tag', ['tag' => $item->slug]) }}">{{ $item->name }}</a>
        </li>
    @endforeach
    </ul>
@endif