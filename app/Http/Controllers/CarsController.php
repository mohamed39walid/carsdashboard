<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Types\Relations\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Cars::all();
        return view('dashboard.dashboard', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.createcar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'images' => 'required|string',  // Validate as a string (comma-separated URLs)
            'model_year' => 'required|integer',
            'max_speed' => 'required|numeric',
            'torque' => 'required|numeric',
            'no_of_horses' => 'required|integer',
        ]);
    
        // Handle the images input
        // Split the string into an array if you want to store them as separate URLs
        $imageUrls = explode(',', $request->images);  // Split the URLs by commas
    
        // Remove any extra spaces from the URLs
        $imageUrls = array_map('trim', $imageUrls);
    
        // Create a new Car record in the database
        Cars::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'price' => $request->price,
            'images' => json_encode($imageUrls),  // Store images as a JSON-encoded array
            'model_year' => $request->model_year,
            'max_speed' => $request->max_speed,
            'torque' => $request->torque,
            'no_of_horses' => $request->no_of_horses,
        ]);
    
        // Redirect the user back to the cars list with a success message
        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }
    



    public function edit(Cars $car)
    {

        return view('dashboard.editcar',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'model_year' => 'required|integer',
            'max_speed' => 'required|numeric',
            'torque' => 'required|numeric',
            'no_of_horses' => 'required|integer',
            'images' => 'nullable|string', // Optional, but should be a comma-separated string of URLs
        ]);

        // Find the car by ID
        $car = Cars::findOrFail($id);

        // Update the car details
        $car->name = $request->input('name');
        $car->company_name = $request->input('company_name');
        $car->price = $request->input('price');
        $car->model_year = $request->input('model_year');
        $car->max_speed = $request->input('max_speed');
        $car->torque = $request->input('torque');
        $car->no_of_horses = $request->input('no_of_horses');

        // Handle the images (optional)
        $images = $request->input('images');
        if ($images) {
            // Ensure the input is a comma-separated string and then convert it to an array
            $car->images = json_encode(array_map('trim', explode(',', $images)));
        }

        // Save the car
        $car->save();

        // Redirect back to the cars list with a success message
        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
