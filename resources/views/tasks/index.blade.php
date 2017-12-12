@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Task</div>

                <div class="panel-body">
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Content</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td><a href="{{route('task_edit', $task->id)}}">{{ str_limit($task->name, 20) }}</a></td>
                                    <td>{{ str_limit($task->content, 40) }}</td>
                                    <td>
                                        @if ( ! $task->isCompleted)
                                        <form method="post" action="{{ route('task_complete') }}" onsubmit="return confirm('Mark this task as completed??')">
                                            <input type="hidden" name="task_id" value="{{ $task->id }}" />
                                            {{ csrf_field() }}
                                            <button class="btn btn-default btn-sm">mark complete</button>
                                        </form>
                                        @else
                                            <span class="btn btn-success">Completed</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <p>No Tasks.</p>
                            @endforelse
                            
                            
                        </tbody>
                    </table>
                    <a class="btn btn-primary btn-sm" href="{{ route('task_add') }}">Add new task</a>
                    <hr>
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection