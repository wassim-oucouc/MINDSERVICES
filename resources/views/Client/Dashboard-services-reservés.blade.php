@extends('layout.client')

@section('title', 'Home')

@section('services-réservés', 'flex items-center px-3 py-2 text-sm font-medium rounded-md bg-blue-50 text-blue-600')

@section('content')
        
<!-- CONTENU PRINCIPAL -->
<div class="flex-1 overflow-auto pt-16 md:pt-0 md:ml-0">
    <!-- En-tête avec dégradé comme dans la page de recherche -->
    <div class="bg-gradient-to-r from-blue-700 to-teal-500 py-8 relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-10"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Services réservés</h1>
            <p class="mt-2 text-blue-100">Gérez vos réservations de services en cours</p>
        </div>
        <!-- Vague décorative en bas -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-8 text-gray-50 fill-current">
                <path d="M0,96L48,85.3C96,75,192,53,288,48C384,43,480,53,576,69.3C672,85,768,107,864,101.3C960,96,1056,64,1152,48C1248,32,1344,32,1392,32L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>
    
    <main class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8 -mt-6 relative z-10">
        <!-- Notification de succès -->
        @if (session('done'))
        <div class="mb-6">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl shadow-sm relative" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2 text-green-500"></i>
                    <div>
                        <strong class="font-bold">Succès!</strong>
                        <span class="block sm:inline ml-1">{{ session('done') }}</span>
                    </div>
                </div>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none'">
                        <title>Fermer</title>
                        <path d="M10 9l-5-5-1.41 1.41L8.59 10l-5 5L5 16l5-5 5 5 1.41-1.41-5-5 5-5L15 4l-5 5z"/>
                    </svg>
                </span>
            </div>
        </div>
        @endif

        <!-- Filtres de recherche - Style amélioré -->
        <div class="bg-white shadow-lg rounded-xl mb-6 overflow-hidden border border-gray-100">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Filtres</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1.5 text-xs border border-gray-300 rounded-lg shadow-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">Réinitialiser</button>
                        <button class="px-3 py-1.5 text-xs border border-transparent rounded-lg shadow-sm font-medium text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors duration-200">Appliquer</button>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <div>
                        <label for="status" class="block text-xs font-medium text-gray-700 mb-1">Statut</label>
                        <select id="status" class="w-full text-sm rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                            <option value="">Tous</option>
                            <option value="pending">En attente</option>
                            <option value="confirmed">Confirmé</option>
                            <option value="completed">Terminé</option>
                            <option value="cancelled">Annulé</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block text-xs font-medium text-gray-700 mb-1">Catégorie</label>
                        <select id="category" class="w-full text-sm rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                            <option value="">Toutes</option>
                            <option value="plumbing">Plomberie</option>
                            <option value="electricity">Électricité</option>
                            <option value="gardening">Jardinage</option>
                            <option value="cleaning">Ménage</option>
                            <option value="computer">Informatique</option>
                        </select>
                    </div>
                    <div>
                        <label for="date" class="block text-xs font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" id="date" class="w-full text-sm rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200" />
                    </div>
                    <div>
                        <label for="search" class="block text-xs font-medium text-gray-700 mb-1">Recherche</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search h-3 w-3 text-blue-500"></i>
                            </div>
                            <input type="text" id="search" class="w-full text-sm rounded-lg border-gray-300 pl-10 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200" placeholder="Rechercher..." />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- LISTE DES SERVICES RÉSERVÉS - Style amélioré -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gradient-to-r from-blue-50 to-teal-50">
                <h3 class="text-lg font-semibold text-gray-800">Services réservés</h3>
                <span class="text-xs text-white bg-gradient-to-r from-blue-600 to-teal-500 px-2.5 py-1 rounded-full font-medium">8 services</span>
            </div>
            
            <ul class="divide-y divide-gray-200">
                @foreach($reservation as $value)
                <!-- Service Item - Style amélioré -->
                <li class="hover:bg-blue-50/30 transition-colors duration-150">
                    <div class="px-6 py-5">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-14 w-14 rounded-lg bg-gradient-to-br from-blue-100 to-teal-100 flex items-center justify-center shadow-sm overflow-hidden">
                                    <img src="/storage/{{$value->Service->Photo}}" alt="{{$value->Service->titre}}" class="h-full w-full object-cover">
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-semibold text-gray-900">{{$value->Professional->service_principal}}</p>
                                    <p class="text-xs text-gray-600 mt-0.5">{{$value->Service->titre}}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                @if($value->status == 'En attente')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-1.5"></span>
                                    En attente
                                </span>
                                @elseif($value->status == 'Confirmée')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-1.5"></span>
                                    Confirmée
                                </span>
                                @elseif($value->status == 'Terminée')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></span>
                                    Terminée
                                </span>
                                @elseif($value->status == 'Annulée')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-red-400 rounded-full mr-1.5"></span>
                                    Annulée
                                </span>
                                @elseif($value->status == 'En cours')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-sky-100 text-sky-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-sky-400 rounded-full mr-1.5"></span>
                                    En cours
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Informations détaillées -->
                        <div class="mt-3 grid grid-cols-2 gap-2 text-xs text-gray-600">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-1.5 h-3 w-3 text-blue-500"></i>
                                {{$value->Prestataire->Prenom}} {{$value->Prestataire->Nom}}
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt mr-1.5 h-3 w-3 text-blue-500"></i>
                                {{$value->created_at->format('d/m/Y')}}
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-1.5 h-3 w-3 text-blue-500"></i>
                                À domicile
                            </div>
                        </div>
                        
                        <!-- Boutons d'action - Style amélioré -->
                        <div class="mt-4 flex justify-end space-x-2">
                            @if($value->status == 'En attente')
                            <button class="px-3 py-1.5 text-xs border border-gray-300 rounded-lg shadow-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                                <i class="fas fa-times-circle mr-1 text-gray-500"></i> Annuler
                            </button>
                            <a href="/client/reservation/details/{{$value->id}}" class="px-3 py-1.5 text-xs border border-transparent rounded-lg shadow-sm font-medium text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors duration-200">
                                <i class="fas fa-info-circle mr-1"></i> Voir Détails
                            </a>
                            <a href="mailto:{{$value->Prestataire->Email}}" class="px-3 py-1.5 text-xs border border-transparent rounded-lg shadow-sm font-medium text-white bg-gray-600 hover:bg-gray-700 transition-colors duration-200">
                                <i class="fas fa-envelope mr-1"></i> Contacter
                            </a>
                            @elseif($value->status == 'Terminée')
                            <form action="/client/reservation/avis/{{$value->Service->id}}" method="POST">
                                @csrf 
                                <input type="hidden" name="prestataire_id" value="{{$value->Prestataire->id}}">
                                <button type="submit" class="px-3 py-1.5 text-xs border border-transparent rounded-lg shadow-sm font-medium text-white bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-600 hover:to-yellow-600 transition-colors duration-200">
                                    <i class="fas fa-star mr-1"></i> Donner L'avis
                                </button>
                            </form>
                            <a href="/client/reservation/details/{{$value->id}}" class="px-3 py-1.5 text-xs border border-transparent rounded-lg shadow-sm font-medium text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors duration-200">
                                <i class="fas fa-info-circle mr-1"></i> Voir Détails
                            </a>
                            @elseif($value->status == 'Annulée' || $value->status == 'Confirmée')
                            <a href="/client/reservation/details/{{$value->id}}" class="px-3 py-1.5 text-xs border border-transparent rounded-lg shadow-sm font-medium text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors duration-200">
                                <i class="fas fa-info-circle mr-1"></i> Voir Détails
                            </a>
                            @endif
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            
            <!-- Pagination - Style amélioré -->
            <div class="bg-gradient-to-r from-blue-50 to-teal-50 px-6 py-4 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <div class="flex justify-between items-center">
                        {{$reservation->links()}}
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const menuButton = document.getElementById('menuButton');
        menuButton.addEventListener('click', () => sidebar.classList.toggle('hidden'));
    });
</script>

@endsection