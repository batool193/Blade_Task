@extends('layouts.layout')

@section('content')
    <div class="container">
    @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Edit Task</h1>
         <a href="{{ url('task') }}" class="btn btn-danger float-right mb-3">Back</a>
        <form action="{{ route('task.update', $task->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $task->title }}" >
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $task->status }}" >
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
@endsection
