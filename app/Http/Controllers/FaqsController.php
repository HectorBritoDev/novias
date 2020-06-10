<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->is_provider) {
            return back();
        }
        $faqs = Faq::where('user_id', auth()->user()->id)->get();
        return view('faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->is_provider) {
            return back();
        }
        $data = request()->validate(
            [
                'question' => 'required|string|min:10|max:150',
                'answer' => 'required|string|min:2|max:190',
            ]);
        Faq::create(
            [
                'question' => $data['question'],
                'answer' => $data['answer'],
                'user_id' => auth()->user()->id,
            ]);
        toast('Grupo agregado!', 'success', 'top-right');

        return redirect()->route('faq.index');
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
        if (!auth()->user()->is_provider) {
            return back();
        }
        $data = request()->validate(
            [
                'question' => 'required|string|min:10|max:150',
                'answer' => 'required|string|min:2|max:190',
            ]);
        $faq = Faq::find($id);
        if ($faq) {
            if ($faq->user_id == auth()->user()->id) {

                $faq->update($data);
                alert()->success('Modificado correctamente');

                return redirect()->route('faq.index');
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
        if (!auth()->user()->is_provider) {
            return back();
        }
        $faq = Faq::find($id);
        if ($faq) {
            if ($faq->user_id == auth()->user()->id) {

                $faq->delete();
                alert()->error('Elimiando correctamente');
                return redirect()->back();
            }
        }
        return back();
    }
}
