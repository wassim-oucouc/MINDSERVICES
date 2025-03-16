@extends('layout.admin')

@section('Catégories', 'flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600')

@section('title', 'Catégories')
@section('content')
        <!-- Main Content -->
        <main class="main-content flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Gestion des Catégories</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..." class="bg-gray-100 rounded-full py-2 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                        <i class="fas fa-search absolute right-3 top-2.5 text-gray-500"></i>
                    </div>
                    <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                    </button>
                    <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none">
                        <i class="fas fa-cog text-xl"></i>
                    </button>
                </div>
            </header>

            <!-- Categories content -->
            <div class="p-6 fade-in">
                <!-- Stats cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Catégories</p>
                                <h3 class="text-2xl font-bold">24</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 3 nouvelles ce mois
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                                <i class="fas fa-tags text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Catégories Populaires</p>
                                <h3 class="text-2xl font-bold">7</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> +15% de vues
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fas fa-star text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Produits</p>
                                <h3 class="text-2xl font-bold">3,427</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 12% ce mois
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center">
                                <i class="fas fa-box text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="flex flex-wrap items-center justify-between mb-6">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-indigo-700 transition-colors">
                            <i class="fas fa-plus"></i>
                            <span>Ajouter Catégorie</span>
                        </button>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors">
                            <i class="fas fa-filter"></i>
                            <span>Filtres</span>
                        </button>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors">
                            <i class="fas fa-download"></i>
                            <span>Exporter</span>
                        </button>
                    </div>
                    <div class="flex space-x-4">
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Tous les statuts</option>
                            <option>Actifs</option>
                            <option>Inactifs</option>
                        </select>
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Trier par: Nom A-Z</option>
                            <option>Trier par: Produits (croissant)</option>
                            <option>Trier par: Produits (décroissant)</option>
                            <option>Trier par: Date de création</option>
                        </select>
                    </div>
                </div>

                <!-- Categories Table -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500">
                                            <span>ID</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom Catégorie</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre de Produits</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Ligne 1 -->
                                <tr class="table-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">25/01/2025</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 mx-1">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-8">
                    <div class="text-sm text-gray-600">
                        Affichage de 1-6 sur 24 catégories
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="px-4 py-2 bg-indigo-600 border border-indigo-600 rounded-lg text-white">1</button>
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">2</button>
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">3</button>
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">4</button>
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Toggle sidebar
        document.querySelector('.fa-bars').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                mainContent.classList.remove('ml-0');
            } else {
                sidebar.classList.add('hidden');
                mainContent.classList.add('ml-0');
            }
        });
    </script>
</body>
</html>