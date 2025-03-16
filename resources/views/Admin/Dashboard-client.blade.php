@extends('layout.admin')

@section('Utilisateurs', 'flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600')


@section('title', 'Client')
@section('content')

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Gestion des Clients</h2>
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

            <!-- Clients content -->
            <div class="p-6">
                <!-- Stats cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Clients</p>
                                <h3 class="text-2xl font-bold">5,734</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 12% ce mois
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center">
                                <i class="fas fa-user-friends text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Clients Actifs</p>
                                <h3 class="text-2xl font-bold">4,210</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 7% ce mois
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fas fa-check text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Nouveaux Clients</p>
                                <h3 class="text-2xl font-bold">246</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 15% ce mois
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                                <i class="fas fa-user-plus text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="flex flex-wrap items-center justify-between mb-6">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-indigo-700 transition-colors">
                            <i class="fas fa-plus"></i>
                            <span>Ajouter Client</span>
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
                            <option>Tous les clients</option>
                            <option>Clients actifs</option>
                            <option>Clients inactifs</option>
                            <option>Nouveaux clients</option>
                        </select>
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Trier par: Récent</option>
                            <option>Trier par: Nom A-Z</option>
                            <option>Trier par: Ancienneté</option>
                        </select>
                    </div>
                </div>

                <!-- Clients Table -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500">
                                            <span>Client</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Adresse</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date d'inscription</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Ligne 1 -->
                                <tr class="table-row hover:bg-indigo-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500 mr-3">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1287&auto=format&fit=crop" alt="Profile" class="h-10 w-10 rounded-full object-cover">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Paul Martin</div>
                                                <div class="text-sm text-gray-500">paul.martin@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">paul.martin@example.com</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">+33 6 12 34 56 78</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">123 Rue de Paris, 75001 Paris, France</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">15/01/2025</div>
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
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-8">
                    <div class="text-sm text-gray-600">
                        Affichage de 1-5 sur 5,734 clients
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
            const sidebar = document.querySelector('aside');
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>
</html>
@endsection