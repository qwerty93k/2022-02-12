@extends('layouts.app')

@section('content')
<div class="container">
    {{--SORT--}}
    <form method="GET" action="{{route('task.index')}}" >
        @csrf
        <select name="sortColumn">
            @foreach ($select_array as $key => $item)
                @if($item == $sortColumn || ($key == 0 && empty($sortColumn)) )
                    <option value="{{$item}}" selected>{{$item}}</option>
                @else
                    <option value="{{$item}}">{{$item}}</option>
                @endif
            @endforeach
        </select>
        <select name="sortOrder">
            @if($sortOrder == 'asc' || empty($sortOrder))
                <option value="asc" selected>Ascending</option>
                <option value="desc">Descending</option>
            @else
                <option value="asc">Ascending</option>
                <option value="desc" selected>Descending</option>
            @endif
        </select>
        <button type="submit" class="btn btn-primary">Sort</button>
    </form>
    {{--FILTER--}}
    <form method="GET" action="{{route('task.indexfilter')}}">
        @csrf
        <select name="status_id">
        @foreach ($taskstatuses as $taskstatus)
            <option value="{{$taskstatus->id}}">{{$taskstatus->title}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
    
    <a href="{{route('task.index')}}" class="btn btn-secondary" type="submit">Clear Filter</a>

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
    {!!$tasks->appends(Request::except('page'))->render()!!}
</div>
@endsection