<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <div class="md:hidden fixed z-20 p-4 bg-white shadow-sm">
            <button id="menuButton" class="text-gray-500 focus:outline-none focus:text-gray-600">
                <i class="fas fa-bars h-6 w-6"></i>
            </button>
        </div>
        
        <div id="sidebar" class="fixed md:relative z-10 w-64 bg-white shadow-md h-full hidden md:block">
            <div class="relative z-10 bg-white h-full flex flex-col">
                <div class="px-4 py-6">
                    <div class="flex items-center mb-6">
                        <div class="h-12 w-12 rounded-full flex items-center justify-center">
                            <img src = "/storage/{{Auth::user()->Photo}}" class="h-9 w-9 rounded-full flex items-center justify-center">
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{Auth::user()->Prenom}} {{Auth::user()->Nom}}</p>
                            <p class="text-xs text-gray-500">{{Auth::user()->Email}}</p>
                        </div>
                    </div>
                    
                    <nav class="h-135 space-y-1">
                        <a href="/client/overview" class="@yield('home') flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <i class="fas fa-home mr-3 h-5 w-5 text-gray-400"></i>
                            Tableau de bord
                        </a>
                        <a href="/client/reservation" class="@yield('services-réservés') flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <i class="fas fa-calendar-alt mr-3 h-5 w-5 text-indigo-500"></i>
                            Services réservés
                        </a>
                        <a href="/services" target = "_blank" class="@yield('recherche') flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <i class="fas fa-search mr-3 h-5 w-5 text-gray-400"></i>
                            Rechercher un service
                        </a>
                        <a href="/" class="@yield('favoris') flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <i class="fas fa-heart mr-3 h-5 w-5 text-gray-400"></i>
                            Favoris
                        </a>
                        <a href="/client/profile" class="@yield('profil') flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <i class="fas fa-user mr-3 h-5 w-5 text-gray-400"></i>
                            Profil
                        </a>
                        <a href="/client/settings" class="@yield('paramètres') flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <i class="fas fa-cog mr-3 h-5 w-5 text-gray-400"></i>
                            Paramètres
                        </a>
                    </nav>
                </div>
                
                <div class="mt-auto border-t border-gray-200 px-4 py-4">
                    <a href="/" class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-red-600 hover:bg-red-50">
                        <i class="fas fa-sign-out-alt mr-3 h-5 w-5 text-red-500"></i>
                        Déconnexion
                    </a>
                </div>
            </div>
        </div>

        @yield('content')




        
<script src = "/js/FormFeedbackReservation.js"></script>