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
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="" name="name">
                            <label for="floatingInput">Tên người dùng</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="" name="email">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="role_id" id="example-select-search">
                                @foreach($role as $rl)
                                <option value="{{$rl->id }}">{{ $rl->name }}</option>
                                @endforeach
                            </select>
                            <label for="example-select-search">Trạng thái công việc</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput" placeholder=""
                                name="password">
                            <label for="floatingInput">Mật khẩu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput" placeholder=""
                                name="password_confirmation">
                            <label for="floatingInput">Xác nhận mật khẩu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="is_active">
                                <label class="custom-control-label" for="customCheck1">Kích hoạt</label>
                            </div>
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
