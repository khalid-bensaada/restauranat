<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver une table - {{ $restaurant->name }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-center mb-8">
            Réserver une table chez {{ $restaurant->name }}
        </h1>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-5 text-center">
                {{ session('error') }}
            </div>
        @endif

        @if($availabilities->isEmpty())
            <div class="text-center bg-gray-50 rounded p-10">
                <p class="text-gray-500 text-lg">Désolé, aucune disponibilité pour le moment.</p>
                <a href="{{ route('client.index') }}" class="text-green-600 underline mt-2 inline-block">
                    Retour à la liste des restaurants
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($availabilities as $availability)
                    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition flex flex-col">
                        <div class="mb-3">
                            <p class="text-gray-700 font-medium">Date : <span
                                    class="font-bold">{{ \Carbon\Carbon::parse($availability->date)->format('d/m/Y') }}</span>
                            </p>
                            <p class="text-gray-700 font-medium">Heure : <span
                                    class="font-bold">{{ \Carbon\Carbon::parse($availability->start_time)->format('H:i') }}</span>
                            </p>
                            <p class="text-gray-700 font-medium">Places restantes : <span
                                    class="font-bold">{{ $availability->capacity }}</span></p>
                        </div>

                        @if($availability->capacity > 0)
                            <form action="{{ route('reservation.store') }}" method="POST" class="mt-auto">
                                @csrf
                                <input type="hidden" name="availability_id" value="{{ $availability->id }}">
                                <label class="block mb-2 font-medium text-gray-700">Nombre de personnes :</label>
                                <input type="number" name="prsn_number" value="1" min="1" max="{{ $availability->capacity }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 mb-3 focus:ring-2 focus:ring-green-500 outline-none">
                                <button type="submit"
                                    class="w-full bg-green-600 text-white py-2 rounded-lg font-bold hover:bg-green-700 transition">
                                    Réserver
                                </button>
                            </form>
                        @else
                            <button disabled class="w-full bg-gray-400 text-white py-2 rounded-lg font-bold cursor-not-allowed">
                                Complet
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-8 text-center">
            <a href="{{ route('client.myreserve') }}" class="text-green-600 underline">Retour à la liste des restaurants</a>
        </div>
    </div>

</body>

</html>