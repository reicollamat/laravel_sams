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
            'guards' => $guard->all(),
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'locations_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255', 'unique:'.Location::class],
        
        ]);

        Guard::create([
            'locations_name' => $request->locations_name,
            'address' => $request->address,
            'users_id' => 1 // for testing purposes
        ]);

        $status = 'Guards Added!';

        return redirect('/securityguard/add')->with('status',$status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guard  $guard
     * @return \Illuminate\Http\Response
     */
    public function show(Guard $guard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guard  $guard
     * @return \Illuminate\Http\Response
     */
    public function edit(Guard $guard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guard  $guard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guard $guard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guard  $guard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guard $guard)
    {
        //
    }
}
