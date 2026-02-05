<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }


    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role->name === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role->name === 'restaurateur') {
            return redirect()->route('restaurants.create');
        }

        if ($user->role->name === 'client') {
            return redirect()->route('client.dashboard');
        }

        return redirect()->route('login');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
