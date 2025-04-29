@extends('layout.app')

@section('title', 'Nos Prestataires')
@section('content')

<!-- Section d'en-tête avec image de bannière -->
<div class="bg-gradient-to-r from-blue-700 to-teal-500 py-12 relative overflow-hidden bg-cover bg-center" style="background-image: url('/images/banners/providers-header.jpg');">
    <!-- Overlay pour améliorer la lisibilité du texte -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-700/90 to-teal-500/80"></div>
    <div class="absolute inset-0 bg-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl tracking-tight">
                Nos prestataires professionnels
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-blue-100">
                Des experts qualifiés à votre service
            </p>
        </div>
    </div>
    <!-- Vague décorative en bas -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-16 text-gray-50 fill-current">
            <path d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,224C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</div>

<!-- Section Liste des Prestataires avec image de fond subtile -->
<div class="bg-gray-50 py-16 relative">
    <!-- Image de fond légère pour la section -->
    <div class="absolute inset-0 bg-cover bg-center opacity-5" style="background-image: url('/images/backgrounds/pattern-light.jpg')"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Grille des prestataires -->
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            @foreach($prestataires as $prestataire)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <!-- Bannière du profil -->
                    <div class="h-32 bg-cover bg-center relative" style="background-image: url('/images/profile-banners/banner-{{rand(1,5)}}.jpg');">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    
                    <div class="p-6 relative">
                        <!-- Photo de profil chevauchant la bannière -->
                        <div class="absolute -top-10 left-6">
                            <img class="h-20 w-20 rounded-full object-cover shadow-lg border-4 border-white" src="/storage/{{$prestataire->Photo}}" alt="Photo de {{$prestataire->Prenom}} {{$prestataire->Nom}}">
                        </div>
                        
                        <div class="mt-12">
                            <h2 class="text-xl font-bold text-gray-800">{{$prestataire->Prenom}} {{$prestataire->Nom}}</h2>
                            <div class="flex items-center mt-2">
                                <div class="flex text-amber-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $prestataire->avis_avg_note)
                                            <i class="fas fa-star"></i> 
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor  
                                </div>
                                <span class="ml-2 text-sm font-medium text-gray-600">{{$prestataire->avis_avg_note ?? 0}} ({{$prestataire->avis_count ?? 0}} avis)</span>
                            </div>
                        </div>
                        
                        <!-- Séparateur -->
                        <div class="my-5 border-t border-gray-100"></div>
                        
                        <div class="mt-4 space-y-3">
                            <p class="text-sm text-gray-600 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i> 
                                {{$prestataire->Professional->Ville ?? ""}} {{$prestataire->Professional->zip_code ?? ""}}
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-teal-100 text-teal-800">
                                    <i class="fas fa-briefcase mr-1"></i>
                                    {{$prestataire->Professional->service_principal ?? ""}}
                                </span>
                            </div>
                            <div class="mt-6">
                                <a href="/prestataire/profile/{{$prestataire->id}}" class="w-full inline-flex justify-center items-center px-4 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 shadow-sm">
                                    <span>Voir le profil</span>
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination avec style amélioré -->
        <div class="mt-12">
            <div class="bg-white px-6 py-4 rounded-lg shadow-sm border border-gray-100">
                {{$prestataires->links()}}
            </div>
        </div>
    </div>
</div>

<!-- Section CTA repensée visuellement avec image de fond -->
<div class="relative bg-gradient-to-br from-blue-800 to-teal-700 overflow-hidden bg-cover bg-center" style="background-image: url('/images/banners/cta-background.jpg');">
    <!-- Overlay gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-800/90 to-teal-700/90"></div>
    
    <!-- Motif de fond décoratif -->
    <div class="absolute inset-0 opacity-10">
        <svg width="100%" height="100%" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8 lg:flex lg:items-center lg:justify-between relative z-10">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Vous êtes un professionnel ?</span>
            <span class="block text-teal-200 mt-1">Rejoignez notre réseau de prestataires.</span>
        </h2>
        <div class="mt-8 flex flex-col sm:flex-row gap-4 lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="/professional-register" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-lg text-blue-700 bg-white hover:bg-blue-50 transition-colors">
                    <i class="fas fa-user-plus mr-2"></i>
                    Devenir prestataire
                </a>
            </div>
            <div class="inline-flex rounded-md shadow">
                <a href="/about-us" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-blue-600 bg-opacity-30 hover:bg-opacity-40 transition-colors">
                    <i class="fas fa-info-circle mr-2"></i>
                    En savoir plus
                </a>
            </div>
        </div>
    </div>
</div>

@endsection