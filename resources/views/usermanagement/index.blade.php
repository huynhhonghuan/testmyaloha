@extends('layouts.app')

@section('content')

@extends('alert.success')
<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Danh sách trạng thái công việc
            </div>
            <div class="card-body">
                <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                @if ($users->count())
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->name }}</td>
                            <td>{{ $t->email }}</td>
                            <td>{{ $t->role->name }}</td>
                            <td>
                                <button type="button"
                                    class="btn btn-sm {{ $t->status == 1 ? 'btn-success' : 'btn-warning' }}">{{
                                    $t->status == 1
                                    ? 'Hoạt động' : 'Không hoạt động' }}</button>
                            </td>
                            <td>
                                {{-- <a href="{{ route('user.show', $t->id) }}" class="btn btn-info btn-sm">Xem</a> --}}
                                <a href="{{ route('user.edit', $t->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('user.destroy', $t->id) }}" method="POST"
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
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
                @else
                <p>Not found.</p>
                @endif
            </div>

        </div>
    </div>
</div>

@endsection
