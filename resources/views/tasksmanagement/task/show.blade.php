<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chi tiết công việc') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row mt-3">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-text">
                                        <p><strong>Tên công việc:</strong> {{ $task->title }}</p>
                                        <hr>
                                        <p><strong>Mô tả:</strong> {{ $task->description }}</p>
                                        <hr>
                                        <p><strong>Người tạo:</strong> {{ $task->createdid->name }}</p>
                                        <hr>
                                        <p><strong>Người làm việc:</strong> {{ $task->assignedid->name }}</p>
                                        <hr>
                                        <p><strong>Người theo dỗi:</strong>
                                            @if($task->followers->count())
                                            @foreach($task->followers as $follower)
                                            <span class="btn btn-sm border mb-1">{{ $follower->name }}</span>
                                            @endforeach
                                            @endif
                                            <hr>
                                        <p><strong>Trạng thái:</strong> {{ $task->status->name }}</p>
                                        <hr>
                                        <p><strong>Ngày tạo:</strong> {{ $task->created_at->format('d/m/Y H:i:s') }}</p>
                                        <hr>
                                        <p><strong>Ngày cập nhật:</strong> {{ $task->updated_at->format('d/m/Y H:i:s')
                                            }}</p>
                                        <hr>
                                        <p><strong>Ghi chú:</strong> {{$task->note}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
