<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Favoris</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <a href="#" class="text-2xl font-bold text-green-600">
                    RestoBook
                </a>

                <!-- Links -->
                <div class="flex items-center gap-6">
                    <a href="{{ route('client.index') }}"
                        class="text-gray-700 hover:text-green-600 font-semibold transition">
                        Accueil
                    </a>

                    <a href="{{ route('client.favoris') }}" class="text-gray-700 hover:text-green-600 font-semibold transition">
                        Favoris
                    </a>

                    <a href="{{ route('client.myreserve') }}"
                        class="text-gray-700 hover:text-green-600 font-semibold transition">
                        Mes réservations
                    </a>

                </div>

            </div>
        </div>
    </nav>
    <div class="max-w-7xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6">Mes Favoris</h1>

        @if($favorites->isEmpty())
            <p class="text-gray-500">Vous n'avez ajouté aucun restaurant à vos favoris.</p>
            <a href="{{ route('client.index') }}" class="text-green-600 underline mt-2 inline-block">Voir tous les
                restaurants</a>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($favorites as $restaurant)
                    <div
                        class="bg-white border rounded-xl shadow-sm overflow-hidden flex flex-col hover:shadow-lg transition-shadow">
                        <img src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : 'https://via.placeholder.com/400x200.png?text=' . urlencode($restaurant->name) }}"
                            alt="{{ $restaurant->name }}" class="w-full h-44 object-cover">
                        <div class="p-5 flex flex-col flex-1">
                            <h2 class="text-xl font-bold text-gray-800">{{ $restaurant->name }}</h2>
                            <div class="flex items-center gap-2 mt-2 text-gray-700">
                                <span class="text-lg">🍽️</span>
                                <span class="text-sm font-medium">Cuisine :</span>
                                <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded-full text-xs font-bold uppercase">
                                    {{ $restaurant->cuisine ?? 'Classique' }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2 mt-2 text-gray-600">
                                <span class="text-lg">📍</span>
                                <span class="text-sm">Ville : {{ $restaurant->city }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>

</html>