<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Send;
use App\Http\Requests\StoreSendRequest;
use App\Http\Requests\UpdateSendRequest;
use Illuminate\Http\Request;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sends = Send::all();
        return response()->json(['sends' => $sends], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            "sends" => 'required|array'
        ]);

        $send = Send::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'sends' => $request->input('sends'),
            'phone' => $request->input('phone'),
        ]);

        return response()->json(['category_id' => $send->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Send $send)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSendRequest $request, Send $send)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Send $send)
    {
        //
    }
}
