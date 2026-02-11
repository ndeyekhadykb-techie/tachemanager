<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">

        <h1 class="text-2xl font-bold mb-6 text-gray-800">
            📋 Mes tâches
        </h1>

        {{-- Formulaire ajout --}}
        <form action="{{ route('tache.store') }}" method="POST" class="flex gap-3 mb-6">
            @csrf
            <input
                type="text"
                name="title"
                placeholder="Nouvelle tâche..."
                class="flex-1 rounded-lg border-gray-300 focus:ring focus:ring-indigo-200"
                required
            >
            <button
                type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition"
            >
                Ajouter
            </button>
        </form>

        {{-- Liste des tâches --}}
        <ul class="space-y-3">
            @foreach($taches as $tache)
                <li class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">

                    <div class="flex items-center gap-3">
                        {{-- Toggle --}}
                        <form action="{{ route('tache.update', $tache) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="text-xl">
                                {{ $tache->completed ? '✅' : '⬜' }}
                            </button>
                        </form>

                        <span class="{{ $tache->completed ? 'line-through text-gray-400' : '' }}">
                            {{ $tache->title }}
                        </span>
                    </div>

                    {{-- Supprimer --}}
                    <form action="{{ route('tache.destroy', $tache) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:text-red-700">
                            🗑️
                        </button>
                    </form>

                </li>
            @endforeach
        </ul>

    </div>
</x-app-layout>
