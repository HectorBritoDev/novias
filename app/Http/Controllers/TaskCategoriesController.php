<?php

namespace App\Http\Controllers;

use App\TaskCategory;
use Illuminate\Http\Request;

class TaskCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $task_categories = TaskCategory::all();
        return view('taskCategories.index', compact('task_categories'));
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

        $data = request()->validate([
            'name' => 'required|max:120',

        ]);
        TaskCategory::create($data);
        toast('Categoria agregada!', 'success', 'top-right');

        return redirect()->route('taskCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $task_category = TaskCategory::find($id);
        return view('taskCategories.edit', compact('task_category'));
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

        $data = request()->validate([
            'name' => 'required|max:120',
        ]);
        $task_category = TaskCategory::find($id);
        $task_category->update($data);
        alert()->success('Modificado correctamente');

        return redirect()->route('taskCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $task_category = TaskCategory::find($id);
        $task_category->delete();
        alert()->error('Elimiando correctamente');

        return redirect()->route('taskCategory.index');
    }
}
