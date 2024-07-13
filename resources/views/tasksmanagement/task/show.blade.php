@extends('layouts.app')

@section('content')

@extends('alert.success')
<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3>Chi tiết công việc</h3>
            </div>
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
                    <p><strong>Ngày cập nhật:</strong> {{ $task->updated_at->format('d/m/Y H:i:s') }}</p>
                    <hr>
                    <p><strong>Ghi chú:</strong> {{$task->note}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
