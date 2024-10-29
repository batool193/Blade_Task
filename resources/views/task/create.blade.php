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
        <h1>Add New Task</h1>
        <a href="{{ url('task') }}" class="btn btn-danger float-right mb-3">Back</a>
        <form action="{{ route('task.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
    </div>
@endsection
