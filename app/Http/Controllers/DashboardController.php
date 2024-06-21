<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assurez-vous d'importer le modèle User si ce n'est pas déjà fait

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch only non-admin users
        $users = User::where('role', 'user')->get(); // Adjust 'role' column name and value as per your database structure

        return view('dashboard', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}

