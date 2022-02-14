<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\PaginationSetting;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortColumn = $request->sortColumn;
        $sortOrder = $request->sortOrder;
        $taskstatuses = TaskStatus::orderBy('id', 'asc')->get();

        $page_limit = $request->page_limit;
        $paginationSettings = PaginationSetting::where('visible', '=', 1)->get();

        $task_item = Task::all();
        $task_columns = array_keys($task_item->first()->getAttributes());

        if (empty($sortColumn) and empty($sortOrder)) {
            $tasks = Task::paginate($page_limit);
        } else {
            if ($page_limit == 1) {
                $tasks = Task::orderBy($sortColumn, $sortOrder)->get();
            } else {
                $tasks = Task::orderBy($sortColumn, $sortOrder)->paginate($page_limit);
            }
        }

        $select_array = $task_columns;

        return view('task.index', [
            'tasks' => $tasks,
            'sortColumn' => $sortColumn,
            'sortOrder' => $sortOrder,
            'select_array' => $select_array,
            'taskstatuses' => $taskstatuses,
            'paginationSettings' => $paginationSettings,
            'page_limit' => $page_limit
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }

    public function indexFilter(Request $request)
    {
        $status_id = $request->status_id;
        $taskstatuses = TaskStatus::orderBy('id', 'asc')->get();

        $page_limit = $request->page_limit;
        $paginationSettings = PaginationSetting::where('visible', '=', 1)->get();

        $tasks = Task::where('status_id', '=', $status_id)->paginate($page_limit);
        return view('task.indexfilter', [
            'tasks' => $tasks,
            'taskstatuses' => $taskstatuses,
            'paginationSettings' => $paginationSettings,
            'page_limit' => $page_limit
        ]);
    }
}
