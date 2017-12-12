@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Existed Task</div>

                <div class="panel-body">
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Whoop!! Something went wrong.</h4>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{ route('task_save') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="task_id" value="{{ $task->id }}" />
                        <div class="form-group">
                            <label for="taskName">Task name</label>
                            <input type="text" name="name" class="form-control" id="taskName" placeholder="Task name" value="{{ $task->name }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" id="content" rows="4" style="resize: vertical">{{ $task->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('tasks') }}" class="btn btn-default">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
