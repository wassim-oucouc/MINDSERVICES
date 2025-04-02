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
            <form id="searchForm" class="space-y-6 md:space-y-0 md:grid md:grid-cols-12 md:gap-4" x-data="{ showResults: false }">
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
                    <button type="button" @click="showResults = true" class="w-full inline-flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
        <!-- Filtres (côté gauche) -->
        <div class="lg:col-span-3">
            <div class="bg-white shadow rounded-lg p-6 sticky top-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Filtres</h3>
                
                <!-- Filtre par catégorie -->
                <div class="mb-6">
                    <h4 class="font-medium text-gray-700 mb-2">Catégorie</h4>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input id="category-plumbing" name="category" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="category-plumbing" class="ml-2 block text-sm text-gray-700">Plomberie</label>
                        </div>
                        <div class="flex items-center">
                            <input id="category-electricity" name="category" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="category-electricity" class="ml-2 block text-sm text-gray-700">Électricité</label>
                        </div>
                        <div class="flex items-center">
                            <input id="category-gardening" name="category" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="category-gardening" class="ml-2 block text-sm text-gray-700">Jardinage</label>
                        </div>
                    </div>
                </div>
                
                <!-- Filtre par prix -->
                <div class="mb-6">
                    <h4 class="font-medium text-gray-700 mb-2">Prix</h4>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input id="price-1" name="price" type="radio" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <label for="price-1" class="ml-2 block text-sm text-gray-700">€ (Économique)</label>
                        </div>
                        <div class="flex items-center">
                            <input id="price-2" name="price" type="radio" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <label for="price-2" class="ml-2 block text-sm text-gray-700">€€ (Modéré)</label>
                        </div>
                        <div class="flex items-center">
                            <input id="price-3" name="price" type="radio" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <label for="price-3" class="ml-2 block text-sm text-gray-700">€€€ (Premium)</label>
                        </div>
                    </div>
                </div>
                
                <!-- Filtre par note -->
                <div class="mb-6">
                    <h4 class="font-medium text-gray-700 mb-2">Note minimale</h4>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input id="rating-4" name="rating" type="radio" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <label for="rating-4" class="ml-2 block text-sm text-gray-700">
                                <span class="text-yellow-400">★★★★</span><span class="text-gray-300">★</span> & plus
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="rating-3" name="rating" type="radio" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <label for="rating-3" class="ml-2 block text-sm text-gray-700">
                                <span class="text-yellow-400">★★★</span><span class="text-gray-300">★★</span> & plus
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Bouton d'application des filtres -->
                <button type="button" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Appliquer les filtres
                </button>
            </div>
        </div>
        
        <!-- Résultats (côté droit) -->
        <div class="mt-6 lg:mt-0 lg:col-span-9">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Exemple de service -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="https://via.placeholder.com/300" alt="Service Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-medium text-gray-900">Martin Plomberie</h2>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="ml-1 text-sm text-gray-500">4.5 (128 avis)</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            <i class="fas fa-map-marker-alt mr-1"></i> Paris 11e • <span class="text-green-600">Disponible aujourd'hui</span>
                        </p>
                        <p class="mt-1 text-sm text-gray-700">
                            Spécialiste en plomberie résidentielle, réparations urgentes, installation de salles de bain
                        </p>
                        <div class="mt-4 flex justify-between items-center">
                            <p class="text-sm font-medium text-gray-900">À partir de 60€/h</p>
                            <button class="mt-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Détails
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Répétez le bloc ci-dessus pour d'autres services -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="https://via.placeholder.com/300" alt="Service Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-medium text-gray-900">Dupont Services Plomberie</h2>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="ml-1 text-sm text-gray-500">4.0 (95 avis)</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            <i class="fas fa-map-marker-alt mr-1"></i> Paris 15e • <span class="text-green-600">Disponible demain</span>
                        </p>
                        <p class="mt-1 text-sm text-gray-700">
                            Entreprise familiale, dépannage rapide, installation de chauffage, plomberie générale
                        </p>
                        <div class="mt-4 flex justify-between items-center">
                            <p class="text-sm font-medium text-gray-900">À partir de 55€/h</p>
                            <button class="mt-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Détails
                            </button>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="https://via.placeholder.com/300" alt="Service Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-medium text-gray-900">SOS Plomberie Paris</h2>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="ml-1 text-sm text-gray-500">5.0 (42 avis)</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            <i class="fas fa-map-marker-alt mr-1"></i> Paris 9e • <span class="text-orange-600">Disponible dans 3 jours</span>
                        </p>
                        <p class="mt-1 text-sm text-gray-700">
                            Intervention d'urgence 24/7, fuites, bouchons, réparation de chauffe-eau
                        </p>
                        <div class="mt-4 flex justify-between items-center">
                            <p class="text-sm font-medium text-gray-900">À partir de 70€/h</p>
                            <button class="mt-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Détails
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
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
                                <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    1
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    2
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    3
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
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
    </div>
</div>

@endsection