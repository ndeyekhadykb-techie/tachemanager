<x-app-layout>


<div class="container">
    <h2>Mes Tâches</h2>

    <form action="{{ route('tache.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Nouvelle tâche">
        <button type="submit">Ajouter</button>
    </form>

    <ul>
        @foreach($taches as $tache)
            <li>
                <form action="{{ route('tache.update', $tache) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit">
                        {{ $tache->completed ? '✔' : '❌' }}
                    </button>
                </form>

                {{ $tache->title }}

                <form action="{{ route('tache.destroy', $tache) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
</x-app-layout>
