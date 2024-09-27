<?php
namespace App\Http\Controllers\Admin;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    public function booking(Request $request)
    {

        $car = Car::where('id', $request->input('id'))->first();

        if (!$car) {
            return response()->json(['status' => 'error', 'message' => 'Car not found'], 404);
        }


        $start_date = Carbon::parse($request->input('start_date'));
        $end_date = Carbon::parse($request->input('end_date'));


        if ($start_date->isPast()) {
            return response()->json(['status' => 'error', 'message' => 'Start date cannot be in the past. Please select today or a future date.'], 400);
        }

        if ($start_date->greaterThanOrEqualTo($end_date)) {
            return response()->json(['status' => 'error', 'message' => 'End date must be after the start date.'], 400);
        }


        $email = JWTToken::decodeJWT($request->cookie('token'));
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }


        $days = $start_date->diffInDays($end_date);
        $total = $car->daily_rent_price * $days;


        $rental = Rental::create([
            'user_id' => $user->id,
            'car_id' => $car->id,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'total_cost' => $total,
        ]);


        $invoice = Rental::find($rental->id);


        $admin = User::where('role', 'admin')->first();


        if ($admin) {
            Mail::to($admin->email)->send(new InvoiceMail(
                $user->name,
                $email,
                $user->phone,
                $user->address,
                $request->input('start_date'),
                $request->input('end_date'),
                $total,
                $car->name,
                $invoice->id
            ));
        }

        Mail::to($email)->send(new InvoiceMail(
            $user->name,
            $email,
            $user->phone,
            $user->address,
            $request->input('start_date'),
            $request->input('end_date'),
            $total,
            $car->name,
            $invoice->id
        ));


        return response()->json(['status' => 'success'], 201);
    }
}
