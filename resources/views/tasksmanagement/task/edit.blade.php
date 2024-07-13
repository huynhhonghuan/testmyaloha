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
                Sửa đổi công việc
            </div>
            <div class="card-body">
                <div class="card-text">
                    <form action="{{route('task.update', $task->id)}}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PATCH')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="" name="title"
                                value="{{$task->title}}" required>
                            <label for="floatingInput">Tên công việc</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                name="description" style="height: 100px" required>{{$task->description}}</textarea>
                            <label for="floatingTextarea2">Mô tả công việc</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" placeholder="" name="deadline"
                                value="{{$task->deadline}}" required>
                            <label for="floatingInput">Thời gian hết hạn</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="status_id" id="example-select-search">
                                @foreach($task_statuses as $task_status)
                                <option value="{{$task_status->id }}" {{$task->status_id == $task_status->id ?
                                    'selected' : ''}}>{{ $task_status->name }}</option>
                                @endforeach
                            </select>
                            <label for="example-select-search">Trạng thái công việc</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="assigned_id" id="example-select-search" required>
                                @foreach($users as $u)
                                <option value="{{$u->id }}" {{$task->assigned_id == $u->id ?
                                    'selected' : ''}}>{{ $u->name }}</option>
                                @endforeach
                            </select>
                            <label for="example-select-search">Người làm việc</label>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="rounded border p-2">
                                <span for="example-select-multi">Người theo dỗi công việc</span>
                                <select class="js-select2" name="follower_id[]" multiple="multiple" style="width: 100%;">
                                    @foreach($users as $u)
                                        <option value="{{ $u->id }}"
                                            @if($task->followers->contains($u->id)) selected @endif>
                                            {{ $u->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                name="note" style="height: 100px">{{$task->note}}</textarea>
                            <label for="floatingTextarea2">Ghi chú</label>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Sửa đổi</button>
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
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
    })()
</script>
@endsection
