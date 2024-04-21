<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();

        return view('game.index', [
            'games' => $games,
        ]);
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);

        return view('game.show', [
            'game' => $game,
        ]);
    }

    public function create()
    {
        return view('game.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role_id' => 'required|string|max:255',
        ]);

        Game::create($request->all());

        return redirect()->route('game')->with('success', 'Game created successfully.');
    }

    public function edit(Game $game)
    {
        return view('game.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role_id' => 'required|string|max:255',
        ]);

        $game->update($request->all());

        return redirect()->route('game.show', $game->id)->with('success', 'Game updated successfully.');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('game')->with('success', 'Game deleted successfully.');
    }
}
