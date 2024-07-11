@extends('layouts.app')
@section('content')
<div class="toast-container position-static">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Bootstrap</strong>
            <small class="text-body-secondary">just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            See? Just like this.
        </div>
    </div>
</div>
<h1>Trạng thái công việc</h1>
<a href="{{ route('taskstatus.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
@if ($taskstatus->count())
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên trạng thái</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($taskstatus as $t)
        <tr>
            <td>{{ $t->id }}</td>
            <td>{{ $t->name }}</td>
            <td>
                <a href="{{ route('taskstatus.show', $t->id) }}" class="btn btn-info btn-sm">Xem</a>
                <a href="{{ route('taskstatus.edit', $t->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('taskstatus.destroy', $t->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Bạn muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Phân trang -->
<div class="d-flex justify-content-center">
    {{ $taskstatus->links() }}
</div>
@else
<p>Not found.</p>
@endif
@endsection
