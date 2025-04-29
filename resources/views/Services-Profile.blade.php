@extends('layout.app')

@section('title', 'Services')
@section('content')

    <!-- Section principale -->
    <div class="bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            <!-- Partie supérieure : bannière et photo de profil -->
            <div class="relative mb-8">
                <div class="h-48 sm:h-64 w-full rounded-xl overflow-hidden bg-indigo-700">
                    <img src="https://images.pexels.com/photos/19670/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-indigo-800 opacity-90 h-48 sm:h-64 w-full">
                </div>
                <div class="absolute bottom-0 left-6 transform translate-y-1/2 flex items-end">
                    <div class="h-24 w-24 sm:h-32 sm:w-32 rounded-full border-4 border-white overflow-hidden bg-white">
                        <img src="/storage/{{$prestatairedetails->utilisateur->Photo}}" alt="{{$prestatairedetails->utilisateur->Prenom}} {{$prestatairedetails->utilisateur->Nom}}" class="h-full w-full object-cover">
                    </div>
                    <div class="ml-4 pb-2">
                        <h1 class="text-xl sm:text-xl font-bold text-black">{{$prestatairedetails->utilisateur->Prenom}} {{$prestatairedetails->utilisateur->Nom}}</h1>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                @for( $i = 1 ; $i <= 5 ; $i++)
                                    @if($i <= $AvisAverage)
                                        <i class="fas fa-star"></i> 
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor   
                            </div>
                            <span class="ml-2 text-black font-medium">{{$AvisAverage}}<span class="text-black-200">({{$TotalAvisPrestataire}} avis)</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation du profil -->
            <div class="mt-16 mb-8 border-b border-gray-200">
                <nav class="flex -mb-px space-x-8">
                    <a href="/prestataire/profile/{{$prestatairedetails->utilisateur->id}}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Vue d'ensemble</a>
                    <a href="/prestataire/services/{{$prestatairedetails->utilisateur->id}}" class="border-indigo-500 text-indigo-600 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Services</a>
                    <a href="/prestataire/avis/{{$prestatairedetails->utilisateur->id}}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Avis clients</a>
                </nav>
            </div>

            <!-- En-tête des services -->
            <div class="bg-white rounded-xl p-6 shadow-md mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <p class="text-gray-600">Découvrez les services professionnels offerts par ce prestataire</p>
                    </div>
                </div>
            </div>

            <!-- Filtres de services -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-indigo-50 text-indigo-700 border border-indigo-300 hover:bg-indigo-100 transition">
                    Tous les services
                </button>
                <button class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 transition">
                    Plomberie
                </button>
                <button class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 transition">
                    Électricité
                </button>
                <button class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 transition">
                    Peinture
                </button>
                <div class="inline-flex ml-auto">
                <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option>Prix: croissant</option>
                        <option>Prix: décroissant</option>
                        <option>Popularité</option>
                        <option>Récemment ajoutés</option>
                    </select>
                </div>
            </div>

            <!-- Liste des services -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($ServicesPaginate as $service)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md transition-all hover:shadow-lg">
                        <div class="h-48 overflow-hidden">
                            <img src="/storage/{{$service->Photo}}" alt="{{$service->titre}}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-bold text-gray-900">{{$service->titre}}</h3>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                {{$service->Category->Nom}}
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{$service->Description}}</p>
                            <div class="flex justify-between items-center">
                                <div class="text-xl font-bold text-indigo-600">{{$service->Prix}} €/H</div>
                                <a href="service/details/{{$service->id}}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Voir détails
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-10">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    {{$ServicesPaginate->links()}}
                </nav>
            </div>
        </div>
    </div>

@endsection