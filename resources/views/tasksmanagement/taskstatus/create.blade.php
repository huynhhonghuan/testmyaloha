@extends('layouts.app')
@section('content')
<h3>Thêm mới trạng thái công việc</h3>
<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-body">
                {{-- <div class="card-title">
                    Thêm mới trạng thái công việc
                </div> --}}
                <div class="card-text">
                    <form action="{{route('taskstatus.store')}}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Example: Not Start"
                                name="name">
                            <label for="floatingInput">Tên trạng thái</label>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
