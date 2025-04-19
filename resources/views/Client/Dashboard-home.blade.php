@extends('layout.client')

@section('title', 'Home')

@section('home', 'flex items-center px-2 py-2 text-sm font-medium rounded-md bg-indigo-50 text-indigo-600')



@section('content')
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
                        <h2 class="text-lg font-medium text-gray-900">Bienvenue, {{$client->Prenom}} !</h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Que souhaitez-vous faire aujourd'hui ?
                        </p>
                        <div class="mt-4 flex flex-wrap gap-3">
                            <a href="/services" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                <i class="fas fa-search mr-2"></i> Rechercher un service
                            </a>    
                        </div>
                    </div>
                </div>

                <!-- Services Réservés Section -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-medium text-gray-900">Services réservés</h2>
                        <a target = "_blank" href="/client/reservation" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                            Voir tout <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <ul class="divide-y divide-gray-200">
                            @foreach($reservations as $reservation)
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <i class="fas fa-wrench text-indigo-600"></i>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-900">{{$reservation->CategorieNom}}</p>
                                                <p class="text-sm text-gray-500">{{$reservation->titre}}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2">
                                        @if($reservation->status == 'En attente')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-1"></span>
                                    En attente
                                </span>
                                @elseif($reservation->status == 'Confirmée')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-1"></span>
                                    Confirmée
                                </span>
                                @elseif($reservation->status == 'Terminée')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1"></span>
                                    Terminée
                                </span>
                                @elseif($reservation->status == 'Annulée')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-red-400 rounded-full mr-1"></span>
                                    Annulée
                                </span>
                                @elseif($reservation->status == 'En cours')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-sky-100 text-sky-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-sky-400 rounded-full mr-1"></span>
                                    En cours
                                </span>
                                @endif
                                            <button class="text-gray-400 hover:text-gray-500">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-user mr-1.5 text-gray-400"></i>
                                                {{$reservation->Prenom}} {{$reservation->Nom}}
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                                <i class="fas fa-calendar mr-1.5 text-gray-400"></i>
                                                {{$reservation->reservation_date}}, {{$reservation->reservation_time}}
                                            </p>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                            <i class="fas fa-map-marker-alt mr-1.5 text-gray-400"></i>
                                            <p>À domicile</p>
                                        </div>
                                    </div>
                                </div>
</li>
@endforeach
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
                                <div class="h-20 w-21 rounded-full bg-indigo-100 flex items-center justify-center">
                                    <img src = "/storage/{{$client->Photo}}" class="h-24 w-24 rounded-full flex items-center justify-center">
                                </div>
                                <div class="ml-6">
                                    <h4 class="text-xl font-medium text-gray-900">{{$client->Prenom}} {{$client->Nom}}</h4>
                                    <p class="text-sm text-gray-500">inscrit  {{$client->created_at}}</p>
                                    <p class="mt-1 text-sm text-gray-600">
                                        <i class="fas fa-map-marker-alt mr-1.5 text-gray-400"></i>
                                        {{$client->pays}}
                                    </p>
                                    <p class="mt-1 text-sm text-gray-600">
                                        <i class="fas fa-envelope mr-1.5 text-gray-400"></i>
                                        {{$client->Email}}
                                    </p>
                                    <p class="mt-1 text-sm text-gray-600">
                                        <i class="fas fa-phone mr-1.5 text-gray-400"></i>
                                        {{$client->telephone}}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 flex justify-end">
                                <a href="/client/profile" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
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

@endsection