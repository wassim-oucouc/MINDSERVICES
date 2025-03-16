<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-poppins text-gray-800 bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="bg-white w-64 shadow-lg h-full flex-shrink-0 z-20 border-r border-gray-200">
            <div class="h-full flex flex-col">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 border-b border-gray-200">
                    <h1 class="text-xl font-bold text-indigo-600 cursor-pointer">MIND<span class="text-indigo-800">SERVICE</span></h1>
                </div>
                
                <!-- User Info -->
                <div class="flex items-center space-x-4 px-6 py-4 border-b border-gray-200">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=2070&auto=format&fit=crop" 
                         alt="Admin Profile" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <h3 class="font-medium text-sm">{{Auth::user()->Nom}}</h3>
                        <p class="text-xs text-gray-500">Admin</p>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
                    <a href="/admin/dashboard" class="@yield('home') flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-tachometer-alt text-lg"></i>
                        <span class="font-medium">Tableau de bord</span>
                    </a>
                    <a href="/admin/utilisateurs" class="@yield('Utilisateurs') flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-users text-lg"></i>
                        <span class="font-medium">Utilisateurs</span>
                    </a>
                    <a href="/admin/Prestataires" class="@yield('Prestataires') flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-briefcase text-lg"></i>
                        <span class="font-medium">Prestataires</span>
                    </a>
                    <a href="/admin/clients" class=" @yield('Clients') flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-user-friends text-lg"></i>
                        <span class="font-medium">Clients</span>
                    </a>
                    <a href="/admin/categories" class=" @yield('Catégories') flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-tags text-lg"></i>
                        <span class="font-medium">Catégories</span>
                    </a>
                    <a href="/admin/reservation" class="@yield('Prestataires') flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-calendar-alt text-lg"></i>
                        <span class="font-medium">Rendez-vous</span>
                    </a>
                    <a href="/admin/Statistiques" class="@yield('Statistiques') flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-chart-bar text-lg"></i>
                        <span class="font-medium">Statistiques</span>
                    </a>
                    <a href="/admin/settings" class="@yield('Paramètres') flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-cog text-lg"></i>
                        <span class="font-medium">Paramètres</span>
                    </a>
                </nav>
                
                <!-- Logout -->
                <div class="p-4 border-t border-gray-200">
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-red-500 transition-colors">
                        <i class="fas fa-sign-out-alt text-lg"></i>
                        <span class="font-medium">Déconnexion</span>
                    </a>
                </div>
            </div>
        </aside>

        @yield('content')