<?php

namespace App\Http\Controllers;

use App\BudgetCategory;
use App\Payment;
use App\Spend;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        if ($request->has('0')) {
            $payments = BudgetCategory::where('user_id', auth()->user()->id)
                ->join('spends', 'budget_categories.id', '=', 'spends.budget_category_id')
                ->join('payments', 'spends.id', '=', 'payments.spend_id')
                ->where('amount', '>', '0')
                ->where('status', '=', 0)
                ->get();
        } elseif ($request->has('1')) {
            $payments = BudgetCategory::where('user_id', auth()->user()->id)
                ->join('spends', 'budget_categories.id', '=', 'spends.budget_category_id')
                ->join('payments', 'spends.id', '=', 'payments.spend_id')
                ->where('amount', '>', '0')
                ->where('status', '=', 1)
                ->get();
        } else {

            $payments = BudgetCategory::where('user_id', auth()->user()->id)
                ->join('spends', 'budget_categories.id', '=', 'spends.budget_category_id')
                ->join('payments', 'spends.id', '=', 'payments.spend_id')
                ->where('amount', '>', '0')
                ->get();
        }

        return view('payments.index', compact('payments'));

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
        $spend = Spend::find($request->input('id'));

        if ($spend) {
            if ($spend->budgetCategory->user_id == auth()->user()->id && !$spend->payment) {

                $today = Carbon::today()->format('Y-m-d');

                return view('payments.create', compact('spend', 'today'));
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

        $spend = Spend::find($request->input('spend_id'));
        if ($spend) {
            if (!$spend->payment) {
                if ($spend->budgetCategory->user_id == auth()->user()->id) {

                    $data = request()->validate(
                        [
                            'spend_id' => 'required|exists:spends,id',
                            'name' => 'required|exists:spends,name',
                            'status' => 'nullable|in:on',
                            'pay_method' => 'nullable|string',
                            'amount' => 'nullable|integer|min:0',
                            'pay_by' => 'nullable|string',
                            'pay_date' => 'nullable|date|before_or_equal:expiration_date',
                            'expiration_date' => 'required|date|after_or_equal:pay_date',
                        ],
                        [
                            'pay_date.before_or_equal' => 'La fecha de pago no puede ser superior a la fecha de expiracion',
                            'expiration_date.after_or_equal' => 'La fecha de expiracion no puede ser menor a la fecha de pago',
                        ]);
                    if (empty($data['status'])) {
                        $data['status'] = 0;
                    } else {
                        $data['status'] = 1;
                    }
                    if (empty($data['amount'])) {
                        $data['amount'] = 0;
                    }
                    $payment = Payment::create($data);
                    toast('Pago agregado!', 'success', 'top-right');

                    return redirect()->route('budget.show', $payment->spend->budgetCategory->id);
                }
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

        $payment = Payment::find($id);
        if ($payment) {
            if ($payment->spend) {
                if ($payment->spend->budgetCategory->user_id == auth()->user()->id) {
                    return view('payments.edit', compact('payment'));
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
                'status' => 'nullable|in:on',
                'pay_by' => 'nullable|string',
                'pay_method' => 'nullable|string',
                'amount' => 'nullable|integer|min:1',
                'pay_date' => 'nullable|date|before_or_equal:expiration_date',
                'expiration_date' => 'required|date|after_or_equal:pay_date',
            ],
            [
                'pay_date.before_or_equal' => 'La fecha de pago no puede ser superior a la fecha de expiracion',
                'expiration_date.after_or_equal' => 'La fecha de expiracion no puede ser menor a la fecha de pago',
            ]);
        if (empty($data['status'])) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        if (empty($data['amount'])) {
            $data['amount'] = 0;
        }
        $payment = Payment::find($id);
        if ($payment) {

            if ($payment->spend->budgetCategory->user_id == auth()->user()->id) {

                $payment->update($data);

                alert()->success('Modificado correctamente');

                return redirect()->route('budget.show', $payment->spend->budgetCategory->id);
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
        $payment = Payment::find($id);
        if ($payment) {

            if ($payment->spend->budgetCategory->user_id == auth()->user()->id) {
                $payment->delete();
                alert()->error('Elimiando correctamente');
                return redirect()->back();
            }
        }
        return back();
    }

    public function edit_alternative($id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $payment = Payment::find($id);
        if ($payment) {
            if ($payment->spend) {
                if ($payment->spend->budgetCategory->user_id == auth()->user()->id) {

                    return view('payments.edit_alternative', compact('payment'));
                }
            }
        }
        return back();
    }

    public function update_alternative(Request $request, $id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $data = request()->validate(
            [
                'status' => 'nullable|in:on',
                'pay_by' => 'nullable|string',
                'pay_method' => 'nullable|string',
                'amount' => 'nullable|integer|min:1',
                'pay_date' => 'nullable|date|before_or_equal:expiration_date',
                'expiration_date' => 'required|date|after_or_equal:pay_date',
            ],
            [
                'pay_date.before_or_equal' => 'La fecha de pago no puede ser superior a la fecha de expiracion',
                'expiration_date.after_or_equal' => 'La fecha de expiracion no puede ser menor a la fecha de pago',
            ]);
        if (empty($data['status'])) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        if (empty($data['amount'])) {
            $data['amount'] = 0;
        }
        $payment = Payment::find($id);
        if ($payment) {

            if ($payment->spend->budgetCategory->user_id == auth()->user()->id) {

                $payment->update($data);

                alert()->success('Modificado correctamente');

                return redirect()->route('payment.index');
            }
        }
        return back();
    }
}
