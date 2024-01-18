@if ($items->count())
    @foreach ($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->slug }}</td>
            @can('edit categories')
            <td>
                <a href="{{ route('admin.category.edit', ['category' => $item->id]) }}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            @endcan
            @can('delete categories')
            <td>
                <form action="{{ route('admin.category.destroy', ['category' => $item->id]) }}"
                      method="post" onsubmit="return confirm('Удалить эту категорию?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                        <i class="far fa-trash-alt text-danger"></i>
                    </button>
                </form>
            </td>
            @endcan
        </tr>
    @endforeach
@endif