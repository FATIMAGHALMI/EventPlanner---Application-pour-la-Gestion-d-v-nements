<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Méthode pour afficher les événements sur la page d'accueil (welcome)
    public function index()
    {
        $events = Event::all(); // Récupère tous les événements de la base de données

        return view('welcome', [
            'events' => $events, // Passe les événements à la vue welcome
        ]);
    }

    // Méthode pour afficher les événements créés par l'utilisateur authentifié dans le tableau de bord admin
    public function adminDashboard()
    {
        // Récupère tous les événements créés par l'utilisateur authentifié
        $events = auth()->user()->events()->get();

        return view('admin.dashboard', [
            'events' => $events,
        ]);
    }

    // Méthode pour afficher le formulaire de création d'événement
    public function create()
    {
        return view('events.create');
    }
    public function store(Request $request)
{
    // Validation des données du formulaire
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'date' => 'required|date', // Assurez-vous que le champ date est requis et de type date
        'time' => 'required', // Assurez-vous que le champ time est requis
        'location' => 'required|max:255', // Assurez-vous que le champ location est requis
    ]);

    // Création d'un nouvel événement dans la base de données
    $event = new Event();
    $event->title = $validatedData['title'];
    $event->description = $validatedData['description'];
    $event->date = $validatedData['date'];
    $event->time = $validatedData['time'];
    $event->location = $validatedData['location'];
    $event->creator_id = auth()->id(); // Assurez-vous d'attribuer l'ID de l'utilisateur connecté comme créateur de l'événement
    $event->save();

    // Redirection vers une autre page après création
    return redirect()->route('admin.dashboard')->with('success', 'Event created successfully');
}

    
}
