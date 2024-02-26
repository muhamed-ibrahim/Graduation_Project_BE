<?php

namespace App\Http\Controllers\Api\adminstration\auth;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\adminstration\auth\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        if (Auth::guard('adminstration_admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $adminstration = Auth::guard('adminstration_admin')->user();
            if ($adminstration) {
                $token = $adminstration->createToken('GP_project')->plainTextToken;
                $data = [
                    'token' => $token,
                    'name' => $adminstration->name,
                    'email' => $adminstration->email,
                ];
                return ApiResponse::sendResponse(200, 'adminstration Account Logged in Successfully', $data);
            } else {
                return ApiResponse::sendResponse(401, "adminstration not found", []);
            }
        } else {
            return ApiResponse::sendResponse(401, "Invalid credentials", []);
        }
    }

    public function logout(Request $request){
        Auth::user()->currentAccessToken()->delete();
        return ApiResponse::sendResponse(200, 'adminstration Account Logged Out Successfully', []);

    }
}
