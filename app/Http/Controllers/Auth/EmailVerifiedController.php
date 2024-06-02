<?php

namespace App\Http\Controllers\Auth;

use App\Enums\PasswordResetTokenEnum;
use App\Enums\PasswordResetTokenStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailVerifiedRequest;
use App\Models\PasswordResetToken;
use App\Models\User;

class EmailVerifiedController extends Controller
{
    public function __invoke(EmailVerifiedRequest $request)
    {
        $statusEmailVerified = false;
        $email = $request->get('email');
        $token = $request->get('token');
        $isFilledInformation = false;

        $verifyCode = PasswordResetToken::query()
            ->where('token', $token)
            ->where('email', $email)
            ->where('status', PasswordResetTokenStatusEnum::PENDING)
            ->first();
        if ($verifyCode) {
            $verifyCode->status = PasswordResetTokenStatusEnum::VERIFIED;
            $verifyCode->save();

            $user = User::query()->where('email', $email)->first();
            $user->email_verified_at = now();
            $user->save();

            $statusEmailVerified = true;
        }

        return view('user.auth.email_verified',
            [
                'title' => 'Xác thực email - ' . config('app.name'),
                'statusEmailVerified' => $statusEmailVerified,
            ]
        );
    }
}
