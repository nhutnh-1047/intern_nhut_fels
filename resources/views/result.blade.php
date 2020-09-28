@extends('layouts.master')
@section('content')
    <div class="row mt-2">
        <div class="col-xl-8 ">
            <div class="card ">
                @if ($result)
                    <div class="card-header bg-success">Thông báo</div>
                    <div class="card-body">Chúc mừng, bạn đã hoàn thành khóa học</div>
                @else
                    <div class="card-header bg-dark text-white">Thông báo</div>
                    <div class="card-body">Rất tiếc, bạn cần học lại khóa học này</div>
                @endif
            </div>
        </div>
    </div>
@endsection
