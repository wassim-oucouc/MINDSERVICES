<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg h-full flex-shrink-0 z-20 hidden lg:block">
            <div class="h-full flex flex-col">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 border-b border-gray-100">
                    <h1 class="text-xl font-bold">
                        <span class="text-indigo-600">MIND</span><span class="text-indigo-800">SERVICE</span>
                    </h1>
                </div>
                
                <!-- User Info -->
                <div class="flex items-center space-x-3 px-4 py-4 border-b border-gray-100">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=2070&auto=format&fit=crop" 
                         alt="Admin Profile" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <h3 class="font-medium text-sm">{{Auth::user()->Nom}}</h3>
                        <p class="text-xs text-gray-500">Prestataire</p>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="flex-1 py-4 overflow-y-auto">
                    <div class="px-3 space-y-1">
                        <a href="/professional/dashboard" class="@yield('home') group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">
                            <i class="fas fa-tachometer-alt mr-3 text-gray-400 group-hover:text-indigo-500"></i>
                            Tableau de bord
                        </a>
                        <a href="/professional/services" class="@yield('Services') group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">
                            <i class="fas fa-briefcase mr-3 text-gray-400 group-hover:text-indigo-500"></i>
                            Services
                        </a>
                        <a href="/professional/reservations" class="@yield('Rendez-vous') group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">
                            <i class="fas fa-calendar-alt mr-3 text-gray-400 group-hover:text-indigo-500"></i>
                            Reservations
                        </a>
                        <a href="/professional/avis" class="@yield('Avis') group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            Avis
                        </a>
                        <a href="/admin/Statistiques" class="@yield('Statistiques') group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">
                            <i class="fas fa-chart-bar mr-3 text-gray-400 group-hover:text-indigo-500"></i>
                            Statistiques
                        </a>
                        <a href="/admin/settings" class="@yield('Paramètres') group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">
                            <i class="fas fa-cog mr-3 text-gray-400 group-hover:text-indigo-500"></i>
                            Paramètres
                        </a>
                    </div>
                </nav>
                
                <!-- Logout -->
                <div class="p-4 border-t border-gray-100">
                    <a href="#" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-700">
                        <i class="fas fa-sign-out-alt mr-3 text-gray-400 group-hover:text-red-500"></i>
                        Déconnexion
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm z-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <!-- Mobile menu button -->
                        <button type="button" class="lg:hidden text-gray-500 hover:text-gray-600 focus:outline-none">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        
                        <!-- Page Title -->
                        <h2 class="text-lg font-medium text-gray-800">@yield('page-title', 'Tableau de bord')</h2>
                        
                        <!-- Right Side Nav Items -->
                        <div class="flex items-center space-x-4">
                            <!-- Notifications -->
                            <button class="text-gray-500 hover:text-gray-600 relative">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
                            </button>
                            
                            <!-- Profile Dropdown -->
                            <div class="relative">
                                <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=2070&auto=format&fit=crop" 
                                        alt="Profile" class="w-8 h-8 rounded-full object-cover">
                                    <span class="hidden md:block text-sm font-medium">{{Auth::user()->Nom}}</span>
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Simple active item toggle (replace with your own logic)
        document.addEventListener('DOMContentLoaded', function() {
            const path = window.location.pathname;
            const links = document.querySelectorAll('nav a');
            
            links.forEach(link => {
                if (link.getAttribute('href') === path) {
                    link.classList.add('bg-indigo-50', 'text-indigo-700');
                    const icon = link.querySelector('i, svg');
                    if (icon) {
                        icon.classList.remove('text-gray-400');
                        icon.classList.add('text-indigo-500');
                    }
                }
            });
        });
    </script>
</body>
</html>