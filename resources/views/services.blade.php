@extends('layout.app')

@section('title', 'Recherche de Services')
@section('content')

<!-- Section de Recherche -->
<div class="bg-gradient-to-r from-blue-700 to-teal-500 py-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl tracking-tight">
                Trouvez les meilleurs services
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-blue-100">
                Des professionnels qualifiés près de chez vous
            </p>
        </div>
        
        <!-- Formulaire de recherche -->
        <div class="mt-8 bg-white rounded-xl shadow-xl p-6 max-w-4xl mx-auto">
            <form id="searchForm" method="POST" class="space-y-6 md:space-y-0 md:grid md:grid-cols-12 md:gap-4" x-data="{ showResults: false }">
                @csrf
                <div class="md:col-span-5">
                    <label for="service" class="block text-sm font-medium text-gray-700">Service</label>
                    <div class="mt-1 relative rounded-lg shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-blue-500"></i>
                        </div>
                        <input type="text" name="service" id="service" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-3 sm:text-sm border-gray-300 rounded-lg" placeholder="Plomberie, Électricité, Jardinage...">
                    </div>
                </div>
                
                <div class="md:col-span-5">
                    <label for="location" class="block text-sm font-medium text-gray-700">Ville</label>
                    <div class="mt-1 relative rounded-lg shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-blue-500"></i>
                        </div>
                        <input type="text" name="location" id="location" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-3 sm:text-sm border-gray-300 rounded-lg" placeholder="Paris, Lyon, Marseille...">
                    </div>
                </div>
                
                <div class="md:col-span-2 flex items-end">
                    <button id="ButtonSearch" type="submit" @click="showResults = true" class="w-full inline-flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Vague décorative en bas -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-16 text-gray-50 fill-current">
            <path d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,224C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</div>

<!-- Section Résultats de Recherche -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ showResults: false }" x-show="showResults" x-cloak>
    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
        <div class="lg:col-span-3">
            <form id="filtreform" action="/services" method="POST">
                @csrf
                <div class="bg-white shadow-lg rounded-xl p-6 sticky top-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Filtres</h3>
                    
                    <!-- Filtre par catégorie -->
                    <div class="mb-6">
                        <h4 class="font-medium text-gray-700 mb-2">Catégorie</h4>
                        <div class="space-y-2">
                            @foreach($categories as $categorie)
                            <div class="flex items-center">
                                <input value="{{$categorie->Nom}}" id="category-plumbing" name="category[]" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="category-plumbing" class="ml-2 block text-sm text-gray-700">{{$categorie->Nom}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Filtre par prix -->
                    <div class="mb-6">
                        <h4 class="font-medium text-gray-700 mb-2">Prix</h4>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="price-1" value="Économique" name="price" type="radio" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                <label for="price-1" class="ml-2 block text-sm text-gray-700">€ (Économique)</label>
                            </div>
                            <div class="flex items-center">
                                <input id="price-3" value="Premium" name="price" type="radio" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                <label for="price-3" class="ml-2 block text-sm text-gray-700">€€€ (Premium)</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bouton d'application des filtres -->
                    <button id="fitrage" type="submit" class="w-full bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 text-white py-2 px-4 rounded-lg shadow-sm transition-colors">
                        Appliquer les filtres
                    </button>
                </form>
            </div>
        </div>

        <!-- Résultats (côté droit) -->
        <div class="mt-6 lg:mt-0 lg:col-span-9">
            <div id="services" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($ServicePaginate as $service)
                <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                    <img src="/storage/{{$service->Photo}}" alt="{{$service->titre}}" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h2 class="text-lg font-bold text-gray-800">{{$service->titre ?? ""}}</h2>
                        <div class="flex items-center mt-2">
                            <div class="flex text-amber-400">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $service->avis_avg_note)
                                        <i class="fas fa-star"></i> 
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor   
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-600">{{$service->avis_avg_note ?? 0}} ({{$service->avis_count ?? 0}} avis)</span>
                        </div>
                        <p class="mt-2 text-sm text-gray-600 flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i> {{$service->Professional->Ville ?? ""}} {{$service->Professional->zip_code ?? ""}} • 
                            <span class="ml-1 text-teal-600 font-medium">{{$service->Category->Nom}}</span>
                        </p>
                        <p class="mt-3 text-sm text-gray-700 line-clamp-3">
                            {{$service->Description}}
                        </p>
                        <div class="mt-4 flex justify-between items-center border-t border-gray-100 pt-3">
                            <p class="text-sm font-bold text-gray-900">À partir de <span class="text-blue-600">{{$service->Prix ?? 0}}€/h</span></p>
                            <a href="/service/details/{{$service->id}}">
                                <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors">
                                    <span>Détails</span>
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div id="pagination" class="bg-white px-6 py-4 border-t border-gray-200 sm:px-6 mt-8 rounded-xl shadow">
                <div class="flex items-center justify-between">
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            {{$ServicePaginate->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection