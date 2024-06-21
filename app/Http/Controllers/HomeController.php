<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
{
    $events = Event::all(); // Récupère tous les événements depuis la base de données
    return view('admin.dashboard', compact('events'));
}

}
