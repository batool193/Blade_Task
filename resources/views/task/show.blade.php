@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Task Info</h1>
                 <a href="{{ url('task') }}" class="btn btn-danger float-right mb-3">Back</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Assignee</th>
                </tr>
            </thead>
            <tbody>

                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>{{ $task->assignee ? $task->assignee->name : 'Unassigned' }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection
