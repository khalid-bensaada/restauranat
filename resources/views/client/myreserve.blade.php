<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes réservations</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('client.index') }}" class="text-2xl font-bold text-green-600">RestoBook</a>
                <div class="flex items-center gap-6">
                    <a href="{{ route('client.index') }}"
                        class="text-gray-700 hover:text-green-600 font-semibold transition">Accueil</a>
                    <a href="{{ route('favorites.index') }}"
                        class="text-gray-700 hover:text-green-600 font-semibold transition">Favoris</a>
                    <a href="{{ route('reservations.index') }}"
                        class="text-gray-700 hover:text-green-600 font-semibold transition">Mes réservations</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="max-w-7xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-center mb-8">Mes réservations</h1>

        <!-- Reservations List -->
        @if($reservations->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($reservations as $reservation)
                    <div class="bg-white border rounded-xl shadow-sm overflow-hidden flex flex-col hover:shadow-lg transition">
                        <img src="{{ $reservation->restaurant->image ? asset('storage/' . $reservation->restaurant->image) : 'https://via.placeholder.com/400x200.png?text=' . urlencode($reservation->restaurant->name) }}"
                            alt="{{ $reservation->restaurant->name }}" class="w-full h-44 object-cover">
                        <div class="p-5 flex flex-col flex-1">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $reservation->restaurant->name }}</h2>
                            <p class="text-gray-600 mb-2">Ville: {{ $reservation->restaurant->city }}</p>
                            <p class="text-gray-600 mb-2">Date: {{ \Carbon\Carbon::parse($reservation->date)->format('d F Y') }}
                            </p>
                            <p class="text-gray-600 mb-2">Heure: {{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}
                            </p>
                            <p class="text-gray-700 font-semibold mb-4">
                                Statut:
                                @if($reservation->status == 'confirmed')
                                    <span class="text-green-600">Confirmée</span>
                                @elseif($reservation->status == 'pending')
                                    <span class="text-yellow-600">En attente</span>
                                @else
                                    <span class="text-red-600">Annulée</span>
                                @endif
                            </p>
                            <div class="mt-auto flex gap-2">
                                <a href="{{ route('reservation.show', $reservation->id) }}"
                                    class="flex-1 bg-blue-600 text-white py-2 rounded-lg text-center hover:bg-blue-700 transition">
                                    Voir détails
                                </a>
                                <form action="{{ route('reservation.cancel', $reservation->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                                        Annuler
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $reservations->links() }}
            </div>

        @else
            <div class="text-center py-20 bg-gray-50 rounded-xl">
                <p class="text-gray-500 text-xl font-semibold">Vous n'avez aucune réservation.</p>
                <a href="{{ route('client.index') }}" class="text-green-600 underline mt-2 inline-block">Voir les
                    restaurants</a>
            </div>
        @endif
    </div>

</body>

</html>