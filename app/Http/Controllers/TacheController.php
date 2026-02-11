<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
        $taches = auth()->user()->taches;
        return view('tache.index', compact('taches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        auth()->user()->taches()->create([
            'title' => $request->title
        ]);

        return redirect()->route('tache.index');
    }

   
public function edit(Tache $tache)
{
    return view('tache.edit', compact('tache'));
}

public function update(Request $request, Tache $tache)
{
    $request->validate([
        'title' => 'required'
    ]);

    $tache->update([
        'title' => $request->title,
        'completed' => $tache->completed
    ]);

    return redirect()->route('tache.index')
                     ->with('success', 'Tâche modifiée avec succès');
}


    public function destroy(Tache $tache)
{
    if ($tache->user_id !== auth()->id()) {
        abort(403);
    }

    $tache->delete();
    return back();
}









}
