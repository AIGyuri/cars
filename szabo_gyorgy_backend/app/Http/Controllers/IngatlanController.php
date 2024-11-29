<?php

namespace App\Http\Controllers;

use App\Models\Ingatlan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IngatlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ingatlan = Ingatlan::with('kategoria')->get();
        return response()->json($ingatlan, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
            validator ($request->all(), [
                'nev' => 'required',
                'leiras' => 'required',
                'hirdetesDatuma' => 'required',
                'tehermentes' => 'required',
                'ar' => 'required',
                'kepUrl' => 'required',
                'kategoria' => 'required|exists:kategoriak,id'
            ]);
            $ingatlanok = Ingatlan::create($request->all());
            return response()->json($ingatlanok, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
