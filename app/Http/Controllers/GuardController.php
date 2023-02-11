<?php

namespace App\Http\Controllers;

use App\Models\Guard;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class GuardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Guard $guard)
    {
        // dd($request->user()->id);
        // dd($guard->all());
        return view('admintab/addsecurity/index', [
            'guards' => $guard->all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Guard $guard)
    {
        return view('admintab/addsecurity/addguard', [
            'guards' => $guard::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:1'],
            'address' => ['required', 'string', 'max:191'],
            'nbi_clearance_id' => ['required', 'string', 'max:21'],
            'phone_number' => ['required', 'string', 'max:11'],
            'educational_attainment' => ['required', 'string', 'max:255'],
            'lesp_id' => ['required', 'string', 'max:255'],
            'sss' => ['required', 'string', 'max:14'],
            'agency_affiliation_date' => ['required', 'string', 'max:255'],
            'nbi_issued_date' => ['required', 'string', 'max:255'],

        ]);

        Guard::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'sex' => $request->sex,
            'address' => $request->address,
            'nbi_clearance_id' => $request->nbi_clearance_id,
            'phone_number' => $request->phone_number,
            'educational_attainment' => $request->educational_attainment,
            'lesp_id' => $request->lesp_id,
            'sss' => $request->sss,
            'agency_affiliation_date' => $request->agency_affiliation_date,
            'nbi_issued_date' => $request->nbi_issued_date,
        ]);

        $status = 'Guards Added!';

        return redirect('/securityguard/add')->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Guard $guard
     * @return \Illuminate\Http\Response
     */
    public function show(Guard $guard, $guard_id)
    {
        $guards = Guard::find($guard_id);
//        dd($guards->birthdate);

        return view('admintab/addsecurity/viewguard', [

            'guards' => compact('guards'),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Guard $guard
     * @return \Illuminate\Http\Response
     */
    public function edit(Guard $guard, $guard_id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Guard $guard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guard $guard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Guard $guard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guard $guard)
    {
        //
    }
}
