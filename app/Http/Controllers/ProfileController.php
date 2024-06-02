<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile',
            [
                'user' => auth()->user(),
                'title' => 'Profile Page - ' . config('app.name'),
            ]);
    }

    public function process(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $validatedData = $request->validated();

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
        $user->update($validatedData);
        return redirect()->route('home')->with('success', 'Profile updated successfully');
    }
}
