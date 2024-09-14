<?php

namespace App\Services;

use App\Models\Attendee;
use App\Models\AttendeeProfile;
use App\Models\Company;
use App\Models\EmailPreference;
use App\Models\Role;
use App\Models\User;
use App\Models\UserEmailPreference;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function PHPUnit\Framework\throwException;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\Registered;


class AuthService
{
    public function login($data)
    {
        $user = User::with('roles')->where('email', $data['email'])->first();
        if (! $user || ! Hash::check($data['password'], $user->password)) {

            throw new Exception("invalid credentials", 401);
        }

        if (config('sanctum.delete_previous_access_tokens_on_login', false)) {
            $user->tokens()->delete();
        }

        $roles = $user->roles->pluck('slug')->all();
        $plainTextToken = $user->createToken('api-token', $roles)->plainTextToken;

        return [
            'user' => $user,
            'token' => $plainTextToken
        ];

    }
    
    public function resetPassword($data)
    {
        return Password::reset(
            $data->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => \Illuminate\Support\Str::random(60),
                ])->save();
            }
        );
    }
}
