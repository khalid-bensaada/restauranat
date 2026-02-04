<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Youco'Done - Reserve Your Table in Seconds</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;900&amp;display=swap"
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
            font-family: 'Work Sans', sans-serif;
        }

        .glass-nav {
            background: rgba(16, 26, 34, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white antialiased">
    <!-- Sticky Navigation -->
    <header class="fixed top-0 w-full z-50 glass-nav border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3 text-white">
                <div class="size-8 text-primary">
                    <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold tracking-tight">Youco'Done</h2>
            </div>

            <div class="flex items-center gap-3">
                <button
                    class="px-5 py-2 text-sm font-bold border border-white/20 rounded-lg hover:bg-white/10 transition-all">Login</button>
                <button
                    class="px-5 py-2 text-sm font-bold bg-primary text-white rounded-lg hover:bg-blue-600 shadow-lg shadow-primary/20 transition-all">
                    sign up</button>
            </div>
        </div>
    </header>
    <main class="pt-16">
        <!-- Hero Section -->
        <section class="relative h-[85vh] min-h-[600px] flex items-center justify-center px-4 overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div
                    class="absolute inset-0 bg-gradient-to-b from-background-dark/80 via-background-dark/40 to-background-dark z-10">
                </div>
                <div class="w-full h-full bg-cover bg-center" data-alt="Upscale dining room interior with warm lighting"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAZPCdGZhSkMcfVag2A7tFzH-tinbnOzB-jCwHT3pg7zY36xum4OTTDglifMMIjXyH1sex_WXfApkzg9uKOuIUuUL_ZIbxrdvs8Vs_tjkY1YYPfRBDc3EMm6rlHRLmiG_JMtkm5ogQelXf8oQZ_dBUXIYT1q8BVXSfKn-baJVSUSAAHqQode91yLn-PyO2PDdDkkVK6qX2AlvLMgBbdFK8xzvfAW00GSsXnPl86SULjhFoz2n2vjt8HG96yPQlgsR3PR_c1jkLhjN0");'>
                </div>
            </div>
            <div class="relative z-20 max-w-4xl text-center">
                <h1 class="text-white text-5xl md:text-7xl font-black leading-tight tracking-tight mb-6">
                    Reserve Your Table <br /><span class="text-primary">In Seconds</span>
                </h1>
                <p class="text-white/80 text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed font-light">
                    Experience the finest dining with instant bookings and real-time availability at your favorite
                    upscale restaurants. No waiting, no hassle.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <button
                        class="w-full sm:w-auto px-10 py-4 bg-primary text-white text-base font-bold rounded-xl shadow-xl shadow-primary/30 hover:scale-105 transition-transform">
                        Explore Restaurants
                    </button>
                    <button
                        class="w-full sm:w-auto px-10 py-4 bg-white/10 backdrop-blur-md text-white border border-white/20 text-base font-bold rounded-xl hover:bg-white/20 transition-all">
                        Learn More
                    </button>
                </div>
            </div>
        </section>
        <!-- Feature Section -->
        <section class="max-w-7xl mx-auto px-6 py-24">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black tracking-tight mb-4">Why Choose Youco'Done?</h2>
                <p class="text-slate-500 dark:text-slate-400 max-w-xl mx-auto">We provide a seamless reservation
                    experience for diners who value time, quality, and exclusivity.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="group p-8 rounded-xl border border-slate-200 dark:border-white/5 bg-white dark:bg-white/[0.02] hover:bg-white/[0.05] hover:border-primary/50 transition-all duration-300">
                    <div
                        class="size-14 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-6 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-3xl">bolt</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Fast Reservations</h3>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed">Book your preferred table in under 30
                        seconds with our lightning-fast, optimized booking engine.</p>
                </div>
                <!-- Feature 2 -->
                <div
                    class="group p-8 rounded-xl border border-slate-200 dark:border-white/5 bg-white dark:bg-white/[0.02] hover:bg-white/[0.05] hover:border-primary/50 transition-all duration-300">
                    <div
                        class="size-14 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-6 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-3xl">restaurant_menu</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Wide Selection</h3>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed">Access a curated list of top-tier
                        local eateries and exclusive hidden gems vetted by our food critics.</p>
                </div>
                <!-- Feature 3 -->
                <div
                    class="group p-8 rounded-xl border border-slate-200 dark:border-white/5 bg-white dark:bg-white/[0.02] hover:bg-white/[0.05] hover:border-primary/50 transition-all duration-300">
                    <div
                        class="size-14 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-6 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-3xl">update</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Real-time Status</h3>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed">Get live updates directly from kitchen
                        management systems for 100% seating accuracy.</p>
                </div>
            </div>
        </section>
        <!-- How It Works -->
        <section class="bg-white/[0.02] py-24 border-y border-white/5">
            <div class="max-w-5xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight">How It Works</h2>
                    <div class="h-1 w-20 bg-primary mx-auto mt-4 rounded-full"></div>
                </div>
                <div class="grid grid-cols-[40px_1fr] md:grid-cols-[60px_1fr] gap-x-6 gap-y-0 relative">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center">
                        <div
                            class="size-10 md:size-12 rounded-full bg-primary text-white flex items-center justify-center z-10 border-4 border-background-dark">
                            <span class="material-symbols-outlined">search</span>
                        </div>
                        <div class="w-[2px] bg-white/10 grow"></div>
                    </div>
                    <div class="pb-12 pt-1">
                        <h4 class="text-lg font-bold mb-1">Discover</h4>
                        <p class="text-slate-400">Browse our collection of premium restaurants near you. Filter by
                            cuisine, ambiance, and price.</p>
                    </div>
                    <!-- Step 2 -->
                    <div class="flex flex-col items-center">
                        <div
                            class="size-10 md:size-12 rounded-full bg-primary text-white flex items-center justify-center z-10 border-4 border-background-dark">
                            <span class="material-symbols-outlined">calendar_today</span>
                        </div>
                        <div class="w-[2px] bg-white/10 grow"></div>
                    </div>
                    <div class="pb-12 pt-1">
                        <h4 class="text-lg font-bold mb-1">Choose Time</h4>
                        <p class="text-slate-400">Select your preferred date, time, and party size. See instant
                            availability with no wait times.</p>
                    </div>
                    <!-- Step 3 -->
                    <div class="flex flex-col items-center">
                        <div
                            class="size-10 md:size-12 rounded-full bg-primary text-white flex items-center justify-center z-10 border-4 border-background-dark">
                            <span class="material-symbols-outlined">check_circle</span>
                        </div>
                    </div>
                    <div class="pt-1">
                        <h4 class="text-lg font-bold mb-1">Confirmed</h4>
                        <p class="text-slate-400">Receive instant confirmation and your digital reservation pass
                            directly in your email and app.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Restaurateur Section -->
        <section class="py-24 overflow-hidden">
            <div class="max-w-7xl mx-auto px-6">
                <div
                    class="bg-gradient-to-br from-slate-900 to-black rounded-3xl border border-white/10 p-8 md:p-16 flex flex-col md:flex-row items-center gap-12">
                    <div class="flex-1">
                        <span
                            class="inline-block px-4 py-1 bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase rounded-full mb-6">For
                            Restaurateurs</span>
                        <h2 class="text-3xl md:text-5xl font-black text-white leading-tight mb-6">Elevate Your Guest
                            Experience</h2>
                        <p class="text-slate-400 text-lg mb-8 leading-relaxed">
                            Take control of your dining room with our advanced management tools. Reduce no-shows by 40%,
                            optimize table turnover, and delight your regulars with personalized data.
                        </p>
                        <ul class="space-y-4 mb-10">
                            <li class="flex items-center gap-3 text-white/90">
                                <span class="material-symbols-outlined text-primary">check_circle</span>
                                Advanced Table Management
                            </li>
                            <li class="flex items-center gap-3 text-white/90">
                                <span class="material-symbols-outlined text-primary">check_circle</span>
                                Real-time Analytics Dashboard
                            </li>
                            <li class="flex items-center gap-3 text-white/90">
                                <span class="material-symbols-outlined text-primary">check_circle</span>
                                Automated Guest Communications
                            </li>
                        </ul>
                        <button
                            class="px-8 py-3 bg-white text-black font-bold rounded-lg hover:bg-slate-200 transition-colors">Start
                            Partnering</button>
                    </div>
                    <div class="flex-1 w-full max-w-md">
                        <div
                            class="relative rounded-2xl overflow-hidden shadow-2xl border border-white/5 aspect-square">
                            <img class="w-full h-full object-cover"
                                data-alt="Chef plating a high-end dish in a professional kitchen"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDq-xcxBZ1cXcBgtKdvf_xQ3HZNBz3f9yaL9XWhPoC5yaXvmHQCJnaecOjBTXodJxeTQEZeuv9pVOKJUpfM_68tqA_Ytt8W_MuIiUeK4X-TFgdx1zzOMi3-eXTID5boYxbva1kMPlC1j__hFKKoktEQKIenKks-DHqn1ZeMdGroXVxCH99_sOSU66FDYvHu80EN0OPBVqwA_3kS6j63nEvfugT1M_UXpaOQTlp_Aht3P76MOzwLS8QSrhoFGotMtO5OoYBHDldh8LM" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Banner -->
        <section class="max-w-7xl mx-auto px-6 mb-24">
            <div class="bg-primary rounded-3xl p-12 text-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-10"
                    style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;">
                </div>
                <div class="relative z-10">
                    <h2 class="text-white text-3xl md:text-4xl font-black mb-6">Ready for an unforgettable meal?</h2>
                    <p class="text-white/90 text-lg mb-10 max-w-2xl mx-auto">Join thousands of foodies who have already
                        discovered the easiest way to book tables at the best restaurants in town.</p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <button
                            class="bg-white text-primary px-10 py-4 font-bold rounded-xl hover:shadow-2xl transition-all">Sign
                            Up Free</button>
                        <button
                            class="bg-background-dark text-white px-10 py-4 font-bold rounded-xl hover:bg-black/40 transition-all">Download
                            App</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-background-dark border-t border-white/5 py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-3 text-white mb-6">
                        <div class="size-6 text-primary">
                            <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold">Youco'Done</h2>
                    </div>
                    <p class="text-slate-500 text-sm leading-relaxed">Making fine dining accessible, one reservation at
                        a time. The premier platform for modern food lovers.</p>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-6">Discovery</h5>
                    <ul class="space-y-4 text-slate-500 text-sm">
                        <li><a class="hover:text-primary transition-colors" href="#">Find a Restaurant</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Trending Spots</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Cuisines</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">New Openings</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-6">Partnerships</h5>
                    <ul class="space-y-4 text-slate-500 text-sm">
                        <li><a class="hover:text-primary transition-colors" href="#">For Restaurants</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Success Stories</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Pricing Plan</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Partner Portal</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-6">Support</h5>
                    <ul class="space-y-4 text-slate-500 text-sm">
                        <li><a class="hover:text-primary transition-colors" href="#">Help Center</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Terms of Service</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-600 text-xs">© 2024 Youco'Done. All rights reserved.</p>
                <div class="flex items-center gap-6">
                    <a class="text-slate-500 hover:text-white" href="#"><span
                            class="material-symbols-outlined text-xl">language</span></a>
                    <a class="text-slate-500 hover:text-white" href="#"><span
                            class="material-symbols-outlined text-xl">share</span></a>
                    <a class="text-slate-500 hover:text-white" href="#"><span
                            class="material-symbols-outlined text-xl">favorite</span></a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>