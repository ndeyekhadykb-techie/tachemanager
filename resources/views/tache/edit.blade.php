<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 bg-white shadow-xl rounded-2xl p-8">

        <h2 class="text-2xl font-bold mb-6">✏ Modifier la tâche</h2>

        <form action="{{ route('tache.update', $tache) }}" method="POST">
            @csrf
            @method('PUT')

            <input
                type="text"
                name="title"
                value="{{ $tache->title }}"
                class="w-full rounded-lg border-gray-300 mb-4"
                required
            >

            <div class="flex justify-between">
                <a href="{{ route('tache.index') }}"
                   class="text-gray-500 hover:underline">
                    Annuler
                </a>

                <button
                    type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    Enregistrer
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
