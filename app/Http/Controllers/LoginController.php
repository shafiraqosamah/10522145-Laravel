<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        
        $existingUser = User::where('email', $user->email)
            ->where('role', 'Admin')
            ->first();

        if (!empty($existingUser)) {
            $existingUser->update([
                'google_id' => $user->id,
                'name' => $user->name,
                'avatar' => $user->avatar,
            ]);
            
            Auth::login($existingUser);
            
            return redirect('/');
        } else {
            return abort(403);
        }
    }
}