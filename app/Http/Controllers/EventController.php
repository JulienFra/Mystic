<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Game;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(5);
        $users = User::all();

        return view('event.index', [
            'events' => $events,
            'users' => $users,
        ]);
    }

    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    public function create()
    {
        $games = Game::all();
        return view('event.create', compact('games'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'game_id' => 'required|exists:games,id',
            'body' => 'required|string',
            'occurs_at' => 'required|date',
            'participants_limit' => 'required|integer|min:0',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('img_path')->store('images', 'public');

        $event = new Event([
            'title' => $request->input('title'),
            'game_id' => $request->input('game_id'),
            'body' => $request->input('body'),
            'occurs_at' => $request->input('occurs_at'),
            'participants_limit' => $request->input('participants_limit'),
            'img_path' => $imagePath,
        ]);

        $event->save();

        return redirect()->route('event')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        $games = Game::all();
        return view('event.edit', compact('event', 'games'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'occurs_at' => 'required|date',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event->update($request->all());

        // Traitement de l'image s'il y en a une
        if ($request->hasFile('img_path')) {
            $imagePath = $request->file('img_path')->store('images/events');
            $event->img_path = $imagePath;
            $event->save();
        }

        return redirect()->route('event.show', $event->id)->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event')->with('success', 'Event deleted successfully.');
    }

    public function participate(Event $event)
    {
        // Vérifier si le nombre maximum de participants n'est pas atteint
        if ($event->participants->count() < $event->participants_limit) {
            // Ajouter l'utilisateur actuel en tant que participant à l'événement
            Participant::create([
                'event_id' => $event->id,
                'user_id' => auth()->id(),
            ]);

            return redirect()->back()->with('success', 'You have successfully participated in the event.');
        } else {
            return redirect()->back()->with('error', 'Maximum number of participants reached.');
        }
    }

    public function unparticipate(Request $request, Event $event)
    {
        $user = auth()->user();

        if ($user) {
            // Supprimer l'utilisateur de la liste des participants s'il est inscrit
            $participant = $event->participants()->where('user_id', $user->id)->first();
            if ($participant) {
                $participant->delete();
            }
        }

        return redirect()->back()->with('success', 'You are no longer participating in the event.');
    }

    public function participants(Event $event)
    {
        return view('participants.index', compact('event'));
    }
}
