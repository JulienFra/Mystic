<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(9);

        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $news = new News();
        $news->title = $request->input('title');
        $news->body = $request->input('body');
        $news->published_at = now();
        $news->save();

        return redirect()->route('news')->with('success', 'News created successfully.');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news')->with('success', 'News deleted successfully.');
    }
}
