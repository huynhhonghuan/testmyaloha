@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('multiselect-05/css/style.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-8 mx-auto">
        <div class="card mt-2">
            <div class="card-header">
                Thêm mới trạng thái công việc
            </div>
            <div class="card-body">
                <div class="card-text">
                    <form action="{{route('task.store')}}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="" name="title">
                            <label for="floatingInput">Tên công việc</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="description"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Mô tả công việc</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" placeholder="" name="deadline">
                            <label for="floatingInput">Thời gian hết hạn</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="status_id" id="example-select-search">
                                @foreach($task_statuses as $task_status)
                                <option value="{{$task_status->id }}">{{ $task_status->name }}</option>
                                @endforeach
                            </select>
                            <label for="example-select-search">Trạng thái công việc</label>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="rounded border p-2">
                                <span for="example-select-multi">Người theo dỗi công việc</span>
                                <select class="js-select2" name="user_id[]" multiple="multiple" style="width: 100%;">
                                    <option value="O1" data-badge="">Option1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Ghi chú</label>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('multiselect-05/js/jquery.min.js')}}"></script>
<script src="{{asset('multiselect-05/js/popper.js')}}"></script>
<script src="{{asset('multiselect-05/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js">
</script>
<script src="{{asset('multiselect-05/js/main.js')}}"></script>
@endsection
