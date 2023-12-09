<?php

namespace App\Http\Controllers;

use App\Models\Send;
use Illuminate\Http\Request;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sends = Send::all();
        return view('Send.index', compact('sends'));
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
        $this->validate($request, [
            'name' => 'required',
            'count' => 'required',
            'price' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
                ]);
                
                $requestData = $request->all();
                Send::create($requestData);
                return redirect()->route('sends.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Send $send)
    {
        $products = $send->sends; 
        return view('Send.show', compact('send', 'products'));
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Send $send)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Send $send)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sends = Send::find($id);
        $sends->delete();
        return redirect()->route('sends.index')->with('success', "The order has been handed over to the owner!");
    }
}
