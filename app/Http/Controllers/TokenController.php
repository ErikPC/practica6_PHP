<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;

class TokenController extends Controller
{
    /**
     * Generate a new token for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateToken(Request $request)
    {

        $token = $request->user()->generateToken();

        return response()->json([
            'token' => $token
        ]);
    }
}
