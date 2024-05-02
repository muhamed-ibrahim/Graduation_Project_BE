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

        if ($request->role === 'manager') {
            if (Auth::guard('school_manager')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                $manager = Auth::guard('school_manager')->user();
                if ($manager) {
                    $token = $manager->createToken('GP_project')->plainTextToken;
                    $data = [
                        'token' => $token,
                        'name' => $manager->manager_name,
                        'email' => $manager->email,
                        'role' => $manager->role,
                    ];
                    return ApiResponse::sendResponse(200, 'School manager Account Logged in Successfully', $data);
                } else {
                    return ApiResponse::sendResponse(401, "School manager not found", []);
                }
            } else {
                return ApiResponse::sendResponse(401, "Invalid credentials for school manager", []);
            }
        } elseif ($request->role === 'staff') {
            if (Auth::guard('school_staff')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                $staff = Auth::guard('school_staff')->user();
                if ($staff) {
                    $token = $staff->createToken('GP_project')->plainTextToken;
                    $data = [
                        'token' => $token,
                        'name' => $staff->staff_name,
                        'email' => $staff->email,
                        'role' => $staff->role,
                    ];
                    return ApiResponse::sendResponse(200, 'staff Account Logged in Successfully', $data);
                } else {
                    return ApiResponse::sendResponse(401, "staff not found", []);
                }
            } else {
                return ApiResponse::sendResponse(401, "Invalid credentials", []);
            }
        } else {
            return ApiResponse::sendResponse(401, "Invalid role", []);
        }
    }

    public function logout(Request $request){
        Auth::user()->currentAccessToken()->delete();
        return ApiResponse::sendResponse(200, 'Your Account Logged Out Successfully', []);

    }
}
