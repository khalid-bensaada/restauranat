Create a modern and professional Admin Dashboard UI for a restaurant reservation platform called "Youco'Done" using HTML
+ TailwindCSS.

Design Style:

Clean, minimal, and modern SaaS dashboard

Inspired by Stripe / Airbnb admin panels

Soft shadows, rounded-2xl cards

Spacious layout (avoid cramped elements)

Professional typography

Fully responsive

Layout Structure:

1️⃣ Sidebar (fixed)
Include:

Logo "Youco'Done"

Dashboard

Restaurants

Users

Reservations

Settings

Logout

Active item should have a colored background.

2️⃣ Top Navbar
Contains:

Search bar

Notification bell

Admin avatar with dropdown

3️⃣ Dashboard Content

👉 Stats Cards (4 cards in one row on desktop)

Each card should contain:

Icon

Title

Large number

Small growth indicator

Cards:

Total Restaurants

Active Restaurants

Total Users

Reservations Today

👉 Restaurants Table

A large modern table with:

Columns:

Restaurant Name

City

Cuisine

Capacity

Status (Active / Suspended badge)

Created At

Actions

Actions buttons:

View

Delete

Use hover effects and soft badges.

👉 Recent Activity Panel (optional but highly professional)

Show:

New restaurant added

User registered

Reservation created

Displayed as a vertical timeline or list.

UI Requirements:

Use Tailwind utility classes only

Do NOT use external component libraries

Avoid loud colors — prefer neutral palette with one primary color

Cards must have shadow-sm or shadow-md

Use rounded-2xl everywhere

Proper spacing (p-6, gap-6)

Icons from Heroicons

Responsiveness:

Sidebar collapses on mobile

Cards stack vertically

Table becomes horizontally scrollable

Goal:

