@extends('layout.app')

@section('title', 'Recherche de Services')
@section('content')

<!-- Section de Recherche -->
<div class="bg-indigo-600 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl font-extrabold text-white sm:text-4xl">
                Trouvez les meilleurs services
            </h1>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-indigo-200">
                Des professionnels qualifiés près de chez vous
            </p>
        </div>
        
        <!-- Formulaire de recherche -->
        <div class="mt-8 bg-white rounded-lg shadow-lg p-6 max-w-4xl mx-auto">
            <form id="searchForm" method = "POST" class="space-y-6 md:space-y-0 md:grid md:grid-cols-12 md:gap-4" x-data="{ showResults: false }">
                @csrf
                <div class="md:col-span-5">
                    <label for="service" class="block text-sm font-medium text-gray-700">Service</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" name="service" id="service" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 py-3 sm:text-sm border-gray-300 rounded-md" placeholder="Plomberie, Électricité, Jardinage...">
                    </div>
                </div>
                
                <div class="md:col-span-5">
                    <label for="location" class="block text-sm font-medium text-gray-700">Ville</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                        </div>
                        <input type="text" name="location" id="location" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 py-3 sm:text-sm border-gray-300 rounded-md" placeholder="Paris, Lyon, Marseille...">
                    </div>
                </div>
                
                <div class="md:col-span-2 flex items-end">
                    <button id = "ButtonSearch" type="submit" @click="showResults = true" class="w-full inline-flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Section Résultats de Recherche -->

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ showResults: false }" x-show="showResults" x-cloak>
    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
        <div class="lg:col-span-3">
        <form id = "filtreform" action="/services" method = "POST">
        @csrf
            <div class="bg-white shadow rounded-lg p-6 sticky top-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Filtres</h3>
                
                <!-- Filtre par catégorie -->
                <div class="mb-6">
                    <h4 class="font-medium text-gray-700 mb-2">Catégorie</h4>
                    <div class="space-y-2">
                    @foreach($categories as $categorie)
                        <div class="flex items-center">
                            <input value = "{{$categorie->Nom}}" id="category-plumbing" name="category[]" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
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
                            <input id="price-1" value = "Économique" name="price" type="radio" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <label for="price-1" class="ml-2 block text-sm text-gray-700">€ (Économique)</label>
                        </div>
                        <div class="flex items-center">
                            <input id="price-3"  value = "Premium" name="price" type="radio" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <label for="price-3" class="ml-2 block text-sm text-gray-700">€€€ (Premium)</label>
                        </div>
                    </div>
                </div>
                <!-- Bouton d'application des filtres -->
                <button id = "fitrage" type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Appliquer les filtres
                </button>
</form>

            </div>
        </div>

   

        
        <!-- Résultats (côté droit) -->
        <div class="mt-6 lg:mt-0 lg:col-span-9">
            <div id = "services" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($ServicePaginate as $service)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="/storage/{{$service->Photo}}" alt="{{$service->titre}}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-medium text-gray-900">{{$service->titre}}</h2>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                            @for( $i = 1 ; $i <= 5 ; $i++)
                                    @if($i <= $service->avis_avg_note)
                                        <i class="fas fa-star"></i> 
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor   
                            </div>
                            <span class="ml-1 text-sm text-gray-500">{{$service->avis_avg_note}} ({{$service->avis_count}} avis)</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            <i class="fas fa-map-marker-alt mr-1"></i> {{$service->Professional->Ville}} {{$service->Professional->zip_code}} • <span class="text-green-600">{{$service->Category->Nom}}</span>
                        </p>
                        <p class="mt-1 text-sm text-gray-700">
                        {{$service->Description}}
                        </p>
                        <div class="mt-4 flex justify-between items-center">
                            <p class="text-sm font-medium text-gray-900">À partir de {{$service->Prix}}€/h</p>
                            <a href="/service/details/{{$service->id}}">
                            <button class="mt-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Détails
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
             @endforeach
</div>

            <!-- Pagination -->
            <div id = "pagination" class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                           {{$ServicePaginate->links()}}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection