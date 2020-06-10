<?php

namespace App\Http\Controllers;

use App\BudgetCategory;
use App\Payment;
use App\Spend;
use Illuminate\Http\Request;

class SpendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!auth()->user()->is_user) {
            return back();
        }

        $category = BudgetCategory::find($request->input('id'));
        if ($category) {
            if ($category->user_id == auth()->user()->id) {

                $category_id = $category->id;
                return view('spends.create', compact('category_id'));
            }
        }
        return back();
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
        $category = BudgetCategory::find($request->input('budget_category_id'));
        if ($category) {
            if ($category->user_id == auth()->user()->id) {

                $data = request()->validate(
                    [
                        'name' => 'required|string',
                        'estimated_cost' => 'nullable|integer',
                        'final_cost' => 'nullable|integer',
                        'budget_category_id' => 'required|integer|exists:budget_categories,id',

                    ]);
                if ($data['estimated_cost'] == null) {
                    $data['estimated_cost'] = 0;
                }
                if ($data['final_cost'] == null) {
                    $data['final_cost'] = 0;
                }

                $spend = Spend::create($data);

                Payment::create(
                    [
                        'name' => $spend->name,
                        'spend_id' => $spend->id,
                        'expiration_date' => today(),
                    ]);
                toast('Gasto agregado!', 'success', 'top-right');
                return redirect()->route('budget.show', $data['budget_category_id']);
            }
        }
        return back();
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
    public function edit(Request $request, $id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }

        $category = BudgetCategory::find($request->input('id'));
        if ($category) {
            if ($category->user_id == auth()->user()->id) {

                $category_id = $category->id;
                $spend = Spend::find($id);
                if ($spend) {
                    if ($spend->budgetCategory->user_id == auth()->user()->id) {

                        return view('spends.edit', compact('spend', 'category_id'));
                    }
                }
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
                'name' => 'required|string|max:190',
                'estimated_cost' => 'nullable|integer|min:0',
                'final_cost' => 'nullable|integer|min:0',
                'budget_category_id' => 'required|integer|exists:budget_categories,id',

            ]
        );
        if ($data['estimated_cost'] == null) {
            $data['estimated_cost'] = 0;
        }
        if ($data['final_cost'] == null) {
            $data['final_cost'] = 0;
        }
        $spend = Spend::find($id);
        if ($spend) {
            if ($spend->budgetCategory->user_id == auth()->user()->id) {

                $spend->update($data);

                if ($spend->payment) {
                    $spend->payment->update(['name' => $data['name']]);
                }

                alert()->success('Modificado correctamente');
                return redirect()->route('budget.show', $data['budget_category_id']);
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
        $spend = Spend::find($id);
        if ($spend) {
            if ($spend->budgetCategory->user_id == auth()->user()->id) {

                $spend->payment()->delete();
                $spend->delete();
                alert()->error('Elimiando correctamente');

                return redirect()->back();
            }
        }
        return back();
    }
}
