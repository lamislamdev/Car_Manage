<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{

    function addCar(Request $request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $filePath = 'cars/' . $fileName;
        $file->move(public_path('cars'), $filePath);


        Car::create([
            "name" => $request->input('car_name'),
            "brand" => $request->input('brand'),
            "model" => $request->input('model'),
            "car_type" => $request->input('car_type'),
            "year" => $request->input('year'),
            "daily_rent_price" => $request->input('daily_rent_price'),
            "availability" => $request->input('availability'),
            "image" => $filePath,
        ]);

        return back()->with('success', 'Car Added Successfully');
    }

    function allCar(Request $request)
    {
        $car = Car::all();
        return response()->json($car);
    }

    function updateCar(Request $request)
    {
        // Fetch the car record
        $car = Car::findOrFail($request->input('id')); // This will throw a 404 if the car doesn't exist

        // Prepare data to update
        $dataToUpdate = [
            "name" => $request->input('car_name'),
            "brand" => $request->input('brand'),
            "model" => $request->input('model'),
            "car_type" => $request->input('car_type'),
            "year" => $request->input('year'),
            "daily_rent_price" => $request->input('daily_rent_price'),
            "availability" => $request->input('availability'),
        ];


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Optional: Add timestamp to filename
            $filePath = 'cars/' . $fileName;
            $file->move(public_path('cars'), $filePath);


            $dataToUpdate['image'] = $filePath;
        }


        $car->update($dataToUpdate);

        return back()->with('update', 'Car Update Successfully');
    }

    function deleteCar(Request $request , $id){
        Car::where('id', '=' ,$id)->delete();
        return response()->json(['success' => 'You have successfully deleted the car.']);
    }

    function countCar(Request $request)
    {
       $car = Car::all()->count();
       $available = Car::where('availability', '=', 1)->count();
       $rental = Car::where('availability', '=', 0)->count();
       return response()->json(['car'=>$car ,'available'=>$available, 'rental'=>$rental ]);
    }

    public function car(Request $request)
    {
        try {
            // Get car type from request
            $carType = $request->input('car_type');

            // Fetch cars based on the car type if provided
            if ($carType) {
                $cars = Car::where('car_type', '=', $carType)->get();
            } else {
                $cars = Car::all();
            }

            return response()->json(["car" => $cars], 200);
        } catch (\Exception $e) {
            // Log the error if needed
            // Log::error($e);

            return response()->json(["error" => "Unable to fetch cars"], 500);
        }
    }



}
