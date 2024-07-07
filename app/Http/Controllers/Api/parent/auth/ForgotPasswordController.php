<?php

namespace App\Http\Controllers\Api\parent\auth;

use Illuminate\Support\Str;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\adminstration\auth\ResetPasswordRequest;
use Spatie\FlareClient\Api;

class ForgotPasswordController extends Controller
{
    public function forgot(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::broker('users')->sendResetLink($valid);
        if ($status == Password::RESET_LINK_SENT) {
            return ApiResponse::sendResponse(200,__($status),[]);
        }
        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }

    public function reset(ResetPasswordRequest $request){
        $request->validated();
        $status = Password::broker('users')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );
        if($status == Password::PASSWORD_RESET){
            return ApiResponse::sendResponse(200,'Password Reset Successfully',[]);
        }
        throw ValidationException::withMessages([
            'message' => [trans($status)],

        ]);
        // return ApiResponse::sendResponse(200,__($status),[]);

    }
}