The dashboard must look like a production-level SaaS admin panel, not a student project.
<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Management Dashboard - Youco'Done</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
                        "primary": "#0d0df2",
                        "background-light": "#f5f5f8",
                        "background-dark": "#101022",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .active-nav {
            background-color: #0d0df2;
            color: white !important;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 antialiased min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside
            class="w-72 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 flex flex-col h-full shrink-0">
            <div class="p-8 flex items-center gap-3">
                <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white">
                    <span class="material-symbols-outlined text-2xl">restaurant_menu</span>
                </div>
                <div>
                    <h1 class="text-xl font-extrabold tracking-tight">Youco'Done</h1>
                    <p class="text-xs text-slate-500 dark:text-slate-400 font-medium uppercase tracking-wider">Admin
                        Portal</p>
                </div>
            </div>
            <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl active-nav" href="#">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="font-semibold text-sm">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
                    href="#">
                    <span class="material-symbols-outlined">storefront</span>
                    <span class="font-semibold text-sm">Restaurants</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
                    href="#">
                    <span class="material-symbols-outlined">group</span>
                    <span class="font-semibold text-sm">Users</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
                    href="#">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <span class="font-semibold text-sm">Reservations</span>
                </a>
                <div class="pt-8 pb-2 px-4">
                    <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">System
                    </p>
                </div>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
                    href="#">
                    <span class="material-symbols-outlined">settings</span>
                    <span class="font-semibold text-sm">Settings</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
                    href="#">
                    <span class="material-symbols-outlined">help</span>
                    <span class="font-semibold text-sm">Help Center</span>
                </a>
            </nav>
            <div class="p-6 border-t border-slate-100 dark:border-slate-800">
                <div class="bg-primary/5 dark:bg-primary/10 p-4 rounded-xl">
                    <p class="text-xs font-semibold text-primary mb-1">Premium Plan</p>
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 leading-tight mb-3">You have access to all
                        advanced analytics modules.</p>
                    <button
                        class="w-full bg-primary text-white text-[10px] font-bold py-2 rounded-lg hover:opacity-90 transition-opacity">MANAGE</button>
                </div>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Header -->
            <header
                class="h-20 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8 shrink-0">
                <div class="flex-1 max-w-xl">
                    <div class="relative">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input
                            class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-full py-2.5 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/50 placeholder:text-slate-500"
                            placeholder="Search for restaurants, users, or bookings..." type="text" />
                    </div>
                </div>
                <div class="flex items-center gap-4 ml-8">
                    <button
                        class="p-2 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full transition-colors relative">
                        <span class="material-symbols-outlined">notifications</span>
                        <span
                            class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
                    </button>
                    <div class="h-8 w-px bg-slate-200 dark:border-slate-800 mx-2"></div>
                    <div class="flex items-center gap-3 cursor-pointer group">
                        <div class="text-right">
                            <p class="text-sm font-bold leading-none">Alex Morgan</p>
                            <p class="text-[10px] text-slate-500 dark:text-slate-400 font-medium">Super Admin</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-slate-200 bg-center bg-cover border-2 border-transparent group-hover:border-primary transition-all"
                            data-alt="Admin user profile picture"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDo8pmdd028BvaKaS5NlQx_J_0pUhSF3jxE32jpxfBfTF91vNSdlOWaF5BmPLzO90eVNbc8KelJ3ICWFLrvre0N2jGaQI9Lm51ME6nppV1ycvlQ4u_P5bqrlCbE9SaedXGaSd2ewEw5thoGwGom3SQD3pI7yv481H3BAd5yg1Cdr1Ll5xwgmKwYnDJinZlGKZroy4lT2wll11UQUY8QKshqm21svYMREmNnDml1Zbwc9CgU63YoNJ6KV5YZTRqi1uR_FRCgMepFASk')">
                        </div>
                    </div>
                </div>
            </header>
            <!-- Dashboard Body -->
            <div class="flex-1 overflow-y-auto p-8">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Main Grid -->
                    <div class="flex-1 space-y-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-extrabold tracking-tight">System Overview</h2>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Real-time performance metrics for
                                    Youco'Done</p>
                            </div>
                            <div class="flex gap-2">
                                <button
                                    class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-semibold hover:bg-slate-50 transition-colors">
                                    <span class="material-symbols-outlined text-sm">calendar_today</span>
                                    <span>Last 30 Days</span>
                                </button>
                                <button
                                    class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-xl text-sm font-semibold hover:opacity-90 transition-opacity">
                                    <span class="material-symbols-outlined text-sm">download</span>
                                    <span>Export Report</span>
                                </button>
                            </div>
                        </div>
                        <!-- Stat Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                            <div
                                class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800">
                                <div class="flex items-center justify-between mb-4">
                                    <div
                                        class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-xl flex items-center justify-center">
                                        <span class="material-symbols-outlined">storefront</span>
                                    </div>
                                    <span
                                        class="text-emerald-500 bg-emerald-50 dark:bg-emerald-500/10 px-2 py-1 rounded-lg text-xs font-bold">+12%</span>
                                </div>
                                <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold">Total Restaurants
                                </p>
                                <h3 class="text-2xl font-extrabold mt-1">1,240</h3>
                            </div>
                            <div
                                class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800">
                                <div class="flex items-center justify-between mb-4">
                                    <div
                                        class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-xl flex items-center justify-center">
                                        <span class="material-symbols-outlined">check_circle</span>
                                    </div>
                                    <span
                                        class="text-emerald-500 bg-emerald-50 dark:bg-emerald-500/10 px-2 py-1 rounded-lg text-xs font-bold">+5%</span>
                                </div>
                                <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold">Active Restaurants
                                </p>
                                <h3 class="text-2xl font-extrabold mt-1">980</h3>
                            </div>
                            <div
                                class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800">
                                <div class="flex items-center justify-between mb-4">
                                    <div
                                        class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-xl flex items-center justify-center">
                                        <span class="material-symbols-outlined">person</span>
                                    </div>
                                    <span
                                        class="text-emerald-500 bg-emerald-50 dark:bg-emerald-500/10 px-2 py-1 rounded-lg text-xs font-bold">+18%</span>
                                </div>
                                <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold">Total Users</p>
                                <h3 class="text-2xl font-extrabold mt-1">45.2k</h3>
                            </div>
                            <div
                                class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800">
                                <div class="flex items-center justify-between mb-4">
                                    <div
                                        class="w-10 h-10 bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 rounded-xl flex items-center justify-center">
                                        <span class="material-symbols-outlined">bookmark_added</span>
                                    </div>
                                    <span
                                        class="text-emerald-500 bg-emerald-50 dark:bg-emerald-500/10 px-2 py-1 rounded-lg text-xs font-bold">+22%</span>
                                </div>
                                <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold">Reservations Today
                                </p>
                                <h3 class="text-2xl font-extrabold mt-1">320</h3>
                            </div>
                        </div>
                        <!-- Data Table -->
                        <div
                            class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
                            <div
                                class="p-6 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
                                <h3 class="font-bold text-lg">Restaurant Fleet</h3>
                                <div class="flex gap-2">
                                    <div class="relative">
                                        <span
                                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">filter_list</span>
                                        <select
                                            class="bg-slate-100 dark:bg-slate-800 border-none rounded-lg text-xs font-bold pl-8 pr-6 py-2 focus:ring-0 appearance-none">
                                            <option>All Status</option>
                                            <option>Active</option>
                                            <option>Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead
                                        class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 text-[10px] font-bold uppercase tracking-widest">
                                        <tr>
                                            <th class="px-6 py-4">Name</th>
                                            <th class="px-6 py-4">City</th>
                                            <th class="px-6 py-4">Cuisine</th>
                                            <th class="px-6 py-4">Capacity</th>
                                            <th class="px-6 py-4">Status</th>
                                            <th class="px-6 py-4 text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-9 h-9 rounded-lg bg-blue-100 flex items-center justify-center font-bold text-blue-600 text-sm">
                                                        B</div>
                                                    <span class="font-bold text-sm">The Bistro</span>
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">
                                                New York</td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="px-2 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-md text-[10px] font-bold">FRENCH</span>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium">45</td>
                                            <td class="px-6 py-4">
                                                <div
                                                    class="flex items-center gap-2 text-emerald-600 dark:text-emerald-400">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                    <span
                                                        class="text-xs font-bold uppercase tracking-wide">Active</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <button class="text-slate-400 hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-xl">more_vert</span>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-9 h-9 rounded-lg bg-red-100 flex items-center justify-center font-bold text-red-600 text-sm">
                                                        S</div>
                                                    <span class="font-bold text-sm">Sushi Zen</span>
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">
                                                San Francisco</td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="px-2 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-md text-[10px] font-bold">JAPANESE</span>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium">30</td>
                                            <td class="px-6 py-4">
                                                <div
                                                    class="flex items-center gap-2 text-emerald-600 dark:text-emerald-400">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                    <span
                                                        class="text-xs font-bold uppercase tracking-wide">Active</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <button class="text-slate-400 hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-xl">more_vert</span>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-9 h-9 rounded-lg bg-orange-100 flex items-center justify-center font-bold text-orange-600 text-sm">
                                                        P</div>
                                                    <span class="font-bold text-sm">Pasta House</span>
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">
                                                Chicago</td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="px-2 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-md text-[10px] font-bold">ITALIAN</span>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium">60</td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-2 text-amber-600 dark:text-amber-400">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                                    <span
                                                        class="text-xs font-bold uppercase tracking-wide">Pending</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <button class="text-slate-400 hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-xl">more_vert</span>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-9 h-9 rounded-lg bg-green-100 flex items-center justify-center font-bold text-green-600 text-sm">
                                                        G</div>
                                                    <span class="font-bold text-sm">Green Grill</span>
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">
                                                Austin</td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="px-2 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-md text-[10px] font-bold">VEGAN</span>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium">25</td>
                                            <td class="px-6 py-4">
                                                <div
                                                    class="flex items-center gap-2 text-emerald-600 dark:text-emerald-400">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                    <span
                                                        class="text-xs font-bold uppercase tracking-wide">Active</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <button class="text-slate-400 hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-xl">more_vert</span>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center font-bold text-slate-600 text-sm">
                                                        M</div>
                                                    <span class="font-bold text-sm">Midnight Diner</span>
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">
                                                Seattle</td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="px-2 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-md text-[10px] font-bold">AMERICAN</span>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium">40</td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-2 text-slate-500">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                                    <span
                                                        class="text-xs font-bold uppercase tracking-wide">Closed</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <button class="text-slate-400 hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-xl">more_vert</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="p-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Showing 5 of 1,240
                                    results</p>
                                <div class="flex gap-2">
                                    <button
                                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 transition-colors">
                                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                                    </button>
                                    <button
                                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white text-xs font-bold">1</button>
                                    <button
                                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 transition-colors">
                                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side Activity Panel -->
                    <aside class="w-full lg:w-80 shrink-0 space-y-6">
                        <div
                            class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 p-6">
                            <h3 class="font-bold text-lg mb-6 flex items-center justify-between">
                                Recent Activity
                                <span class="material-symbols-outlined text-slate-400 text-sm">history</span>
                            </h3>
                            <div
                                class="space-y-6 relative before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-px before:bg-slate-100 dark:before:bg-slate-800">
                                <div class="relative pl-8">
                                    <div
                                        class="absolute left-0 top-1 w-[22px] h-[22px] bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-full flex items-center justify-center z-10">
                                        <span class="material-symbols-outlined text-[12px] font-bold">add</span>
                                    </div>
                                    <p class="text-xs font-bold text-slate-900 dark:text-slate-100">New Restaurant
                                        Registered</p>
                                    <p class="text-[10px] text-slate-500 mt-0.5">'Taco Heaven' just joined the platform.
                                    </p>
                                    <p class="text-[10px] text-slate-400 mt-2 font-medium">2 mins ago</p>
                                </div>
                                <div class="relative pl-8">
                                    <div
                                        class="absolute left-0 top-1 w-[22px] h-[22px] bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-full flex items-center justify-center z-10">
                                        <span class="material-symbols-outlined text-[12px] font-bold">close</span>
                                    </div>
                                    <p class="text-xs font-bold text-slate-900 dark:text-slate-100">Booking Cancelled
                                    </p>
                                    <p class="text-[10px] text-slate-500 mt-0.5">User @jane_doe cancelled a booking at
                                        'The Bistro'.</p>
                                    <p class="text-[10px] text-slate-400 mt-2 font-medium">45 mins ago</p>
                                </div>
                                <div class="relative pl-8">
                                    <div
                                        class="absolute left-0 top-1 w-[22px] h-[22px] bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full flex items-center justify-center z-10">
                                        <span class="material-symbols-outlined text-[12px] font-bold">sync</span>
                                    </div>
                                    <p class="text-xs font-bold text-slate-900 dark:text-slate-100">System Update
                                        Completed</p>
                                    <p class="text-[10px] text-slate-500 mt-0.5">V2.4.1 maintenance update applied
                                        successfully.</p>
                                    <p class="text-[10px] text-slate-400 mt-2 font-medium">3 hours ago</p>
                                </div>
                                <div class="relative pl-8">
                                    <div
                                        class="absolute left-0 top-1 w-[22px] h-[22px] bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 rounded-full flex items-center justify-center z-10">
                                        <span
                                            class="material-symbols-outlined text-[12px] font-bold">priority_high</span>
                                    </div>
                                    <p class="text-xs font-bold text-slate-900 dark:text-slate-100">High Capacity
                                        Warning</p>
                                    <p class="text-[10px] text-slate-500 mt-0.5">'Sushi Zen' is 95% booked for tonight.
                                    </p>
                                    <p class="text-[10px] text-slate-400 mt-2 font-medium">5 hours ago</p>
                                </div>
                            </div>
                            <button
                                class="w-full mt-8 py-2.5 text-xs font-bold text-primary bg-primary/5 rounded-xl hover:bg-primary/10 transition-colors uppercase tracking-widest">View
                                All Activity</button>
                        </div>
                        <!-- Quick Actions Card -->
                        <div
                            class="bg-primary p-6 rounded-2xl shadow-lg shadow-primary/20 text-white overflow-hidden relative">
                            <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                            <h3 class="font-bold text-lg mb-2 relative z-10">Admin Support</h3>
                            <p class="text-xs text-white/80 mb-6 relative z-10">Need help with restaurant onboarding or
                                system errors?</p>
                            <button
                                class="bg-white text-primary px-4 py-2.5 rounded-xl text-xs font-bold w-full hover:bg-slate-50 transition-colors">OPEN
                                SUPPORT TICKET</button>
                        </div>
                    </aside>
                </div>
            </div>
        </main>
    </div>
</body>

</html>