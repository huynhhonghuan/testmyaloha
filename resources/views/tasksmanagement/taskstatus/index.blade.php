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
                                {{-- <a href="{{ route('taskstatus.show', $t->id) }}"
                                    class="btn btn-info btn-sm">Xem</a> --}}
                                <a href="{{ route('taskstatus.edit', $t->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('taskstatus.destroy', $t->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete"
                                        onclick="return false;">Xóa</button>
                                </form>

                                @include('alert.confirm-modal')

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
            </div>

        </div>
    </div>
</div>

@endsection
