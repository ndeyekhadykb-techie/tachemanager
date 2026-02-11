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

    public function destroy(Tache $taches)
    {
        $taches->delete();
        return back();
    }

    public function update(Request $request, Tache $taches)
    {
        $taches->update([
            'completed' => !$taches->completed
        ]);

        return back();
    }
}
