<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen">

    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <a href="" class="text-2xl font-bold text-green-600">
                    RestoBook
                </a>

                <!-- Links -->
                <div class="flex items-center gap-6">
                    <a href="{{ route('client.index') }}"
                        class="text-gray-700 hover:text-green-600 font-semibold transition">
                        Accueil
                    </a>

                    <a href="{{ route('client.favoris') }}"
                        class="text-gray-700 hover:text-green-600 font-semibold transition">
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


    <!-- Alerts -->
    @if(session('success'))
        <div class="max-w-xl mx-auto mt-6 bg-green-500 text-white px-6 py-3 rounded-xl shadow">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-xl mx-auto mt-6 bg-red-500 text-white px-6 py-3 rounded-xl shadow">
            {{ session('error') }}
        </div>
    @endif



    <div class="max-w-5xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold text-center mb-10">
            My Reservations
        </h1>

        @forelse($reservations as $reservation)

            <div class="bg-white rounded-2xl shadow-md p-6 mb-6 border hover:shadow-xl transition">

                <div class="flex justify-between items-start">

                    <div>
                        <h2 class="text-xl font-semibold mb-2">
                            {{ $reservation->restaurant->name }}
                        </h2>

                        <div class="grid md:grid-cols-2 gap-3 text-gray-600 text-sm">

                            <div>
                                📅 <strong>Date:</strong>
                                {{ $reservation->reservation_day }}
                            </div>

                            <div>
                                ⏰ <strong>Time:</strong>
                                {{ $reservation->reservation_time }}
                            </div>

                            <div>
                                👥 <strong>Guests:</strong>
                                {{ $reservation->prsn_number }}
                            </div>

                            <div>
                                💰 <strong>Total:</strong>
                                {{ $reservation->total_price }} DH
                            </div>

                        </div>
                    </div>

                    <!-- STATUS -->
                    <div>

                        @if($reservation->status === 'pending')
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                                Awaiting Payment
                            </span>

                        @elseif($reservation->status === 'paid')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                Paid
                            </span>

                        @else
                            <span class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-sm font-semibold">
                                Cancelled
                            </span>
                        @endif

                    </div>

                </div>

                <!-- ACTIONS -->
                <div class="flex justify-end gap-3 mt-6 border-t pt-4">

                    @if($reservation->status === 'pending')

                        <a href="{{ route('payments.success', $reservation->id) }}"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg shadow">
                            Pay Now
                        </a>

                        <form method="GET" action="{{ route('payments.cancel', $reservation->id) }}">
                            <button class="bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-lg">
                                Cancel
                            </button>
                        </form>



                    @endif

                </div>

            </div>

        @empty

            <!-- Empty State (important UX) -->
            <div class="text-center bg-white p-10 rounded-2xl shadow">

                <h2 class="text-xl font-semibold mb-2">
                    No reservations yet
                </h2>

                <p class="text-gray-500 mb-4">
                    Start by booking a table at one of our restaurants.
                </p>

                <a href="{{ route('restaurants.index') }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg">
                    Browse Restaurants
                </a>

            </div>

        @endforelse

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const btn = document.getElementById('userMenuBtn');
            const dropdown = document.getElementById('userDropdown');

            if (btn) {
                btn.addEventListener('click', e => {
                    e.stopPropagation();
                    dropdown.classList.toggle('hidden');
                });

                document.addEventListener('click', () => {
                    dropdown.classList.add('hidden');
                });
            }

        });
    </script>

</body>

</html>