<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService {

    public function login(string $email, string $password, bool $remember): bool
    {
        if (Auth::attempt(["email" => $email, "password" => $password], $remember))
        {
            try {
                $user = User::query()
                    ->where('email', $email)
                    ->firstOrFail();

                Auth::login($user, $remember);

                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

        return false;
    }
}
