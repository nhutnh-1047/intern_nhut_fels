{!! HTML::style('../../../style/category.css') !!}
<ul class="list-group">
    <li class="list-group-item text-center bg-primary">
        <h3>@lang('messages.category')</h3>
    </li>
    @foreach ($categories as $category)
        @if ($category->id_parent == 0)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="text-dark" href="{{ route('category.filter.id', ['id' => $category->id]) }}">
                    {{ $category->name }}
                </a>
                <span class="badge badge-primary badge-pill">{{ $category[1] }}</span>
            </li>
        @endif
        @foreach ($category->category as $item)
            @if ($item->id_parent == $category->id)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a class="text-dark" href="{{ route('category.filter.id', ['id' => $item->id]) }}">
                                {{ $item->name }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        @endforeach
    @endforeach
</ul>
