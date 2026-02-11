<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
        $tache = auth()->user()->tache;
        return view('tache.index', compact('tache'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title
        ]);

        return redirect()->route('tache.index');
    }

    public function destroy(Tache $tache)
    {
        $tache->delete();
        return back();
    }

    public function update(Request $request, Tache $tache)
    {
        $tache->update([
            'completed' => !$tache->completed
        ]);

        return back();
    }
}
