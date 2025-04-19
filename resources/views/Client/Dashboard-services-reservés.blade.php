@extends('layout.client')

@section('title', 'Home')

@section('services-réservés', 'flex items-center px-3 py-2 text-sm font-medium rounded-md bg-blue-50 text-blue-600')

@section('content')
        
<!-- CONTENU PRINCIPAL -->
<div class="flex-1 overflow-auto pt-16 md:pt-0 md:ml-0">
    <div class="bg-gradient-to-r from-blue-600 to-sky-500 shadow-lg">
        <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-white">Services réservés</h1>
        </div>
    </div>
    
    <main class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Filtres de recherche - Structure compacte -->
        <div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden border border-gray-100">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Filtres</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1.5 text-xs border border-gray-300 rounded shadow-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">Réinitialiser</button>
                        <button class="px-3 py-1.5 text-xs border border-transparent rounded shadow-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">Appliquer</button>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <div>
                        <label for="status" class="block text-xs font-medium text-gray-700 mb-1">Statut</label>
                        <select id="status" class="w-full text-sm rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                            <option value="">Tous</option>
                            <option value="pending">En attente</option>
                            <option value="confirmed">Confirmé</option>
                            <option value="completed">Terminé</option>
                            <option value="cancelled">Annulé</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block text-xs font-medium text-gray-700 mb-1">Catégorie</label>
                        <select id="category" class="w-full text-sm rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
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
                        <input type="date" id="date" class="w-full text-sm rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200" />
                    </div>
                    <div>
                        <label for="search" class="block text-xs font-medium text-gray-700 mb-1">Recherche</label>
                        <div class="relative rounded shadow-sm">
                            <input type="text" id="search" class="w-full text-sm rounded border-gray-300 pr-8 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200" placeholder="Rechercher..." />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-search h-3 w-3 text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- LISTE DES SERVICES RÉSERVÉS -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-100">
        @if (session('done'))
    <div class="max-w-6xl mx-auto mt-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Succès!</strong>
            <span class="block sm:inline">{{ session('done') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none'">
                    <title>Fermer</title>
                    <path d="M10 9l-5-5-1.41 1.41L8.59 10l-5 5L5 16l5-5 5 5 1.41-1.41-5-5 5-5L15 4l-5 5z"/>
                </svg>
            </span>
        </div>
    </div>
@endif
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-800">Services réservés</h3>
                <span class="text-xs text-white bg-blue-600 px-2 py-1 rounded-full font-medium">8 services</span>
            </div>
            
            <ul class="divide-y divide-gray-200">
                @foreach($reservation as $value)
                <!-- Service Item - Structure améliorée -->
                <li class="hover:bg-gray-50 transition-colors duration-150">
                    <div class="px-6 py-4">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center shadow overflow-hidden">
                                    <img src="/storage/{{$value->Service->Photo}}" alt="{{$value->Service->titre}}" class="h-full w-full object-cover">
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{$value->Professional->service_principal}}</p>
                                    <p class="text-xs text-gray-600">{{$value->Service->titre}}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                @if($value->status == 'En attente')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-1"></span>
                                    En attente
                                </span>
                                @elseif($value->status == 'Confirmée')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-1"></span>
                                    Confirmée
                                </span>
                                @elseif($value->status == 'Terminée')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1"></span>
                                    Terminée
                                </span>
                                @elseif($value->status == 'Annulée')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-red-400 rounded-full mr-1"></span>
                                    Annulée
                                </span>
                                @elseif($value->status == 'En cours')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-sky-100 text-sky-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-sky-400 rounded-full mr-1"></span>
                                    En cours
                                </span>
                                @endif
                                
                               
                            </div>
                        </div>
                        
                        <div class="mt-3 grid grid-cols-2 gap-2 text-xs text-gray-600">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-1 h-3 w-3 text-blue-500"></i>
                                {{$value->Prestataire->Prenom}} {{$value->Prestataire->Nom}}
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt mr-1 h-3 w-3 text-blue-500"></i>
                                {{$value->created_at->format('d/m/Y')}}
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-1 h-3 w-3 text-blue-500"></i>
                                À domicile
                            </div>
                        </div>
                        
                        <!-- Buttons - Structure réorganisée en ligne -->
                        <div class="mt-3 flex justify-end space-x-2">
                            @if($value->status == 'En attente')
                            <button class="px-2 py-1 text-xs border border-gray-300 rounded shadow-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">Annuler</button>
                            <a href="/client/reservation/details/{{$value->id}}" class="px-2 py-1 text-xs border border-transparent rounded shadow-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
                            Voir Détails Réservation
                            </a>
                            <a href="mailto:{{$value->Prestataire->Email}}" class="px-2 py-1 text-xs border border-transparent rounded shadow-sm font-medium text-white bg-gray-600 hover:bg-gray-700 transition-colors duration-200">
                                Contacter Préstataire
                            </a>
                            @elseif($value->status == 'Terminée')
                            <form action="/client/reservation/avis/{{$value->Service->id}}" method = "POST">
                                @csrf 
                                <input type="hidden" name="prestataire_id" value ="{{$value->Prestataire->id}}" >

                            <button type = "submit" class="px-2 py-1 text-xs border border-transparent rounded shadow-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 transition-colors duration-200">Donner L'avis</button>
                            </form>
                            <a href="/client/reservation/details/{{$value->id}}" class="px-2 py-1 text-xs border border-transparent rounded shadow-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
                                Voir Détails Réservation
                            </a>
                            @elseif($value->status == 'Annulée' || $value->status == 'Confirmée')
                            <a href="/client/reservation/details/{{$value->id}}" class="px-2 py-1 text-xs border border-transparent rounded shadow-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
                                Voir Détails Réservation
                            </a>
                            @endif
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            
            <!-- Pagination - Style compact -->
            <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
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