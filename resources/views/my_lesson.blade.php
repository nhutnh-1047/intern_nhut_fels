@extends('layouts.master')
@section('content')
    <div class="d-flex flex-wrap">
        {{-- {{ dd($lessons) }} --}}
        @foreach ($lessons as $key => $lesson)
            <div class="card m-2 w-25">
                <img class="card-img-top" src="{{ asset('../../asset/img/english.jpg') }}" alt="avâtr">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="">{{ $lesson->title }}</a>
                    </h4>
                    <p class=" card-text">{{ Str::limit($lesson->description, 100) }}</p>
                    <div class="text-center">
                        @if ($lesson->status == 0)
                            <a href="{{ route('lesson.view.id', ['id'=>$lesson->id]) }}" class="btn btn-primary">Bắt đầu học</a>
                        @else
                            <a href="" class="btn btn-primary">{{ $lesson->status }}</a>
                        @endif
                    </div>
                </div>
                <progress max="100" value="10" data-label="1/20"></progress>
            </div>
        @endforeach
    </div>
    <div class="col-xl-10 d-flex justify-content-center">
        {{-- {{ $lessons->links() }} --}}
    </div>
@endsection
@section('script')
    {!! HTML::script('../../js/getProcess.js') !!}
@endsection
