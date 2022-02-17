@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <tr>
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink('title', 'Title')</th>
            <th>@sortablelink('description', 'Description')</th>
            <th>@sortablelink('status_id', 'Status')</th>
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
    {!!$tasks->appends(Request::except('page'))->render()!!}
</div>
@endsection