<?php

namespace App\Http\Controllers;

use App\Models\Completed;
use App\Models\Send;
use Illuminate\Http\Request;

class CompletedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sends = Send::where('status', 1)->get();
        return view('Completed.index', compact('sends'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Completed $completed)
    {
        return 2;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Completed $completed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Completed $completed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Completed $completed)
    {
        //
    }
}
