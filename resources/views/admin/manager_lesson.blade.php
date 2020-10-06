@extends('admin.index')

@section('admin-content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            @if (is_array(session('success')))
                <ul>
                    @foreach (session('success') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session('success') }}
            @endif
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>@lang('messages.title')</th>
                <th>@lang('messages.description')</th>
                <th>@lang('messages.question_id')</th>
                <th>@lang('messages.category')</th>
                <th>@lang('messages.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->title }}</td>
                    <td>{{ strip_tags(htmlspecialchars_decode(Str::limit($lesson->description, 100))) }}</td>
                    <td>{{ $lesson->question_ids }}</td>
                    <td>{{ $lesson->category_id }}</td>
                    <td>
                        <a href="{{ route('admin.lesson.edit', ['id' => $lesson->id]) }}" class="text-decoration-none">
                            <i class="fas fa-edit"> </i>
                        </a>
                        <a href="{{ route('admin.lesson.delete', ['id' => $lesson->id]) }}" class="text-decoration-none">
                            <i class="fas fa-backspace"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $lessons->links() }}
@endsection
@section('script')
    {!! HTML::script(mix('js/updateWord.js')) !!}
@endsection
