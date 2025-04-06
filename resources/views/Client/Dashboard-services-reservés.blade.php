@extends('layout.client')

@section('title', 'Home')

@section('services-réservés', 'flex items-center px-2 py-2 text-sm font-medium rounded-md bg-indigo-50 text-indigo-600')

@section('content')
        
<!-- CONTENU PRINCIPAL -->
<div class="flex-1 overflow-auto pt-16 md:pt-0 md:ml-0">
    <div class=" from-indigo-600  shadow-lg">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Services réservés</h1>
        </div>
    </div>
    
    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Filtres de recherche -->
        <div class="bg-white shadow-lg rounded-xl mb-8 overflow-hidden border border-gray-100">
            <div class="px-6 py-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Filtrer les services</h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Statut</label>
                        <select id="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-colors duration-200">
                            <option value="">Tous les statuts</option>
                            <option value="pending">En attente</option>
                            <option value="confirmed">Confirmé</option>
                            <option value="completed">Terminé</option>
                            <option value="cancelled">Annulé</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                        <select id="category" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-colors duration-200">
                            <option value="">Toutes les catégories</option>
                            <option value="plumbing">Plomberie</option>
                            <option value="electricity">Électricité</option>
                            <option value="gardening">Jardinage</option>
                            <option value="cleaning">Ménage</option>
                            <option value="computer">Informatique</option>
                        </select>
                    </div>
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                        <input type="date" id="date" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-colors duration-200" />
                    </div>
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Recherche</label>
                        <div class="relative rounded-lg shadow-sm">
                            <input type="text" id="search" class="w-full rounded-lg border-gray-300 pr-10 focus:border-indigo-500 focus:ring-indigo-500 transition-colors duration-200" placeholder="Rechercher..." />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-search h-4 w-4 text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                    <button class="px-5 py-2.5 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">Réinitialiser</button>
                    <button class="px-5 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">Appliquer les filtres</button>
                </div>
            </div>
        </div>
        
        <!-- LISTE DES SERVICES RÉSERVÉS -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <div class="px-6 py-5 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center">
                <h3 class="text-xl font-semibold text-gray-900">Tous les services réservés</h3>
                <span class="text-sm text-gray-500 mt-2 sm:mt-0 bg-gray-100 px-3 py-1 rounded-full">8 services</span>
            </div>
            
            <ul class="divide-y divide-gray-200">
                @foreach($reservation as $value)
                <!-- Service Item -->
                <li class="hover:bg-gray-50 transition-colors duration-150">
                    <div class="px-6 py-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-14 w-14 rounded-full bg-indigo-100 flex items-center justify-center shadow overflow-hidden">
                                    <img src="/storage/{{$value->Service->Photo}}" alt="{{$value->Service->titre}}" class="h-full w-full object-cover">
                                </div>
                                <div class="ml-4">
                                    <p class="text-base font-medium text-gray-900">{{$value->Professional->service_principal}}</p>
                                    <p class="text-sm text-gray-600 mt-1">{{$value->Service->titre}}</p>
                                </div>
                            </div>
                            <div class="mt-4 sm:mt-0 flex items-center gap-3">
                                @if($value->status == 'En attente')
                                <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 flex items-center">
                                    <span class="w-2 h-2 bg-yellow-400 rounded-full mr-1.5"></span>
                                    En attente
                                </span>
                                @elseif($value->status == 'Confirmée')
                                <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-green-100 text-green-800 flex items-center">
                                    <span class="w-2 h-2 bg-green-400 rounded-full mr-1.5"></span>
                                    Confirmée
                                </span>
                                @elseif($value->status == 'Terminée')
                                <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-gray-100 text-gray-800 flex items-center">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full mr-1.5"></span>
                                    Terminée
                                </span>
                                @elseif($value->status == 'Annulée')
                                <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-red-100 text-red-800 flex items-center">
                                    <span class="w-2 h-2 bg-red-400 rounded-full mr-1.5"></span>
                                    Annulée
                                </span>
                                @elseif($value->status == 'En cours')
                                <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-blue-100 text-blue-800 flex items-center">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-1.5"></span>
                                    En cours
                                </span>
                                @endif
                                
                                <button class="text-gray-400 hover:text-gray-600 transition-colors p-1">
                                    <i class="fas fa-ellipsis-v h-5 w-5"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6">
                                <p class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-user mr-2 h-4 w-4 text-indigo-500"></i>
                                    {{$value->Prestataire->Prenom}} {{$value->Prestataire->Nom}}
                                </p>
                                <p class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-calendar-alt mr-2 h-4 w-4 text-indigo-500"></i>
                                    {{$value->created_at->format('d/m/Y')}}
                                </p>
                            </div>
                            <div class="flex items-center justify-start md:justify-end text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt mr-2 h-4 w-4 text-indigo-500"></i>
                                <p>À domicile</p>
                            </div>
                        </div>
                        <div class="mt-5 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                            @if($value->status == 'En attente')
                            <button class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">Annuler</button>
                            <button class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">Détails</button>
                            @elseif($value->status == 'Terminée')
                            
                            <div class ="flex flex-col gap-4">
                            <p class="text-indigo-600 hover:text-indigo-500 flex items-center cursor-pointer transition-colors duration-200">
                                <span>Laisser un avis</span> <i class="fas fa-star ml-2 h-4 w-4"></i>
                            </p>
                            <button class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">Facture</button>
                            <button class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">Détails</button>
                            </div>
                            @elseif($value->status == 'Annulée' || $value->status == 'Confirmée')
                            <div class ="flex flex-col gap-4">
                            <button class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">Nouvelle Réservation</button>
                           <a class = "px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200" href="/client/reservation/details/{{$value->id}}">
                            <button>Détails</button>
                            </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            
            <!-- Pagination -->
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <button class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200" disabled>
                        <i class="fas fa-chevron-left mr-2"></i> Précédent
                    </button>
                    <div class="hidden md:flex space-x-1">
                        <button class="px-4 py-2 border border-indigo-600 rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">1</button>
                        <button class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">2</button>
                        <button class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">3</button>
                    </div>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                        Suivant <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- JavaScript pour la gestion de la barre latérale -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const menuButton = document.getElementById('menuButton');

        // Fonction pour ouvrir/fermer le menu
        function toggleSidebar() {
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
            } else {
                sidebar.classList.add('hidden');
            }
        }

        // Ajout des event listeners
        menuButton.addEventListener('click', toggleSidebar);
        
        // Gestion de la fermeture du menu sur petit écran lors d'un clic en dehors
        document.addEventListener('click', function(event) {
            const isSmallScreen = window.innerWidth < 768;
            const isClickedOutside = !sidebar.contains(event.target) && !menuButton.contains(event.target);
            
            if (isSmallScreen && isClickedOutside && !sidebar.classList.contains('hidden')) {
                sidebar.classList.add('hidden');
            }
        });
    });
</script>

@endsection