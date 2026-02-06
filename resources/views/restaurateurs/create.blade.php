<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>My Restaurants Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;900&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#1392ec",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101a22",
                    },
                    fontFamily: {
                        "display": ["Work Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: "Work Sans", sans-serif;
        }

        .restaurant-card:hover .action-overlay {
            opacity: 1;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark min-h-screen">
    <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <!-- Top Navigation Bar -->
            <header
                class="flex items-center justify-between whitespace-nowrap border-b border-solid border-[#dbe1e6] dark:border-slate-800 bg-white dark:bg-slate-900 px-10 py-3 sticky top-0 z-50">
                <div class="flex items-center gap-8">
                    <div class="flex items-center gap-4 text-primary">
                        <div class="size-6">
                            <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.8261 17.4264C16.7203 18.1174 20.2244 18.5217 24 18.5217C27.7756 18.5217 31.2797 18.1174 34.1739 17.4264C36.9144 16.7722 39.9967 15.2331 41.3563 14.1648L24.8486 40.6391C24.4571 41.267 23.5429 41.267 23.1514 40.6391L6.64374 14.1648C8.00331 15.2331 11.0856 16.7722 13.8261 17.4264Z"
                                    fill="currentColor"></path>
                                <path clip-rule="evenodd"
                                    d="M39.998 12.236C39.9944 12.2537 39.9875 12.2845 39.9748 12.3294C39.9436 12.4399 39.8949 12.5741 39.8346 12.7175C39.8168 12.7597 39.7989 12.8007 39.7813 12.8398C38.5103 13.7113 35.9788 14.9393 33.7095 15.4811C30.9875 16.131 27.6413 16.5217 24 16.5217C20.3587 16.5217 17.0125 16.131 14.2905 15.4811C12.0012 14.9346 9.44505 13.6897 8.18538 12.8168C8.17384 12.7925 8.16216 12.767 8.15052 12.7408C8.09919 12.6249 8.05721 12.5114 8.02977 12.411C8.00356 12.3152 8.00039 12.2667 8.00004 12.2612C8.00004 12.261 8 12.2607 8.00004 12.2612C8.00004 12.2359 8.0104 11.9233 8.68485 11.3686C9.34546 10.8254 10.4222 10.2469 11.9291 9.72276C14.9242 8.68098 19.1919 8 24 8C28.8081 8 33.0758 8.68098 36.0709 9.72276C37.5778 10.2469 38.6545 10.8254 39.3151 11.3686C39.9006 11.8501 39.9857 12.1489 39.998 12.236ZM4.95178 15.2312L21.4543 41.6973C22.6288 43.5809 25.3712 43.5809 26.5457 41.6973L43.0534 15.223C43.0709 15.1948 43.0878 15.1662 43.104 15.1371L41.3563 14.1648C43.104 15.1371 43.1038 15.1374 43.104 15.1371L43.1051 15.135L43.1065 15.1325L43.1101 15.1261L43.1199 15.1082C43.1276 15.094 43.1377 15.0754 43.1497 15.0527C43.1738 15.0075 43.2062 14.9455 43.244 14.8701C43.319 14.7208 43.4196 14.511 43.5217 14.2683C43.6901 13.8679 44 13.0689 44 12.2609C44 10.5573 43.003 9.22254 41.8558 8.2791C40.6947 7.32427 39.1354 6.55361 37.385 5.94477C33.8654 4.72057 29.133 4 24 4C18.867 4 14.1346 4.72057 10.615 5.94478C8.86463 6.55361 7.30529 7.32428 6.14419 8.27911C4.99695 9.22255 3.99999 10.5573 3.99999 12.2609C3.99999 13.1275 4.29264 13.9078 4.49321 14.3607C4.60375 14.6102 4.71348 14.8196 4.79687 14.9689C4.83898 15.0444 4.87547 15.1065 4.9035 15.1529C4.91754 15.1762 4.92954 15.1957 4.93916 15.2111L4.94662 15.223L4.95178 15.2312ZM35.9868 18.996L24 38.22L12.0131 18.996C12.4661 19.1391 12.9179 19.2658 13.3617 19.3718C16.4281 20.1039 20.0901 20.5217 24 20.5217C27.9099 20.5217 31.5719 20.1039 34.6383 19.3718C35.082 19.2658 35.5339 19.1391 35.9868 18.996Z"
                                    fill="currentColor" fill-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h2 class="text-[#111518] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">
                            Restaurateur Pro</h2>
                    </div>
                    <nav class="hidden md:flex items-center gap-9">

                        <a class="text-primary text-sm font-bold leading-normal border-b-2 border-primary pb-1"
                            href="#">Restaurants</a>
                        <a class="text-[#111518] dark:text-slate-300 text-sm font-semibold leading-normal hover:text-primary transition-colors"
                            href="">add Restaurant</a>
                        <a class="text-[#111518] dark:text-slate-300 text-sm font-semibold leading-normal hover:text-primary transition-colors"
                            href="#">Staff</a>
                    </nav>
                </div>
                <div class="flex flex-1 justify-end gap-6 items-center">
                    <label class="flex flex-col min-w-40 !h-10 max-w-64">
                        <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                            <div class="text-[#617989] flex border-none bg-background-light dark:bg-slate-800 items-center justify-center pl-4 rounded-l-lg"
                                data-size="20px">
                                <span class="material-symbols-outlined text-[20px]">search</span>
                            </div>
                            <input
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111518] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border-none bg-background-light dark:bg-slate-800 h-full placeholder:text-[#617989] px-4 rounded-l-none pl-2 text-sm font-normal"
                                placeholder="Search locations..." value="" />
                        </div>
                    </label>
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 ring-2 ring-primary/20"
                        data-alt="User profile avatar"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC-obkxGKXYA3hJiNE6rPg6TbkpMnoDLxS3GBqawcFoizqN4ZSabL8UbYqQ-wwPKnyjGwrw2p_Djj3Ffm6OuDD3gp8MyI1vAUfhqGxebS1KV9KBgsoNrp1Hs5jJgS7YHKxydOqXZ173gUD80BgJ363p57jqdazC8eiKMqj9ntZVHmRLcEpfbqNndpOeQI_45vc07ML8nsznTKU1TLqVoDjwqacc78YY8_hpegYpHxL0lVIepFJkWyyg7uHmZlpeZYmUeoyMWbRuoFg");'>
                    </div>
                </div>
            </header>
            <!-- Main Content Area -->
            <main class="px-10 lg:px-20 py-10 flex flex-col items-center">
                <div class="layout-content-container flex flex-col max-w-[1200px] w-full">
                    <!-- Page Heading -->
                    <div class="flex flex-wrap items-end justify-between gap-4 px-4 mb-8">
                        <div class="flex flex-col gap-2">
                            <p
                                class="text-[#111518] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">
                                My Restaurants</p>
                            <p class="text-[#617989] dark:text-slate-400 text-base font-normal">Efficiently manage your
                                portfolio of 12 active locations.</p>
                        </div>
                        <button
                            class="flex min-w-[140px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg h-12 px-6 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-all shadow-md"
                            id="open-form-btn">
                            <span class="material-symbols-outlined text-sm">add</span>
                            <span class="truncate">Add Restaurant</span>
                        </button>
                    </div>
                    <!-- Tabs -->
                    <div class="pb-6">
                        <div class="flex border-b border-[#dbe1e6] dark:border-slate-800 px-4 gap-8">
                            <a class="flex flex-col items-center justify-center border-b-[3px] border-primary text-primary pb-3 pt-4"
                                href="#">
                                <p class="text-sm font-bold leading-normal tracking-[0.015em]">All Locations</p>
                            </a>
                            <a class="flex flex-col items-center justify-center border-b-[3px] border-transparent text-[#617989] hover:text-[#111518] dark:hover:text-white pb-3 pt-4 transition-all"
                                href="#">
                                <p class="text-sm font-bold leading-normal tracking-[0.015em]">Active</p>
                            </a>
                            <a class="flex flex-col items-center justify-center border-b-[3px] border-transparent text-[#617989] hover:text-[#111518] dark:hover:text-white pb-3 pt-4 transition-all"
                                href="#">
                                <p class="text-sm font-bold leading-normal tracking-[0.015em]">Inactive</p>
                            </a>
                            <a class="flex flex-col items-center justify-center border-b-[3px] border-transparent text-[#617989] hover:text-[#111518] dark:hover:text-white pb-3 pt-4 transition-all"
                                href="#">
                                <p class="text-sm font-bold leading-normal tracking-[0.015em]">Under Renovation</p>
                            </a>
                        </div>
                    </div>
                    <!-- Restaurant Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-4">
                        <!-- Restaurant Card 1 -->
                        <div
                            class="restaurant-card group flex flex-col bg-white dark:bg-slate-900 rounded-xl overflow-hidden shadow-sm border border-[#dbe1e6] dark:border-slate-800 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div class="relative w-full aspect-video">
                                <div class="w-full h-full bg-center bg-no-repeat bg-cover"
                                    data-alt="Exterior of The Golden Bistro restaurant"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAw8BuS521xvphX3pOA8zs4KXiitpQRe5pIOVFmJtE8yMlnrR2gPrEfcKkytT2F5Nn1H0zuYDBSCY3HfRbZ3hPQ6-1_JkBR2il05VWi1fUYN3i3sytILT1YshfS-X1joxJk3Enl11lH9HOlnBe87-2Bkv4QZWZuxY4gSjg6C8B-Xa4lUgSfLBmLKEUuNQVcNd3eCByskMu4bm3I8ghk_iGBdQBL0ayPea7toFGtb-0nWxn0wiyObGEPtRTJl8r6pGD6pHNZAhoC9Nk");'>
                                </div>
                                <div
                                    class="absolute top-3 right-3 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">
                                    Active</div>
                                <!-- Action Buttons on Card -->
                                <div
                                    class="absolute inset-0 bg-black/40 flex items-center justify-center gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button
                                        class="bg-white text-[#111518] p-2 rounded-full hover:bg-primary hover:text-white transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <button
                                        class="bg-white text-red-600 p-2 rounded-full hover:bg-red-600 hover:text-white transition-colors">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </div>
                            </div>
                            <div class="p-5 flex flex-col gap-2">
                                <h3 class="text-[#111518] dark:text-white text-lg font-bold leading-tight">The Golden
                                    Bistro</h3>
                                <div class="flex items-center gap-1 text-[#617989] dark:text-slate-400">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <p class="text-sm font-medium">New York, NY</p>
                                </div>
                                <div class="flex flex-col gap-1 mt-2">
                                    <div
                                        class="flex items-center justify-between text-[#617989] dark:text-slate-400 text-xs font-semibold">
                                        <div class="flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">groups</span>
                                            <span>120 seats</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">schedule</span>
                                            <span>10:00 AM - 11:00 PM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($Restaurant as $restaurant)

                            <div
                                class="restaurant-card group flex flex-col bg-white dark:bg-slate-900 rounded-xl overflow-hidden shadow-sm border border-[#dbe1e6] dark:border-slate-800 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                                <div class="relative w-full aspect-video">

                                    <!-- IMAGE -->
                                    <div class="w-full h-full bg-center bg-no-repeat bg-cover"
                                        style="background-image: url('{{ asset('storage/' . $restaurant->image_resto) }}');">
                                    </div>

                                    <!-- STATUS -->
                                    <div
                                        class="absolute top-3 right-3 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">
                                        Active
                                    </div>

                                    <!-- ACTION BUTTONS -->
                                    <div
                                        class="absolute inset-0 bg-black/40 flex items-center justify-center gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">

                                        <!-- EDIT -->
                                        <button
                                            class="bg-white text-[#111518] p-2 rounded-full hover:bg-primary hover:text-white transition-colors">
                                            <span class="material-symbols-outlined">edit</span>
                                        </button>

                                        <!-- DELETE -->
                                        <form action="{{ route('restaurant.destroy', $restaurant->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="bg-white text-red-600 p-2 rounded-full hover:bg-red-600 hover:text-white transition-colors">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </form>

                                    </div>
                                </div>

                                <div class="p-5 flex flex-col gap-2">

                                    <!-- NAME -->
                                    <h3 class="text-[#111518] dark:text-white text-lg font-bold leading-tight">
                                        {{ $restaurant->name_restaurant }}
                                    </h3>

                                    <!-- CITY -->
                                    <div class="flex items-center gap-1 text-[#617989] dark:text-slate-400">
                                        <span class="material-symbols-outlined text-sm">location_on</span>
                                        <p class="text-sm font-medium">{{ $restaurant->city }}</p>
                                    </div>

                                    <!-- INFO -->
                                    <div class="flex flex-col gap-1 mt-2">
                                        <div
                                            class="flex items-center justify-between text-[#617989] dark:text-slate-400 text-xs font-semibold">

                                            <div class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[14px]">groups</span>
                                                <span>{{ $restaurant->capacity }} seats</span>
                                            </div>

                                            <div class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[14px]">schedule</span>
                                                <span>
                                                    {{ \Carbon\Carbon::parse($restaurant->oppen_hours)->format('H:i') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($restaurant->closing_hours)->format('H:i') }}
                                                </span>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                        <!-- Restaurant Card 2 -->


                        <!-- formula -->


                    </div>
                </div>
                <form method="POST" action="{{ route('restaurateurs.store') }} " id="restaurant-form" class="hidden">
                    @csrf

                    <div
                        class="fixed inset-y-0 right-0 w-full max-w-[480px] bg-white dark:bg-background-dark slide-over-shadow z-50 flex flex-col h-full">
                        <!-- Panel Header -->
                        <div
                            class="flex items-center justify-between p-6 border-b border-[#f0f3f4] dark:border-white/10">
                            <h2 class="text-[#111518] dark:text-white text-2xl font-black font-display tracking-tight">
                                Add New Restaurant
                            </h2>
                            <button type="button"
                                class="text-[#617989] hover:text-[#111518] dark:hover:text-white transition-colors"
                                id="close-form-btn">
                                <span class="material-symbols-outlined">close</span>
                            </button>

                        </div>

                        <!-- Scrollable Form Body -->
                        <div class="flex-1 overflow-y-auto p-6 space-y-8">
                            <!-- Restaurant Info -->
                            <div class="space-y-4">
                                <div>
                                    <label
                                        class="block text-sm font-semibold text-[#111518] dark:text-white mb-1.5 font-display">
                                        Restaurant Name
                                    </label>
                                    <input
                                        class="w-full rounded-lg border-[#d1d5db] dark:border-white/20 bg-white dark:bg-white/5 text-[#111518] dark:text-white focus:ring-primary focus:border-primary px-4 py-2.5 outline-none transition-all"
                                        placeholder="e.g. Blue Ocean Seafood" type="text" name="name_restaurant" />
                                    <p class="mt-1.5 text-xs text-red-500 font-medium flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">error</span> This
                                        field is required
                                    </p>
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <label
                                            class="block text-sm font-semibold text-[#111518] dark:text-white mb-1.5 font-display">
                                            City
                                        </label>
                                        <input
                                            class="w-full rounded-lg border-[#d1d5db] dark:border-white/20 bg-white dark:bg-white/5 text-[#111518] dark:text-white focus:ring-primary focus:border-primary px-4 py-2.5 outline-none transition-all"
                                            placeholder="e.g. Chicago" type="text" name="city" />
                                        <p class="mt-1.5 text-xs text-red-500 font-medium flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">error</span>
                                            Required
                                        </p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-semibold text-[#111518] dark:text-white mb-1.5 font-display">
                                            Cuisine
                                        </label>
                                        <input
                                            class="w-full rounded-lg border-[#d1d5db] dark:border-white/20 bg-white dark:bg-white/5 text-[#111518] dark:text-white focus:ring-primary focus:border-primary px-4 py-2.5 outline-none transition-all"
                                            placeholder="e.g. Italian, Seafood" type="text" name="cuisine" />
                                        <p class="mt-1.5 text-xs text-red-500 font-medium flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">error</span>
                                            Required
                                        </p>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-semibold text-[#111518] dark:text-white mb-1.5 font-display">
                                            Capacity
                                        </label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded-lg border-[#d1d5db] dark:border-white/20 bg-white dark:bg-white/5 text-[#111518] dark:text-white focus:ring-primary focus:border-primary px-4 py-2.5 outline-none transition-all"
                                                min="1" type="number" value="20" name="capacity" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Operations -->
                            <div class="space-y-4 pt-4 border-t border-[#f0f3f4] dark:border-white/10">
                                <h3 class="text-[#111518] dark:text-white font-bold text-base font-display">
                                    Operations
                                </h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label
                                            class="block text-sm font-semibold text-[#111518] dark:text-white mb-1.5 font-display">
                                            Opening Hours
                                        </label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded-lg border-[#d1d5db] dark:border-white/20 bg-white dark:bg-white/5 text-[#111518] dark:text-white focus:ring-primary focus:border-primary px-4 py-2.5 outline-none transition-all"
                                                type="time" value="09:00" name="oppen_hours" />
                                        </div>
                                    </div>
                                    <div>
                                        <label
                                            class="block text-sm font-semibold text-[#111518] dark:text-white mb-1.5 font-display">
                                            Closing Hours
                                        </label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded-lg border-[#d1d5db] dark:border-white/20 bg-white dark:bg-white/5 text-[#111518] dark:text-white focus:ring-primary focus:border-primary px-4 py-2.5 outline-none transition-all"
                                                type="time" value="22:00" name="closing_hours" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="space-y-4 pt-4 border-t border-[#f0f3f4] dark:border-white/10">
                                <h3 class="text-[#111518] dark:text-white font-bold text-base font-display">
                                    Branding &amp; Photos
                                </h3>
                                <div
                                    class="group cursor-pointer relative border-2 border-dashed border-[#d1d5db] dark:border-white/20 rounded-xl p-8 transition-colors hover:border-primary bg-[#fcfcfc] dark:bg-white/5 text-center">
                                    <input class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" type="file"
                                        name="image_resto" />
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-3">
                                            <span class="material-symbols-outlined text-[28px]">cloud_upload</span>
                                        </div>
                                        <p class="text-sm font-semibold text-[#111518] dark:text-white font-display">
                                            Drag and drop your logo or venue photo
                                        </p>
                                        <p class="text-xs text-[#617989] mt-1">PNG, JPG or WEBP up to 5MB</p>
                                    </div>
                                </div>

                                <!-- Placeholder Preview -->
                                <div
                                    class="flex items-center gap-4 p-3 rounded-lg bg-[#f6f7f8] dark:bg-white/5 border border-[#f0f3f4] dark:border-white/10">
                                    <div class="w-16 h-12 bg-center bg-cover rounded bg-[#d1d5db]"
                                        data-alt="Placeholder image preview for restaurant"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC9BsZAoKzx29eAxwlWPB4rVkleSF97uQsn4r5r8hETZhmEldt12pTWj0qq9-tchyMbbSgtMb37dR7mwJCn9Dnr6fhlJDpbjbDmVpKNZsOuKDeOe2eX6EPrvGJ1JHz0Ro_f8hmOn5MTNY20L6M24E-ON3YWgWJQ7cvmZ15Y8R3QZOhEI3zpvajXJEnEpbrB0GBrcXAZwTgzzwY8cgdtjLaejlOObeyt1H7Wm7s1yKg57gVnBKZPqoD4iPSM8-P--b5VfHaoBBVpR9s')">
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-semibold text-[#111518] dark:text-white">
                                            venue-exterior-01.jpg</p>
                                        <p class="text-[10px] text-[#617989]">1.2 MB</p>
                                    </div>
                                    <button class="text-[#617989] hover:text-red-500">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Sticky Footer -->
                        <div
                            class="p-6 border-t border-[#f0f3f4] dark:border-white/10 bg-white dark:bg-background-dark flex items-center gap-3">
                            <button type="button"
                                class="flex-1 h-11 rounded-lg bg-[#f0f3f4] dark:bg-white/5 text-[#111518] dark:text-white text-sm font-bold"
                                id="cancel-btn">
                                Cancel
                            </button>

                            <button
                                class="flex-[2] h-11 rounded-lg bg-primary text-white text-sm font-bold font-display hover:bg-primary/90 transition-colors shadow-lg shadow-primary/20">
                                Save Restaurant
                            </button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
    <script>
        const openBtn = document.getElementById('open-form-btn');
        const closeBtn = document.getElementById('close-form-btn');
        const cancelBtn = document.getElementById('cancel-btn');
        const form = document.getElementById('restaurant-form');

        // OPEN
        openBtn.addEventListener('click', () => {
            form.classList.remove('hidden');
        });

        // CLOSE
        closeBtn.addEventListener('click', () => {
            form.classList.add('hidden');
        });

        cancelBtn.addEventListener('click', () => {
            form.classList.add('hidden');
        });
    </script>

</body>

</html>