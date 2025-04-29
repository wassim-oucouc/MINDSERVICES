@extends('layout.app')

@section('title', 'Services - Plomberie')
@section('content')

<!-- Header Section -->
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
            <div class="pt-10 mx-auto max-w-7xl px-4 sm:pt-12 sm:px-6 md:pt-16 lg:pt-20 lg:px-8 xl:pt-28">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">Services de {{$categorie->Nom}}</span>
                        <span class="block text-indigo-600">{{$categorie->Nom}}</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
                        Découvrez tous nos prestataires qualifiés dans le domaine de la {{$categorie->Nom}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Category Description -->
<div class="bg-indigo-50">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/3 mb-6 md:mb-0">
                <img class="w-full h-auto rounded-lg shadow-md" src="/storage/{{$categorie->Photo}}" alt="{{$categorie->Nom}}">
            </div>
            <div class="md:w-2/3 md:pl-10">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">À propos des services de {{$categorie->Nom}}</h2>
                <p class="text-gray-600 mb-4">
                {{$categorie->Description}}
                </p>
                <p class="text-gray-600">
                    Tous nos Prestataires sont des professionnels certifiés et expérimentés, garantissant un travail de qualité et conforme aux normes en vigueur.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Services Listing -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Services disponibles</h2>
        
        @foreach($services as $service)
        <div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/4">
                    <img class="h-48 w-full object-cover md:h-full" src="/storage/{{$service->Photo}}" alt="Plombier Paris">
                </div>
                <div class="p-6 md:w-3/4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{$service->Nom}}</h3>
                            <div class="flex items-center mt-1">
                                <div class="text-yellow-400 flex">
                                @for( $i = 1 ; $i <= 5 ; $i++)
                                    @if($i <= $avisaverage)
                                        <i class="fas fa-star"></i> 
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor   
                                </div>
                                <span class="ml-2 text-gray-600">{{$service->Avis->Note}} ({{$service->avis_count}} avis)</span>
                            </div>
                            <p class="text-gray-600 mt-2">
                                <i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i>Paris 11ème, 12ème, 20ème
                            </p>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex flex-col sm:flex-row sm:justify-between sm:items-center">
                        <p class="flex items-center text-lg font-semibold text-gray-900">
                            <span>À partir de {{$service->Prix}}€/h</span>
                        </p>
                        <div class="mt-4 sm:mt-0">
                            <a href="/service/details/{{$service->id}}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        <!-- Service Provider 2 -->
        <div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/4">
                    <img class="h-48 w-full object-cover md:h-full" src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" alt="Plombier Professionnel">
                </div>
                <div class="p-6 md:w-3/4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">Martin Plomberie</h3>
                            <div class="flex items-center mt-1">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="ml-2 text-gray-600">5.0 (89 avis)</span>
                            </div>
                            <p class="text-gray-600 mt-2">
                                <i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i>Paris et proche banlieue
                            </p>
                        </div>
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Disponible demain</span>
                    </div>
                    
                    <p class="mt-4 text-gray-600">
                        Entreprise familiale de plomberie depuis 2005. Nous proposons des services complets pour particuliers et professionnels: dépannage, installation, rénovation et conseil.
                    </p>
                    
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">Rénovation salle de bain</span>
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">Chauffe-eau</span>
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">Chauffage</span>
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">Détection fuites</span>
                    </div>
                    
                    <div class="mt-6 flex flex-col sm:flex-row sm:justify-between sm:items-center">
                        <p class="flex items-center text-lg font-semibold text-gray-900">
                            <span>À partir de 70€/h</span>
                        </p>
                        <div class="mt-4 sm:mt-0">
                            <a href="/service/martin-plomberie" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Voir le profil
                            </a>
                            <a href="/reservation/martin-plomberie" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 ml-2">
                                Réserver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Service Provider 3 -->
        <div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/4">
                    <img class="h-48 w-full object-cover md:h-full" src="https://images.unsplash.com/photo-1565183928294-7063f23ce0f8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" alt="Duo de plombiers">
                </div>
                <div class="p-6 md:w-3/4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">EcoPlomb</h3>
                            <div class="flex items-center mt-1">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="ml-2 text-gray-600">4.1 (56 avis)</span>
                            </div>
                            <p class="text-gray-600 mt-2">
                                <i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i>Paris et banlieue sud
                            </p>
                        </div>
                        <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Disponible dans 3 jours</span>
                    </div>
                    
                    <p class="mt-4 text-gray-600">
                        Plomberie écologique et économique. Nos solutions respectueuses de l'environnement vous permettent d'économiser l'eau et l'énergie tout en réduisant vos factures.
                    </p>
                    
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">Économie d'eau</span>
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">Récupération eau de pluie</span>
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">Installation éco-responsable</span>
                    </div>
                    
                    <div class="mt-6 flex flex-col sm:flex-row sm:justify-between sm:items-center">
                        <p class="flex items-center text-lg font-semibold text-gray-900">
                            <span>À partir de 60€/h</span>
                        </p>
                        <div class="mt-4 sm:mt-0">
                            <a href="/service/ecoplomb" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Voir le profil
                            </a>
                            <a href="/reservation/ecoplomb" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 ml-2">
                                Réserver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-12 px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Précédent
                </a>
                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Suivant
                </a>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Affichage de <span class="font-medium">1</span> à <span class="font-medium">3</span> sur <span class="font-medium">12</span> résultats
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Précédent</span>
                            <i class="fas fa-chevron-left h-5 w-5"></i>
                        </a>
                        <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                        <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            1
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            2
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                            3
                        </a>
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                            ...
                        </span>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                            4
                        </a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Suivant</span>
                            <i class="fas fa-chevron-right h-5 w-5"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Related Services -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Services complémentaires</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Related Service 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1621905251918-48ba85f20fed?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" alt="Électricité">
                <div class="p-6">
                    <h3 class="font-semibold text-lg text-gray-900">Électricité</h3>
                    <p class="mt-2 text-gray-600">Pour tous vos besoins en installation et dépannage électrique</p>
                    <a href="/services/electricite" class="mt-4 inline-flex items-center text-indigo-600 hover:text-indigo-500">
                        Découvrir <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Related Service 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" alt="Chauffage">
                <div class="p-6">
                    <h3 class="font-semibold text-lg text-gray-900">Chauffage</h3>
                    <p class="mt-2 text-gray-600">Installation et entretien de systèmes de chauffage efficaces</p>
                    <a href="/services/chauffage" class="mt-4 inline-flex items-center text-indigo-600 hover:text-indigo-500">
                        Découvrir <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Related Service 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" alt="Rénovation">
                <div class="p-6">
                    <h3 class="font-semibold text-lg text-gray-900">Rénovation salle de bain</h3>
                    <p class="mt-2 text-gray-600">Transformez votre salle de bain avec nos spécialistes</p>
                    <a href="/services/renovation-salle-de-bain" class="mt-4 inline-flex items-center text-indigo-600 hover:text-indigo-500">
                        Découvrir <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-indigo-700">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Besoin d'un plombier en urgence ?</span>
            <span class="block text-indigo-200">Contactez nos prestataires disponibles 24/7.</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="/services/plomberie/urgence" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                    Services d'urgence
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
                <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600">
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</div>
@endsection