<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Restaurateur Pro - Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: { "primary": "#1392ec", "background-light": "#f6f7f8", "background-dark": "#101a22" },
                    fontFamily: { "display": ["Work Sans", "sans-serif"] }
                },
            },
        }
    </script>
    <style>
        body {
            font-family: "Work Sans", sans-serif;
        }

        .slide-over-shadow {
            box-shadow: -10px 0 15px -3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark min-h-screen">
    <div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">

        <header
            class="flex items-center justify-between border-b border-[#dbe1e6] dark:border-slate-800 bg-white dark:bg-slate-900 px-10 py-3 sticky top-0 z-50">
            <div class="flex items-center gap-8">
                <div class="flex items-center gap-4 text-primary">
                    <h2 class="text-[#111518] dark:text-white text-lg font-bold">Restaurateur Pro</h2>
                </div>
                <nav class="hidden md:flex items-center gap-9">
                    <a class="text-primary text-sm font-bold border-b-2 border-primary pb-1" href="#">Restaurants</a>
                    <a class="text-[#111518] dark:text-slate-300 text-sm font-semibold hover:text-primary transition-colors"
                        href="#">Staff</a>
                </nav>
            </div>

            <div class="flex flex-1 justify-end gap-6 items-center">
                <form action="{{ route('restaurateurs.create') }}" method="GET" class="flex min-w-40 max-w-64">
                    <div class="flex w-full items-stretch rounded-lg bg-background-light dark:bg-slate-800 h-10 px-4">
                        <span class="material-symbols-outlined flex items-center text-[#617989]">search</span>
                        <input name="city" class="bg-transparent border-none focus:ring-0 text-sm w-full"
                            placeholder="Search by city..." value="{{ request('city') }}" />
                    </div>
                </form>
            </div>
        </header>

        <main class="px-10 lg:px-20 py-10 flex flex-col items-center">
            <div class="max-w-[1200px] w-full">

                <div class="flex flex-wrap items-end justify-between gap-4 px-4 mb-8">
                    <div>
                        <h1 class="text-[#111518] dark:text-white text-4xl font-black tracking-tight">My Restaurants
                        </h1>
                        <p class="text-[#617989] dark:text-slate-400 text-base">Manage your active restaurant locations
                            efficiently.</p>
                    </div>
                    <button id="open-form-btn"
                        class="flex items-center gap-2 rounded-lg h-12 px-6 bg-primary text-white text-sm font-bold hover:bg-primary/90 shadow-md transition-all">
                        <span class="material-symbols-outlined">add</span>
                        <span>Add Restaurant</span>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-4">
                    @forelse($restaurants as $restaurant)
                        <div
                            class="group flex flex-col bg-white dark:bg-slate-900 rounded-xl overflow-hidden shadow-sm border border-[#dbe1e6] dark:border-slate-800 hover:shadow-xl transition-all duration-300">
                            <div class="relative w-full aspect-video">
                                <div class="w-full h-full bg-center bg-cover bg-no-repeat"
                                    style="background-image: url('{{ asset('storage/' . $restaurant->image) }}');">
                                </div>

                                <div
                                    class="absolute inset-0 bg-black/40 flex items-center justify-center gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('restaurateurs.edit', $restaurant->id) }}"
                                        class="bg-white text-primary p-2 rounded-full hover:bg-primary hover:text-white transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                    <form action="{{ route('restaurateurs.destroy', $restaurant->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-white text-red-600 p-2 rounded-full hover:bg-red-600 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="p-5 flex flex-col gap-2">
                                <h3 class="text-[#111518] dark:text-white text-lg font-bold leading-tight">
                                    {{ $restaurant->name }}</h3>
                                <div class="flex items-center gap-1 text-[#617989] dark:text-slate-400">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <p class="text-sm font-medium">{{ $restaurant->city }} • {{ $restaurant->cuisine }}</p>
                                </div>
                                <div
                                    class="flex items-center justify-between mt-3 text-[#617989] dark:text-slate-400 text-xs font-semibold">
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">groups</span>
                                        <span>{{ $restaurant->capacity }} seats</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                                        <span>{{ $restaurant->open_hours }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-full text-center py-10 text-slate-500">No restaurants found. Click "Add
                            Restaurant" to start.</p>
                    @endforelse
                </div>
            </div>

            <div id="side-panel" class="hidden fixed inset-0 z-[60] overflow-hidden">
                <div class="absolute inset-0 bg-black/30 backdrop-blur-sm" id="panel-overlay"></div>
                <form action="{{ route('restaurateurs.store') }}" method="POST" enctype="multipart/form-data"
                    class="absolute inset-y-0 right-0 w-full max-w-[480px] bg-white dark:bg-background-dark shadow-2xl flex flex-col translate-x-full transition-transform duration-300"
                    id="form-container">
                    @csrf

                    <div class="flex items-center justify-between p-6 border-b dark:border-white/10">
                        <h2 class="text-2xl font-black text-[#111518] dark:text-white">Add New Restaurant</h2>
                        <button type="button" id="close-form-btn" class="text-slate-500 hover:text-red-500">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    <div class="flex-1 overflow-y-auto p-6 space-y-6">
                        <div>
                            <label class="block text-sm font-semibold mb-1.5 dark:text-white">Restaurant Name</label>
                            <input type="text" name="name" required
                                class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white"
                                placeholder="Blue Ocean Seafood">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1.5 dark:text-white">City</label>
                                <input type="text" name="city" required
                                    class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1.5 dark:text-white">Cuisine</label>
                                <input type="text" name="cuisine" required
                                    class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white"
                                    placeholder="Italian">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1.5 dark:text-white">Capacity</label>
                                <input type="number" name="capacity" required
                                    class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1.5 dark:text-white">Opening</label>
                                <input type="time" name="open_hours" required
                                    class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1.5 dark:text-white">Closing</label>
                                <input type="time" name="close_hours" required
                                    class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1.5 dark:text-white">Photo</label>
                            <div
                                class="border-2 border-dashed border-slate-300 dark:border-white/20 rounded-xl p-8 text-center bg-slate-50 dark:bg-white/5 relative hover:border-primary transition-colors">
                                <input type="file" name="image" required
                                    class="absolute inset-0 opacity-0 cursor-pointer">
                                <span class="material-symbols-outlined text-primary text-4xl mb-2">cloud_upload</span>
                                <p class="text-sm dark:text-white">Click or drag image here</p>
                                <p class="text-xs text-slate-500">JPG, PNG up to 2MB</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t dark:border-white/10">
                        <button type="submit"
                            class="w-full bg-primary text-white font-bold h-12 rounded-lg hover:bg-primary/90 transition-all">
                            Save Restaurant
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        const sidePanel = document.getElementById('side-panel');
        const formContainer = document.getElementById('form-container');
        const openBtn = document.getElementById('open-form-btn');
        const closeBtn = document.getElementById('close-form-btn');
        const overlay = document.getElementById('panel-overlay');

        function openPanel() {
            sidePanel.classList.remove('hidden');
            setTimeout(() => formContainer.classList.remove('translate-x-full'), 10);
        }

        function closePanel() {
            formContainer.classList.add('translate-x-full');
            setTimeout(() => sidePanel.classList.add('hidden'), 300);
        }

        openBtn.addEventListener('click', openPanel);
        closeBtn.addEventListener('click', closePanel);
        overlay.addEventListener('click', closePanel);
    </script>
</body>

</html>