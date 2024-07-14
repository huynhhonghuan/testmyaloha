<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách công việc') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                            @if ($tasks->count())
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên công việc</th>
                                        <th>Mô tả công việc</th>
                                        <th width="10%">Ngày hết hạn</th>
                                        <th>Người tạo việc</th>
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
                                        <td>{{ $t->createdid->name }}</td>
                                        <td>{{ $t->assignedid->name }}</td>
                                        <td>
                                            @foreach ($t->followers as $follower)
                                            <button class="rounded border border-info mb-1">{{ $follower->name
                                                }}</button>
                                            @endforeach
                                        </td>
                                        <td>
                                            <select name="" id="" class="task-status-select" data-task-id={{$t->id}}>
                                                @foreach ($taskstatus as $item)
                                                <option value="{{$item->id}}" {{$item->id == $t->status_id ? 'selected'
                                                    :
                                                    ''}}>{{$item->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{{ $t->note }}</td>
                                        <td>
                                            <a href="{{ route('task.show', $t->id) }}"
                                                class="btn btn-info btn-sm mb-1">Xem</a>
                                            <a href="{{ route('task.edit', $t->id) }}"
                                                class="btn btn-warning btn-sm mb-1">Sửa</a>
                                            <form action="{{ route('task.destroy', $t->id) }}" method="POST"
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
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.task-status-select').on('change', function() {
                var taskId = $(this).data('task-id');
                var statusId = $(this).val();

                $.ajax({
                    url: '{{ route('update.status') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        task_id: taskId,
                        status_id: statusId
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Status updated successfully');
                        } else {
                            alert('Failed to update status');
                        }
                    },
                    error: function(xhr) {
                        alert('An error occurred');
                    }
                });
            });
        });
    </script>
</x-app-layout>
