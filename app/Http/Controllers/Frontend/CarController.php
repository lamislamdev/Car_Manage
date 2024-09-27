<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    function Carupdate(Request $request, $id)
    {
       $car = Car::where('id', '=' , $id)->first();
       return view('pages.carUpdate-page', compact('car'));
    }
    function carList(Request $request){
        return view('pages.carList-page');
    }

    function cerDetails(Request $request, $id)
    {
        $car = Car::where('id', '=' , $id)->first();
        return view('pages.carDetails-page', compact('car'));
    }
}
