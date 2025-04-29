@extends('layout.client')

@section('title', 'Tableau de bord')

@section('dashboard', 'flex items-center px-3 py-2 text-sm font-medium rounded-md bg-blue-50 text-blue-600')

@section('content')

<!-- CONTENU PRINCIPAL -->
<div class="flex-1 overflow-auto pt-16 md:pt-0 md:ml-0">

    <!-- En-tête avec dégradé -->
    <div class="bg-gradient-to-r from-blue-700 to-teal-500 py-8 relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center">
                    <h1 class="text-2xl font-extrabold text-white tracking-tight">Tableau de bord</h1>
                </div>
                <div class="mt-4 md:mt-0">
                    <a target = "_blank" href="/services" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-blue-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                        <i class="fas fa-search mr-2"></i> Rechercher un service
                    </a>
                </div>
            </div>
        </div>
        <!-- Vague décorative en bas -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-8 text-gray-50 fill-current">
                <path d="M0,96L48,85.3C96,75,192,53,288,48C384,43,480,53,576,69.3C672,85,768,107,864,101.3C960,96,1056,64,1152,48C1248,32,1344,32,1392,32L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 -mt-6 relative z-10">

        <!-- Carte de bienvenue -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100 mb-8">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900">Bienvenue, {{$client->Prenom}} !</h2>
                <p class="mt-1 text-sm text-gray-600">Que souhaitez-vous faire aujourd'hui ?</p>
                <div class="mt-4 flex flex-wrap gap-3">
                    <a target = "_blank" href="/services" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors duration-200">
                        <i class="fas fa-search mr-2"></i> Rechercher un service
                    </a>
                    <a href="/client/reservation" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                        <i class="fas fa-calendar-check mr-2"></i> Mes réservations
                    </a>
                </div>
            </div>
        </div>

        <div class="mb-8">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Aperçu</h2>
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Services réservés -->
        <div class="bg-white shadow-lg rounded-xl p-5 border border-gray-100">
            <div class="flex items-center">
                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-teal-100 flex items-center justify-center">
                    <i class="fas fa-calendar-check text-blue-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-gray-900">{{$statistic['totalreservation']}}</h3>
                    <p class="text-sm text-gray-500">Total Services réservés</p>
                </div>
            </div>
        </div>

        <!-- Reservation Confirmée -->
        <div class="bg-white shadow-lg rounded-xl p-5 border border-gray-100">
            <div class="flex items-center">
                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-teal-100 flex items-center justify-center">
                    <i class="fas fa-check-circle text-blue-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-gray-900">{{$statistic['reservationconfirmer']}}</h3>
                    <p class="text-sm text-gray-500">Reservation Confirmée</p>
                </div>
            </div>
        </div>

        <!-- Reservation En attente -->
        <div class="bg-white shadow-lg rounded-xl p-5 border border-gray-100">
            <div class="flex items-center">
                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-teal-100 flex items-center justify-center">
                    <i class="fas fa-clock text-blue-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-gray-900">{{$statistic['reservationpending']}}</h3>
                    <p class="text-sm text-gray-500">Reservation En attente</p>
                </div>
            </div>
        </div>

        <!-- Reservation Annulée -->
        <div class="bg-white shadow-lg rounded-xl p-5 border border-gray-100">
            <div class="flex items-center">
                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-teal-100 flex items-center justify-center">
                    <i class="fas fa-times text-blue-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-gray-900">{{$statistic['reservationannuler']}}</h3>
                    <p class="text-sm text-gray-500">Reservation Annulée</p>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Sections principales -->
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Colonne 1: Profil et Paramètres -->
            <div class="lg:col-span-1 space-y-8">

                <!-- Carte Profil -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Votre profil</h3>
                            <a href="/client/settings" class="text-sm font-medium text-blue-600 hover:text-blue-500 flex items-center">
                                <i class="fas fa-edit mr-1"></i> Modifier
                            </a>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <div class="h-20 w-20 rounded-full bg-gradient-to-br from-blue-100 to-teal-100 flex items-center justify-center shadow overflow-hidden mb-3">
                                <img src="/storage/{{$client->Photo}}" alt="Photo de profil" class="h-full w-full object-cover">
                            </div>
                            <h4 class="text-xl font-medium text-gray-900">{{$client->Prenom}} {{$client->Nom}}</h4>
                            <p class="text-sm text-gray-500">Membre depuis {{$client->created_at}}</p>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt w-5 text-gray-400"></i>
                                <span>{{$client->pays}}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-envelope w-5 text-gray-400"></i>
                                <span>{{$client->Email}}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-phone w-5 text-gray-400"></i>
                                <span>{{$client->telephone}}</span>
                            </div>
                        </div>
                        <div class="mt-5 pt-5 border-t border-gray-200">
                            <a href="/client/profile" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <i class="fas fa-user mr-2"></i> Voir profil complet
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Paramètres rapides -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                </div>

                <!-- Support client -->
                <div class="bg-gradient-to-r from-blue-50 to-teal-50 shadow-lg rounded-xl overflow-hidden border border-blue-100">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-teal-100 flex items-center justify-center">
                                <i class="fas fa-headset text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-medium text-gray-900">Besoin d'aide ?</h3>
                                <p class="text-sm text-gray-600 mt-1">Notre équipe est disponible 7j/7</p>
                            </div>
                        </div>
                        <div class="mt-4 space-y-3">
                            <a href="/help" class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors duration-200">
                                <i class="fas fa-comments mr-2"></i> Contacter le support
                            </a>
                            <a href="/faq" class="inline-flex items-center justify-center w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                                <i class="fas fa-question-circle mr-2"></i> FAQ
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonnes 2-3: Services et Activité -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Services réservés -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Services réservés</h3>
                            <a href="/client/reservation" class="text-sm font-medium text-blue-600 hover:text-blue-700 flex items-center">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @foreach($reservations as $reservation)
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-teal-100 flex items-center justify-center">
                                        <img src="/storage/{{$reservation->Photo}}" class="h-10 w-10 rounded-full">
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
                                </div>
                            </div>
                            <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-y-2 gap-x-4">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-user mr-1.5 text-gray-400"></i>
                                    {{$reservation->Prenom}} {{$reservation->Nom}}
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-calendar mr-1.5 text-gray-400"></i>
                                    {{$reservation->reservation_date}}, {{$reservation->reservation_time}}
                                </div>
                            </div>
                            <div class="mt-4 flex justify-end">
                                <a href="/client/reservation/{{$reservation->id}}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors duration-200">
                                    <i class="fas fa-eye mr-1"></i> Détails
                                </a>
                            </div>
                        </div>
                        @endforeach

                        @if(count($reservations) == 0)
                        <div class="p-6 text-center">
                            <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-blue-50 text-blue-500 mb-4">
                                <i class="fas fa-calendar-times text-2xl"></i>
                            </div>
                            <p class="text-sm font-medium text-gray-900">Aucune réservation trouvée</p>
                            <p class="text-sm text-gray-500 mt-1">Commencez par rechercher un service</p>
                            <div class="mt-4">
                                <a target = "_blank" href="/services" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors duration-200">
                                    <i class="fas fa-search mr-2"></i> Rechercher un service
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

             

                <!-- Services recommandés -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Services recommandés</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($services as $service)
                            <a class = "cursor-pointer" target = "_blank" href="/service/details/{{$service->id}}">
                            <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md ">
                                <div class="h-32 bg-blue-50 flex items-center justify-center">
                                    <img src = "/storage/{{$service->Photo}}" class="h-32 bg-blue-50 flex items-center justify-center">
                                </div>
                                <div class="p-4">
                                    <h4 class="font-medium text-gray-900">{{$service->titre}}</h4>
                                    <p class="text-gray-500 text-sm mt-1">{{$service->Description}}</p>
                                </div>
                            </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection