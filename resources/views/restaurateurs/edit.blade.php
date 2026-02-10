<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Edit Restaurant - {{ $restaurant->name }}</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body class="bg-[#f6f7f8] dark:bg-[#101a22] min-h-screen p-10">
    <div class="max-w-2xl mx-auto bg-white dark:bg-slate-900 rounded-xl shadow-md overflow-hidden p-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold dark:text-white">Edit Restaurant</h1>
            <a href="{{ route('restaurateurs.create') }}" class="text-primary font-semibold text-sm">Cancel</a>
        </div>

        <form action="{{ route('restaurateurs.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold mb-1.5 dark:text-white">Restaurant Name</label>
                <input type="text" name="name" value="{{ old('name', $restaurant->name) }}" required
                    class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1.5 dark:text-white">City</label>
                    <input type="text" name="city" value="{{ old('city', $restaurant->city) }}" required
                        class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1.5 dark:text-white">Cuisine</label>
                    <input type="text" name="cuisine" value="{{ old('cuisine', $restaurant->cuisine) }}" required
                        class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white">
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1.5 dark:text-white">Capacity</label>
                    <input type="number" name="capacity" value="{{ old('capacity', $restaurant->capacity) }}" required
                        class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1.5 dark:text-white">Opening</label>
                    <input type="time" name="open_hours" value="{{ old('open_hours', $restaurant->open_hours) }}"
                        required class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1.5 dark:text-white">Closing</label>
                    <input type="time" name="close_hours" value="{{ old('close_hours', $restaurant->close_hours) }}"
                        required class="w-full rounded-lg border-slate-300 dark:bg-white/5 dark:text-white">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1.5 dark:text-white">Current Image</label>
                @if($restaurant->image)
                    <img src="{{ asset('storage/' . $restaurant->image) }}" class="w-32 h-20 object-cover rounded-lg mb-2">
                @endif
                <input type="file" name="image"
                    class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90">
            </div>

            <button type="submit"
                class="w-full bg-[#1392ec] text-white font-bold h-12 rounded-lg hover:bg-[#1392ec]/90 transition-all">
                Update Restaurant
            </button>
        </form>
    </div>
</body>

</html>