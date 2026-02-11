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

   

    public function update(Request $request, Tache $tache) // ← SINGULIER
    {
        $tache->update([
            'completed' => !$tache->completed
        ]);

        return back();
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
