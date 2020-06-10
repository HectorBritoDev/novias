<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $task_categories = TaskCategory::all();
        $today = Carbon::now()->format('Y-m-d');
        $tasks_completed = Task::where('user_id', auth()->user()->id)->where('status', 1)->get();
        $tasks_incompleted = Task::where('user_id', auth()->user()->id)->where('status', 0)->get();

        return view('tasks.index', compact('task_categories', 'tasks_completed', 'tasks_incompleted', 'today'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $data = request()->validate(
            [
                'title' => 'required|string|min:3|max:120',
                'description' => 'nullable|string',
                'task_category' => 'required|integer|exists:task_categories,id',
                'start_date' => 'required|date|before_or_equal:finish_date',
                'finish_date' => 'required|date|after_or_equal:start_date',

            ],
            [
                'start_date.before_or_equal' => 'La fecha de inicio no puede ser mayor a la fecha de finalizacion',
                'finish_date.after_or_equal' => 'La fecha de finalizacion no puede ser menor a la fecha de inicio',
            ]
        );
        Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'category_id' => $data['task_category'],
            'start_date' => $data['start_date'],
            'finish_date' => $data['finish_date'],
            'user_id' => auth()->user()->id,
        ]);
        toast('Tarea agregado!', 'success', 'top-right');

        return redirect()->route('task.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $task = Task::find($id);

        if ($task) {

            if ($task->user_id == auth()->user()->id) {

                $task_categories = TaskCategory::all();

                return view('tasks.edit', compact('task', 'task_categories'));
            }
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $data = request()->validate(
            [
                'title' => 'required|string|min:3|max:120',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:task_categories,id',
                'note' => 'nullable|string',
                'start_date' => 'required|date|before_or_equal:finish_date',
                'finish_date' => 'required|date|after_or_equal:start_date',

            ],
            [
                'start_date.before_or_equal' => 'La fecha de inicio no puede ser mayor a la fecha de finalizacion',
                'finish_date.after_or_equal' => 'La fecha de finalizacion no puede ser menor a la fecha de inicio',
            ]
        );

        $task = Task::find($id);
        if ($task) {

            if ($task->user_id == auth()->user()->id) {

                $task->update($data);
                alert()->success('Modificado correctamente');
                return redirect()->route('task.index');
            }
        }
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $task = Task::find($id);
        if ($task) {

            if ($task->user_id == auth()->user()->id) {

                $task->delete();
                alert()->error('Elimiando correctamente');
                return redirect()->route('task.index');
            }
        }
        return back();
    }

    public function updateStatus(Request $request, $id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $task = Task::find($id);
        if ($task) {

            if ($task->user_id == auth()->user()->id) {
                $data = request()->validate([
                    'status' => 'required|integer|between:0,1',
                ]);

                $task->update($data);

                return back();
            }
        }
        return back();
    }
}
