@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
        </tr>

        @foreach ($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->title}}</td>
            <td>{{$task->description}}</td>
            <td>{{$task->taskStatus->title}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection