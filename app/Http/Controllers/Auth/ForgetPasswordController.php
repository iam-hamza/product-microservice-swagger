<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordResetRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function sendResetLinkEmail(Request $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return ApiResponse::success('Email Sent');
        }else{
            return ApiResponse::error('There is some issue sending the email',422,__($status));
        }

    }


    public function reset(PasswordResetRequest $request)
    {
        $status = $this->authService->resetPassword($request);

        if ($status === Password::PASSWORD_RESET) {
            return ApiResponse::success('Password successfully reset.');
        } else {
            return ApiResponse::error('There is some issue',400,__($status));
        }
    }


}
