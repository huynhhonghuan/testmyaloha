@extends('layouts.app')

@section('content')

@extends('alert.success')
<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Danh sách công việc
            </div>
            <div class="card-body">
                <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                @if ($tasks->count())
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên công việc</th>
                            <th>Mô tả công việc</th>
                            <th>Ngày hết hạn</th>
                            <th>Người làm việc</th>
                            <th>Người theo dỗi</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $t->title }}</td>
                            <td>{{ $t->description }}</td>
                            <td>{{ $t->deadline }}</td>
                            <td>{{ $t->user->name }}</td>
                            <td>
                                @foreach ($t->followers as $follower)
                                    <button class="rounded border border-info mb-1">{{ $follower->name }}</button>
                                @endforeach
                            </td>
                            <td>{{ $t->status->name }}</td>
                            <td>{{ $t->note }}</td>
                            <td>
                                <a href="{{ route('task.show', $t->id) }}" class="btn btn-info btn-sm">Xem</a>
                                <a href="{{ route('task.edit', $t->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('task.destroy', $t->id) }}" method="POST"
                                    style="display:inline;">
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

                <!-- Phân trang links sử dụng Bootstrap CSS -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $tasks->links('pagination::bootstrap-5') }}
                </div>
                @else
                <p>Dữ liệu rỗng.</p>
                @endif
            </div>

        </div>
    </div>
</div>

@endsection
