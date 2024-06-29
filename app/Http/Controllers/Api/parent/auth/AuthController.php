<?php

namespace App\Http\Controllers\Api\parent\auth;

use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\parent\ParentResource;
use App\Http\Requests\parent\auth\LoginRequest;
use App\Http\Requests\parent\auth\RegisterRequest;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {


        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            if ($user) {
                $token = $user->createToken('GP_project')->plainTextToken;
                $data = [
                    'token' => $token,
                    'name' => $user->name,
                    'email' => $user->email,
                ];
                return ApiResponse::sendResponse(200, 'Parent Account Logged in Successfully', $data);
            } else {
                return ApiResponse::sendResponse(401, "Parent not found", []);
            }
        } else {
            return ApiResponse::sendResponse(401, "Invalid credentials", []);
        }
    }

    // register parent
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $user->nationality = $request->nationality;
        $user->job = $request->job;
        $user->religion = $request->religion;
        $user->lat = $request->lat;
        $user->lng = $request->lng;
        if ($request->hasFile('national_id_image')) {
            $file = $request->file('national_id_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/parents/', $filename);
            $user->national_id_image = $filename;
        }
        $user->save();
        if ($user) {
            $token = $user->createToken('GP_project')->plainTextToken;
            $data = [
                'token' => $token,
                'parent' => new ParentResource($user),
            ];


            return ApiResponse::sendResponse(201, 'Parent Account Created Successfully', $data);
        } else {
            return ApiResponse::sendResponse(401, "Parent not found", []);
        }
    }

    public function logout(Request $request){
        Auth::user()->currentAccessToken()->delete();
        $user = Auth::user();
        $user->last_login = now()->toRfc850String();
        $user->save();
        return ApiResponse::sendResponse(200, 'parent Account Logged Out Successfully', []);

    }
}
