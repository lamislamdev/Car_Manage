<?php

namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function createJWT($email)
    {
        $key = env('JWT_KEY');
        $payload = [
            "iss"=>"token",
            "iat"=>time(),
            "exp"=>time() + 3601*24,
            "email"=>$email

        ];
        return JWT::encode($payload , $key , 'HS256');
    }

    public static function decodeJWT($token){
        $key = env('JWT_KEY');
        $decoded = JWT::decode($token,  new Key($key, 'HS256'));
        return $decoded->email;
    }
}
