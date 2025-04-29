@extends('layout.app')

@section('title', 'Profil du prestataire')
@section('content')

<!-- Section principale -->
<div class="bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Partie supérieure: bannière et photo de profil -->
        <div class="relative mb-8">
            <div class="h-48 sm:h-64 w-full rounded-xl overflow-hidden bg-indigo-700">
                <img src = "https://images.pexels.com/photos/19670/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-indigo-800 opacity-90 h-48 sm:h-64 w-full">
            </div>
            <div class="absolute bottom-0 left-6 transform translate-y-1/2 flex items-end">
                <div class="h-24 w-24 sm:h-32 sm:w-32 rounded-full border-4 border-white overflow-hidden bg-white">
                    <img src="/storage/{{$prestatairedetails->Utilisateur->Photo}}" alt="{{$prestatairedetails->Utilisateur->Prenom}} {{$prestatairedetails->Utilisateur->Nom}}" class="h-full w-full object-cover">
                </div>
                <div class="ml-4 pb-2">
                    <h1 class="text-xl sm:text-xl font-bold text-black">{{$prestatairedetails->Utilisateur->Prenom}} {{$prestatairedetails->Utilisateur->Nom}}</h1>
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
                        <span class="ml-2 text-black font-medium">{{$AvisAverage}} <span class="text-black-200">({{$TotalAvisPrestataire}} avis)</span></span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation du profil -->
        <div class="mt-16 mb-8 border-b border-gray-200">
            <nav class="flex -mb-px space-x-8">
            <a href="/prestataire/profile/{{$prestatairedetails->utilisateur->id}}" class="border-indigo-500 text-indigo-600 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Vue d'ensemble</a>
                    <a href="/prestataire/services/{{$prestatairedetails->utilisateur->id}}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Services</a>
                    <a href="/prestataire/avis/{{$prestatairedetails->utilisateur->id}}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Avis clients</a>
            </nav>
        </div>

        <!-- Contenu principal -->
        <div>
            <!-- Contenu -->
            <div>
                <!-- Vue d'ensemble -->
                <section id="overview" class="bg-white rounded-xl p-6 shadow-md mb-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">À propos</h2>
                    <div class="prose max-w-none text-gray-600">
                        <p>{{$prestatairedetails->Description}}</p>
                    </div>

                    <!-- Informations personnelles -->
                    <div class="mt-6">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-map-marker-alt text-indigo-500 w-6"></i>
                            <span class="ml-2 text-gray-700">{{$prestatairedetails->Ville}}, {{$prestatairedetails->zip_code}}</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <i class="fas fa-wrench text-indigo-500 w-6"></i>
                            <span class="ml-2 text-gray-700">{{$prestatairedetails->service_principal}}</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <i class="fas fa-user   text-indigo-500 w-6"></i>
                            <span class="ml-2 font text-gray-700">{{$prestatairedetails->created_at}}</span>
                        </div>
                    </div>

                    <!-- Badges et qualifications -->
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Qualifications</h3>
                        <div class="flex flex-wrap gap-3">
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-blue-50 text-blue-700">
                                <i class="fas fa-certificate mr-1.5"></i> Professionnel certifié
                            </span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-green-50 text-green-700">
                                <i class="fas fa-shield-alt mr-1.5"></i> Assurance professionnelle
                            </span>
                        </div>
                    </div>
                </section>

                <section id="services" class="bg-white rounded-xl p-6 shadow-md mb-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-900">Services</h2>
        <a href="#all-reviews" class="text-indigo-600 hover:text-indigo-700 font-medium">Voir tous les services</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @foreach($prestatairedetails->Service as $service)
    <div class="bg-white rounded-xl overflow-hidden shadow-md transition-all hover:shadow-lg border border-gray-200">
        <div class="h-48 overflow-hidden">
            <img src="storage/{{$service->Photo}}" alt="Service Titre" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
            <div class="flex items-center justify-between mb-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                {{$service->category->Nom}}
                </span>
                <span class="text-lg font-bold text-gray-900">{{$service->Prix}}€<span class="text-gray-500 text-sm font-normal">/h</span></span>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-1">{{$service->titre}}</h3>
            <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{$service->Description}}</p>
            <div class="flex justify-end">
                <a href="/service/details/{{$service->id}}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Voir détails
                </a>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</section>

            
                <section id="reviews" class="bg-white rounded-xl p-6 shadow-md mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Avis clients</h2>
                        <div class="flex items-center">
                            <div class="flex text-yellow-400 mr-2">
                            @for( $i = 1 ; $i <= 5 ; $i++)
                                    @if($i <= $AvisAverage)
                                    <i class="fas fa-star"></i> 
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                            </div>
                            <span class="text-gray-700 font-medium">{{$AvisAverage}}</span>
                            <span class="text-gray-500 ml-1">({{$TotalAvisPrestataire}} avis)</span>
                        </div>
                    </div>
                    
                    
                    <div class="space-y-6">
                    
<!-- Section témoignages -->
<div class="bg-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-bold mb-8 text-center">Ce que nos clients disent de {{$prestatairedetails->Utilisateur->Prenom}} {{$prestatairedetails->Utilisateur->Nom}}</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-indigo-800 rounded-xl p-6">
                <div class="flex text-yellow-400 mb-3">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="text-indigo-100 italic mb-4">
                    "Commentaire du client."
                </p>
                <div class="flex items-center">
                    <div class="h-8 w-8 rounded-full bg-indigo-500 flex items-center justify-center">
                        <span class="text-white font-semibold text-xs">AB</span>
                    </div>
                    <div class="ml-2">
                        <p class="text-sm font-medium">Alice B.</p>
                        <p class="text-xs text-indigo-200">Service Titre</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section FAQ -->
<div class="bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-bold mb-8 text-center text-gray-900">Questions fréquentes</h2>
        
        <div class="max-w-3xl mx-auto space-y-4">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <button class="w-full flex items-center justify-between p-4 focus:outline-none">
                    <span class="text-lg font-medium text-gray-900">Comment prendre rendez-vous avec {{$prestatairedetails->Utilisateur->Prenom}} {{$prestatairedetails->Utilisateur->Nom}} ?</span>
                    <i class="fas fa-chevron-down text-indigo-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200 bg-gray-50">
                    <p class="text-gray-600">
                        Vous pouvez prendre rendez-vous directement depuis cette page en utilisant le bouton "Réserver maintenant" sur n'importe quel service proposé.
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <button class="w-full flex items-center justify-between p-4 focus:outline-none">
                    <span class="text-lg font-medium text-gray-900">Quels modes de paiement sont acceptés ?</span>
                    <i class="fas fa-chevron-down text-indigo-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200 bg-gray-50">
                    <p class="text-gray-600">
                        Le paiement s'effectue en ligne via notre plateforme sécurisée après la réalisation du service.
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <button class="w-full flex items-center justify-between p-4 focus:outline-none">
                    <span class="text-lg font-medium text-gray-900">Comment fonctionne la garantie de service ?</span>
                    <i class="fas fa-chevron-down text-indigo-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200 bg-gray-50">
                    <p class="text-gray-600">
                        Tous les services sont garantis pendant 6 mois. Si vous rencontrez un problème après l'intervention, le prestataire reviendra gratuitement pour le résoudre.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection