<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Méthode pour gérer la redirection après l'authentification
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) { // Supposons que vous avez une méthode `isAdmin()` dans votre modèle User
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboard');
    }
}
