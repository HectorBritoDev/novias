<?php

namespace App\Http\Controllers;

use App\ProviderRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProviderRequestsController extends Controller
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
        $provider_requests = ProviderRequest::where('for', auth()->user()->id)->paginate(10);
        $i = 0;
        return view('providerRequests.index', compact('provider_requests', 'i'));
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
        if (auth()->user()->is_user) {

            $data = request()->validate(
                [
                    'for' => 'required|integer|exists:users,id',
                    'applicant_name' => 'required|string|min:2|max:120',
                    'applicant_email' => 'required|email',
                    'applicant_phone' => 'required|integer|regex:/[0-9]{10}/',
                    'applicant_date' => 'required|date',
                    'applicant_guests_number' => 'required|integer',
                    'applicant_comment' => 'required|string|min:10',
                ],
                [
                    'applicant_phone.integer' => 'El número de teléfono es inválido',
                    'applicant_guests_number.integer' => 'El número de invitados es inválido',
                ]);
            ProviderRequest::create(
                [
                    'user_id' => auth()->user()->id,
                    'for' => $data['for'],
                    'applicant_name' => $data['applicant_name'],
                    'applicant_email' => $data['applicant_email'],
                    'applicant_phone' => $data['applicant_phone'],
                    'applicant_date' => $data['applicant_date'],
                    'applicant_guests_number' => $data['applicant_guests_number'],
                    'applicant_comment' => $data['applicant_comment'],
                ]);

        }

        if (auth()->user()->is_admin) {
            $data = request()->validate(
                [
                    'for' => 'required|integer|exists:users,id',
                    'applicant_name' => 'required|string|min:2|max:120',

                    'applicant_comment' => 'required|string|min:5',
                ]);
            ProviderRequest::create(
                [
                    'user_id' => auth()->user()->id,
                    'for' => $data['for'],
                    'applicant_name' => $data['applicant_name'],

                    'applicant_date' => Carbon::now()->format('Y-m-d'),
                    'applicant_comment' => $data['applicant_comment'],
                ]);

        }

        alert()->success('Solicitud enviada correctamente');
        return redirect()->route('user.show', $data['for'] . '?provider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->is_provider) {
            return back();
        }

        $provider_request = ProviderRequest::find($id);
        if ($provider_request) {
            if ($provider_request->for == auth()->user()->id) {

                return view('providerRequests.show', compact('provider_request'));
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
        //
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
        //
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

        $provider_request = ProviderRequest::find($id);
        if ($provider_request) {
            if ($provider_request->for == auth()->user()->id) {

                $provider_request->delete();
                alert()->error('Elimiando correctamente');
                return redirect()->route('request.index');
            }
        }
        return back();
    }
}
