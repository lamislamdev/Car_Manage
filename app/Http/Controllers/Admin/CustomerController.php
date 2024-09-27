<?php

namespace App\Http\Controllers\Admin;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    function allUser(request $request)
    {
        $user = User::all();
        return response()->json($user);
    }

    function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'number' => 'required|string|max:15',
            'address' => 'required|string'
        ]);
        DB::table('users')->insert($request->all());
        return response()->json(["message" => "Registration Successful"], 201);
    }

    function login(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=' ,$email)->where( 'password' , '=' ,$password)->first();
        if ($user !== null){
            $token = JWTToken::createJWT($user->email);
            $role = $user->role;
            return response()->json(["role"=>$role,"message"=>"Login Successful"], 200)->cookie('token', $token , 1440);
        }else{
            return response()->json(["message"=>"Login Fail"], 401);
        }

    }

    function edit(Request $request){

            $email = JWTToken::decodeJWT($request->cookie('token'));
            User::where('email', '=' ,$email)->update($request->all());

            return response()->json(["status"=>"done","message"=>"Update Successful"], 200);

    }

    function profile(Request $request)
    {
        $email = JWTToken::decodeJWT($request->cookie('token'));
        $data = User::where('email', '=' ,$email)->first();
        return response()->json(["data"=>$data],200);

    }

    function logout(Request $request)
    {
        $token = $request->cookie('token');
        return redirect('/login')->cookie('token', null, -1);
    }

    function deleteUser(Request $request , $id){
        User::where('id', '=' ,$id)->delete();
        return response()->json(['status' => 'success'], 200);
    }

    function orderList(Request $request)
    {
        $email = JWTToken::decodeJWT($request->cookie('token'));
        $user = User::where('email', '=' ,$email)->first();

           $Oh = Rental::where('user_id', '=' ,$user->id)->get();

           return response()->json(["history"=>$Oh],200);


    }

    public function orderc(Request $request, $id) {

        $email = JWTToken::decodeJWT($request->cookie('token'));

        $user = User::where('email', $email)->first();


        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }

        $userId = $user->id;


        $rentalUpdated = Rental::where('user_id', $userId)
            ->where('id', $id)
            ->update(['status' => 'canceled']);


        if ($rentalUpdated) {
            return response()->json(['status' => 'success'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Order not found or already canceled'], 404);
        }
    }


}
