<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white shadow-xl rounded-2xl p-8">

        {{-- Titre --}}
        <h1 class="text-3xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            📋 Mes tâches
        </h1>

        {{-- Message succès --}}
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulaire ajout --}}
        <form action="{{ route('tache.store') }}" method="POST" class="flex gap-3 mb-6">
            @csrf
            <input
                type="text"
                name="title"
                placeholder="Nouvelle tâche..."
                class="flex-1 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-300 focus:outline-none"
                required
            >
            <button
                type="submit"
                class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition"
            >
                Ajouter
            </button>
        </form>

        {{-- Liste --}}
        @if($taches->count() > 0)
            <ul class="space-y-3">
                @foreach($taches as $tache)
                    <li class="flex items-center justify-between bg-gray-50 p-4 rounded-xl hover:shadow transition">

                        <div class="flex items-center gap-4">

                            
                            {{-- Bouton Modifier --}}
                            <a href="{{ route('tache.edit', $tache) }}"
                            class="text-blue-500 hover:text-blue-700 text-xl">
                                ✏
                            </a>

                            {{-- Toggle --}}
                            <form action="{{ route('tache.update', $tache) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-xl">
                                    {{ $tache->completed ? '✅' : '⬜' }}
                                </button>
                            </form>

                            {{-- Texte --}}
                            <span class="text-lg {{ $tache->completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                                {{ $tache->title }}
                            </span>

                        </div>

                        {{-- Supprimer --}}
                        <form action="{{ route('tache.destroy', $tache) }}" method="POST"
                              onsubmit="return confirm('Supprimer cette tâche ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-500 hover:text-red-700 text-xl transition">
                                🗑️
                            </button>
                        </form>

                    </li>
                @endforeach
            </ul>
        @else
            <div class="text-gray-400 text-center mt-6">
                Aucune tâche pour le moment 🙂
            </div>
        @endif

    </div>
</x-app-layout>
