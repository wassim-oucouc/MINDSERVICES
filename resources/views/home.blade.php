<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINDSERVICE - Espace Client</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Header avec Navigation -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-indigo-600 font-bold text-xl">MINDSERVICE</a>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">
                        <div class="ml-3 relative">
                            <div>
                                <button type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button">
                                    <span class="sr-only">Ouvrir le menu utilisateur</span>
                                    <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                        <span class="text-indigo-800 font-semibold">JD</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <a href="#" class="ml-4 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bell"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex min-h-screen">
        <!-- Sidebar Navigation -->
        <div class="w-64 bg-white shadow-md hidden md:block">
            <div class="px-4 py-6">
                <div class="flex items-center mb-6">
                    <div class="h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-indigo-800 font-semibold">JD</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Jean Dupont</p>
                        <p class="text-xs text-gray-500">jean.dupont@email.com</p>
                    </div>
                </div>

                <nav class="space-y-1">
                    <a href="#" class="flex items-center px-2 py-2 text-sm font-medium rounded-md bg-indigo-50 text-indigo-600">
                        <i class="fas fa-home mr-3 text-indigo-500"></i>
                        Tableau de bord
                    </a>
                    <a href="#" class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
                        Services réservés
                    </a>
                    <a href="#" class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-search mr-3 text-gray-400"></i>
                        Rechercher un service
                    </a>
                    <a href="#" class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-heart mr-3 text-gray-400"></i>
                        Favoris
                    </a>
                    <a href="#" class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-comment-alt mr-3 text-gray-400"></i>
                        Messages
                    </a>
                    <a href="#" class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-user mr-3 text-gray-400"></i>
                        Profil
                    </a>
                    <a href="#" class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        <i class="fas fa-cog mr-3 text-gray-400"></i>
                        Paramètres
                    </a>
                </nav>
            </div>
            <div class="border-t border-gray-200 px-4 py-4">
                <a href="#" class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-red-600 hover:bg-red-50">
                    <i class="fas fa-sign-out-alt mr-3 text-red-500"></i>
                    Déconnexion
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Dashboard Header -->
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900">Tableau de bord</h1>
                </div>
            </div>

            <!-- Dashboard Content -->
            <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Welcome Card -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="px-4 py-5 sm:p-6">
                        <h2 class="text-lg font-medium text-gray-900">Bienvenue, Jean !</h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Que souhaitez-vous faire aujourd'hui ?
                        </p>
                        <div class="mt-4 flex flex-wrap gap-3">
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                <i class="fas fa-search mr-2"></i> Rechercher un service
                            </a>
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                <i class="fas fa-calendar-plus mr-2"></i> Nouvelle réservation
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Services Réservés Section -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-medium text-gray-900">Services réservés</h2>
                        <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                            Voir tout <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <ul class="divide-y divide-gray-200">
                            <!-- Service 1 -->
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <i class="fas fa-wrench text-indigo-600"></i>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-900">Plomberie</p>
                                                <p class="text-sm text-gray-500">Réparation robinet cuisine</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                                En attente
                                            </span>
                                            <button class="text-gray-400 hover:text-gray-500">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-user mr-1.5 text-gray-400"></i>
                                                Martin Leblanc
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                                <i class="fas fa-calendar mr-1.5 text-gray-400"></i>
                                                6 avril 2025, 14:00
                                            </p>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                            <i class="fas fa-map-marker-alt mr-1.5 text-gray-400"></i>
                                            <p>À domicile</p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Service 2 -->
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <i class="fas fa-leaf text-indigo-600"></i>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-900">Jardinage</p>
                                                <p class="text-sm text-gray-500">Tonte de pelouse</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                                Confirmé
                                            </span>
                                            <button class="text-gray-400 hover:text-gray-500">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-user mr-1.5 text-gray-400"></i>
                                                Émilie Robert
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                                <i class="fas fa-calendar mr-1.5 text-gray-400"></i>
                                                10 avril 2025, 10:00
                                            </p>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                            <i class="fas fa-map-marker-alt mr-1.5 text-gray-400"></i>
                                            <p>À domicile</p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Service 3 -->
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <i class="fas fa-desktop text-indigo-600"></i>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-900">Informatique</p>
                                                <p class="text-sm text-gray-500">Réparation ordinateur</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                                Terminé
                                            </span>
                                            <button class="text-gray-400 hover:text-gray-500">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-user mr-1.5 text-gray-400"></i>
                                                Thomas Mercier
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                                <i class="fas fa-calendar mr-1.5 text-gray-400"></i>
                                                28 mars 2025, 16:30
                                            </p>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-500">
                                                Laisser un avis <i class="fas fa-star ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Two Column Layout for Stats and Profile -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Stats Card -->
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Vos statistiques</h3>
                            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                                <div class="bg-gray-50 overflow-hidden rounded-lg">
                                    <div class="px-4 py-5 sm:p-6">
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Services réservés
                                        </dt>
                                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                            8
                                        </dd>
                                    </div>
                                </div>
                                <div class="bg-gray-50 overflow-hidden rounded-lg">
                                    <div class="px-4 py-5 sm:p-6">
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Services terminés
                                        </dt>
                                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                            5
                                        </dd>
                                    </div>
                                </div>
                                <div class="bg-gray-50 overflow-hidden rounded-lg">
                                    <div class="px-4 py-5 sm:p-6">
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            À venir
                                        </dt>
                                        <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                            2
                                        </dd>
                                    </div>
                                </div>
                                <div class="bg-gray-50 overflow-hidden rounded-lg">
                                    <div class="px-4 py-5 sm:p-6">
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Note moyenne
                                        </dt>
                                        <dd class="mt-1 text-3xl font-semibold text-gray-900 flex items-center">
                                            4.8
                                            <div class="ml-2 text-yellow-400 text-lg flex">
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Summary -->
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Profil</h3>
                                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                    Modifier <i class="fas fa-edit ml-1"></i>
                                </a>
                            </div>
                            <div class="flex items-center">
                                <div class="h-24 w-24 rounded-full bg-indigo-100 flex items-center justify-center">
                                    <span class="text-indigo-800 font-semibold text-2xl">JD</span>
                                </div>
                                <div class="ml-6">
                                    <h4 class="text-xl font-medium text-gray-900">Jean Dupont</h4>
                                    <p class="text-sm text-gray-500">Membre depuis janvier 2025</p>
                                    <p class="mt-1 text-sm text-gray-600">
                                        <i class="fas fa-map-marker-alt mr-1.5 text-gray-400"></i>
                                        Paris, France
                                    </p>
                                    <p class="mt-1 text-sm text-gray-600">
                                        <i class="fas fa-envelope mr-1.5 text-gray-400"></i>
                                        jean.dupont@email.com
                                    </p>
                                    <p class="mt-1 text-sm text-gray-600">
                                        <i class="fas fa-phone mr-1.5 text-gray-400"></i>
                                        +33 6 12 34 56 78
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 flex justify-end">
                                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                    Voir profil complet <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Settings -->
                <div class="mt-6 bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Paramètres rapides</h3>
                            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                Tous les paramètres <i class="fas fa-cog ml-1"></i>
                            </a>
                        </div>
                        <div class="mt-2 space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-700">Notifications par email</span>
                                <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 bg-indigo-600" role="switch">
                                    <span class="sr-only">Utiliser les notifications</span>
                                    <span class="translate-x-5 pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200">
                                        <span class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-0 ease-out duration-100">
                                            <svg class="h-3 w-3 text-indigo-600" fill="currentColor" viewBox="0 0 12 12">
                                                <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                            </svg>
                                        </span>
                                    </span>
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-700">Notifications SMS</span>
                                <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 bg-gray-200" role="switch">
                                    <span class="sr-only">Utiliser les notifications SMS</span>
                                    <span class="translate-x-0 pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200">
                                        <span class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-100 ease-in duration-200">
                                            <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                                <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </span>
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-700">Mode sombre</span>
                                <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 bg-gray-200" role="switch">
                                    <span class="sr-only">Utiliser le mode sombre</span>
                                    <span class="translate-x-0 pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200">
                                        <span class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-100 ease-in duration-200">
                                            <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                                <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Space -->
                <div class="h-6"></div>
            </main>
        </div>
    </div>
</body>
</html>