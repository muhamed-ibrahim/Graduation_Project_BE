<?php

namespace App\Http\Controllers\Api\parent\auth;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;


use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class PasswordController extends Controller
{
    public function updatePassword(Request $request){
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        return ApiResponse::sendResponse('200','Password Updated Successfully',[]);

    }
}
