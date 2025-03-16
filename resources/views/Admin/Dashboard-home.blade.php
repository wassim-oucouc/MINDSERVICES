@extends('layout.admin')

@section('title', 'Home')

@section('home', 'flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600')



@section('content')
        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Tableau de bord administrateur</h2>
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

            <!-- Dashboard content -->
            <div class="p-6">
                <!-- Stats cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Utilisateurs</p>
                                <h3 class="text-2xl font-bold">24,521</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 12% ce mois
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-indigo-600 to-indigo-500 flex items-center justify-center">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Prestataires Actifs</p>
                                <h3 class="text-2xl font-bold">2,845</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 8% ce mois
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center">
                                <i class="fas fa-briefcase text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Clients Actifs</p>
                                <h3 class="text-2xl font-bold">18,392</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 15% ce mois
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fas fa-user-friends text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Revenus Mensuels</p>
                                <h3 class="text-2xl font-bold">€85,245</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 9.4% ce mois
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-purple-500 flex items-center justify-center">
                                <i class="fas fa-euro-sign text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Main content area -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Chart -->
                    <div class="bg-white rounded-xl shadow-sm p-6 lg:col-span-2 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-semibold text-lg">Statistiques d'Utilisateurs</h3>
                            <div class="flex items-center space-x-2">
                                <button class="bg-gray-100 px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition-colors">Semaine</button>
                                <button class="bg-indigo-500 px-4 py-2 rounded-lg text-sm font-medium text-white">Mois</button>
                                <button class="bg-gray-100 px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition-colors">Année</button>
                            </div>
                        </div>
                        <div class="h-80 w-full">
                            <!-- Chart placeholder -->
                            <div class="w-full h-full bg-gray-50 rounded-lg flex items-center justify-center">
                                <img src="/api/placeholder/600/300" alt="Chart placeholder" class="max-w-full max-h-full rounded-lg opacity-60" />
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent signups -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-semibold text-lg">Inscriptions Récentes</h3>
                            <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium focus:outline-none">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                        <div class="space-y-5">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1287&auto=format&fit=crop" alt="User " class="w-10 h-10 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-sm">Marie Leclerc</h4>
                                    <p class="text-xs text-gray-500">Client • il y a 35 min</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1287&auto=format&fit=crop" alt="User " class="w-10 h-10 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-sm">Paul Martin</h4>
                                    <p class="text-xs text-gray-500">Prestataire • il y a 2h</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?q=80&w=1287&auto=format&fit=crop" alt="User " class="w-10 h-10 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-sm">Sophie Blanc</h4>
                                    <p class="text-xs text-gray-500">Client • il y a 3h</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1566492031773-4f4e44671857?q=80&w=1287&auto=format&fit=crop" alt="User " class="w-10 h-10 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-sm">Thomas Dubois</h4>
                                    <p class="text-xs text-gray-500">Prestataire • il y a 5h</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=1361&auto=format&fit=crop" alt="User " class="w-10 h-10 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-sm">Julie Moreau</h4>
                                    <p class="text-xs text-gray-500">Client • il y a 8h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent activities and to approve -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent activity -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-semibold text-lg">Activités Récentes</h3>
                            <div>
                                <select class="bg-gray-100 rounded-lg text-sm font-medium px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>Aujourd'hui</option>
                                    <option>Cette semaine</option>
                                    <option>Ce mois</option>
                                </select>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-indigo-600 flex-shrink-0 flex items-center justify-center text-white">
                                    <i class="fas fa-user-plus text-xs"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium">8 nouveaux prestataires se sont inscrits</h4>
                                    <p class="text-xs text-gray-500">Il y a 45 minutes</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-green-500 flex-shrink-0 flex items-center justify-center text-white">
                                    <i class="fas fa-euro-sign text-xs"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium">Revenu mensuel mis à jour</h4>
                                    <p class="text-xs text-gray-500">Il y a 1 heure</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 flex-shrink-0 flex items-center justify-center text-white">
                                    <i class="fas fa-bell text-xs"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium">3 nouvelles réclamations nécessitent votre attention</h4>
                                    <p class="text-xs text-gray-500">Il y a 2 heures</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-blue-500 flex-shrink-0 flex items-center justify-center text-white">
                                    <i class="fas fa-sync text-xs"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium">Mise à jour du système effectuée</h4>
                                    <p class="text-xs text-gray-500">Il y a 5 heures</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-red-500 flex-shrink-0 flex items-center justify-center text-white">
                                    <i class="fas fa-exclamation-triangle text-xs"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium">Alerte de sécurité système</h4>
                                    <p class="text-xs text-gray-500">Il y a 6 heures</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pending approvals -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-semibold text-lg">Prestataires à Approuver</h3>
                            <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium focus:outline-none">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=1287&auto=format&fit=crop" alt="Provider" class="w-10 h-10 rounded-full object-cover">
                                    <div class="ml-4">
                                        <h4 class="font-medium text-sm">Antoine Renard</h4>
                                        <p class="text-xs text-gray-500">Développeur Web</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors">
                                        <i class="fas fa-check text-xs"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1364&auto=format&fit=crop" alt="Provider" class="w-10 h-10 rounded-full object-cover">
                                    <div class="ml-4">
                                        <h4 class="font-medium text-sm">Camille Laurent</h4>
                                        <p class="text-xs text-gray-500">Coach Sportif</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors">
                                        <i class="fas fa-check text-xs"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1287&auto=format&fit=crop" alt="Provider" class="w-10 h-10 rounded-full object-cover">
                                    <div class="ml-4">
                                        <h4 class="font-medium text-sm">Lucas Petit</h4>
                                        <p class="text-xs text-gray-500">Architecte d'intérieur</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors">
                                        <i class="fas fa-check text-xs"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1288&auto=format&fit=crop" alt="Provider" class="w-10 h-10 rounded-full object-cover">
                                    <div class="ml-4">
                                        <h4 class="font-medium text-sm">Emma Bernard</h4>
                                        <p class="text-xs text-gray-500">Photographe</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors">
                                        <i class="fas fa-check text-xs"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
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