@extends('layout.app')

@section('title', 'Avis clients')
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
                    <a href="/prestataire/services/{{$prestatairedetails->utilisateur->id}}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Services</a>
                    <a href="/prestataire/avis/{{$prestatairedetails->utilisateur->id}}" class="border-indigo-500 text-indigo-600 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Avis clients</a>
                </nav>
            </div>

            <!-- En-tête des avis -->
            <div class="bg-white rounded-xl p-6 shadow-md mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Avis clients ({{$TotalAvisPrestataire}})</h2>
                        <p class="text-gray-600">Découvrez ce que nos clients disent de ce prestataire</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-6 flex flex-col items-center">
                        <div class="text-5xl font-bold text-gray-900 mb-2">{{$AvisAverage}}</div>
                        <div class="flex text-yellow-400 mb-2">
                            @for( $i = 1 ; $i <= 5 ; $i++)
                                @if($i <= $AvisAverage)
                                    <i class="fas fa-star"></i> 
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor   
                        </div>
                        <p class="text-gray-500 text-sm">Sur {{$TotalAvisPrestataire}} avis</p>
                    </div>
                </div>
                              

            <!-- Filtres d'avis -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 transition">
                    Peinture
                </button>
                <button class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 transition">
                    5 étoiles
                </button>
                <div class="inline-flex ml-auto">
                    <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option>Plus récents</option>
                        <option>Plus anciens</option>
                        <option>Meilleure note</option>
                        <option>Note la plus basse</option>
                    </select>
                </div>
            </div>

            <!-- Liste des avis -->
            <div class="space-y-6">
                @foreach($AvisPaginate as $avis)
                    @if($avis->status == 'Approuvé' && $avis->prestataire_id == $prestatairedetails->utilisateur->id)
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-start">
                                    <div class="h-12 w-12 rounded-full overflow-hidden mr-4">
                                        <img src="/storage/{{$avis->Client->Photo}}" alt="{{$avis->Client->Prenom}} {{$avis->Client->Nom}}" class="h-full w-full object-cover">
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-900">{{$avis->Client->Prenom}} {{$avis->Client->Nom}}</h3>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                @for( $i = 1 ; $i <= 5 ; $i++)
                                                    @if($i <= $avis->Note)
                                                        <i class="fas fa-star"></i> 
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor  
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">{{$avis->Note}}</span>
                                        </div>
                                    </div>
                                </div>
                                {{$avis->created_at->locale('fr')->diffForHumans()}}
                            </div>
                            <p class="text-gray-600 mb-4">
                            {{$avis->Commentaire}}
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-10">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    {{$AvisPaginate->links()}}
                </nav>
            </div>
        </div>
    </div>

@endsection