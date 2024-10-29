@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Tasks List</h1>
        <a href="{{ route('task.create') }}" class="btn btn-primary float-right mb-3">Add New Task</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                          <a href="{{ route('task.show', $task->id) }}" class="btn btn-info">Show</a>

                            @if($task->status == 'Pending')
                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-success">Edit</a>

                                 <form action="{{ route('task.updateStatus', $task->id) }}" method="POST"style="display:inline;">
                                      @csrf
                                      @method('PATCH')
                                  <input type="hidden" name="status" value="{{ $task->status == 'Pending' ? 'Completed' : 'Pending' }}">
                                 <button type="submit"class="btn btn-success">{{ $task->status == 'Pending' ? 'Completed' : 'Pending ' }}</button>
                                </form>

                                <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tasks->links() }}
    </div>
@endsection
