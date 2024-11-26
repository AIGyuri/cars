<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $cars = Car::with('owner')->get();
        return response ()->json($cars);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        validator($request->all(), [
            'name' => 'required',
            'model' => 'required',
            'license_plate' => 'required',
            'owner_id' => 'required|exists:owners,id'
        ]);
        $car = Car::create($request->all());
        return response()->json($car, status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        $car = Car::with('owner')->find($id);

        if (!$car) {
            return response()->json(
                ['message' => 'Car not found'],
            );
        }
        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //

        $request -> validate( [
            'name' => 'string',
            'model' => 'string',
            'license_plate' => 'string',
            'owner_id' => 'exists:owners,id' 
        ]);
            $car = Car::find($id);

            if (!$car) {
                return response()->json(
                    ['message' => 'Car not found'], status: 404
                );
            }

            $car->update($request->all());
            return response()->json($car);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $car = Car::find($id);
        if (!$car) {
            return response()->json(
                ['message' => 'Car not found'], status: 404
            );
        }
        $car->delete();
        return response()->json(['message' => 'Car delete successfully'], status: 204);


    }
}
