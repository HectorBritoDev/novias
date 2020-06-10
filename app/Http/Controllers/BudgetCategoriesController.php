<?php

namespace App\Http\Controllers;

use App\BudgetCategory;
use App\Spend;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class BudgetCategoriesController extends Controller
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

        $global_estimated = 0;
        $global_final = 0;
        $global_pay = 0;

        $categories = BudgetCategory::where('user_id', auth()->user()->id)->get();

        foreach ($categories as $category) {
            $global_estimated = $global_estimated + $category->total_estimated();
            $global_final = $global_final + $category->total_final();

            if (!empty($category->spends)) {
                foreach ($category->spends as $spend) {
                    if (!empty($spend->payment)) {

                        $global_pay = $global_pay + $spend->payment->amount;
                    }
                }
            }
        }

        return view('budgetCategories.index', compact('categories', 'global_estimated', 'global_final', 'global_pay'));
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
                'name' => 'required|string|max:190',
            ]);
        BudgetCategory::create(
            [
                'name' => $data['name'],
                'user_id' => auth()->user()->id,
            ]);
        toast('Categoria agregada!', 'success', 'top-right');

        return redirect()->route('budget.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $category = BudgetCategory::find($id);
        if ($category) {
            if ($category->user_id == auth()->user()->id) {

                $spends = Spend::where('budget_category_id', $category->id)->get();
                return view('budgetCategories.show', compact('category', 'spends'));
            }
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
                'name' => 'required|string|max:120',
            ]);
        $category = BudgetCategory::find($id);
        if ($category) {
            if ($category->user_id == auth()->user()->id) {
                $category->update($data);
                alert()->success('Modificado correctamente');

                return redirect()->route('budget.show', $category->id);
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
        $category = BudgetCategory::find($id);
        if ($category) {
            if ($category->user_id == auth()->user()->id) {

                foreach ($category->spends as $spend) {
                    $spend->payment()->delete();
                }
                $category->spends()->delete();
                $category->delete();
                alert()->error('Elimiando correctamente');
                return redirect()->route('budget.index');
            }
        }
        return back();
    }

    public function pdf()
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $global_estimated = 0;
        $global_final = 0;
        $global_pay = 0;

        $categories = BudgetCategory::where('user_id', auth()->user()->id)->get();

        foreach ($categories as $category) {
            $global_estimated = $global_estimated + $category->total_estimated();
            $global_final = $global_final + $category->total_final();

            if (!empty($category->spends)) {
                foreach ($category->spends as $spend) {
                    if (!empty($spend->payment)) {

                        $global_pay = $global_pay + $spend->payment->amount;
                    }
                }
            }
        }
        $categories = BudgetCategory::where('user_id', auth()->user()->id)->get();
        $pdf = PDF::loadView('budgetCategories.pdf',
            [
                'categories' => $categories,
                'global_estimated' => $global_estimated,
                'global_final' => $global_final,
                'global_pay' => $global_pay,
            ]);
        return $pdf->download('presupuesto.pdf');
    }

}
