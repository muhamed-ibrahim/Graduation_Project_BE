<?php

namespace App\Http\Controllers\Api\school\auth;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\school\auth\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        if (Auth::guard('school_manager')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $manager = Auth::guard('school_manager')->user();
            if ($manager) {
                $token = $manager->createToken('GP_project')->plainTextToken;
                $data = [
                    'token' => $token,
                    'name' => $manager->manager_name,
                    'email' => $manager->email,
                ];
                return ApiResponse::sendResponse(200, 'school manager Account Logged in Successfully', $data);
            } else {
                return ApiResponse::sendResponse(401, "school manager not found", []);
            }
        } else {
            return ApiResponse::sendResponse(401, "Invalid credentials", []);
        }
    }

    public function logout(Request $request){
        Auth::user()->currentAccessToken()->delete();
        return ApiResponse::sendResponse(200, 'school manager Account Logged Out Successfully', []);

    }
}
