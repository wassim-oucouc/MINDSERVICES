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
                                <h3 class="text-2xl font-bold">{{$statisticusers['totalusers']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
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
                                <h3 class="text-2xl font-bold">{{$statisticusers['totalprestataire']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
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
                                <h3 class="text-2xl font-bold">{{$statisticusers['totalclients']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
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
                                <p class="text-sm text-gray-500 mb-1">Utilisateurs Banni</p>
                                <h3 class="text-2xl font-bold">{{$statisticusers['totalusersbanni']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-red-500 flex items-center justify-center">
                            <i class="fas fa-user-slash text-white text-xl"></i>
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
                            <a href="/admin/utilisateurs">
                            <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium focus:outline-none">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                            </a>
                        </div>
                        <div class="space-y-5">
                            @foreach($lastusers as $user)
                            <div class="flex items-center">
                                <img src="/storage/{{$user->Photo}}" alt="User " class="w-10 h-10 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-sm">{{$user->Prenom}} {{$user->Nom}}</h4>
                                    <p class="text-xs text-gray-500">{{$user->Role->nom}} • {{$user->created_at->locale('fr')->DiffForHumans()}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Recent activities and to approve -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
</div>
                    <!-- Pending approvals -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-semibold text-lg">Réservations Récentes</h3>
        <a href="/admin/reservations">
            <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium focus:outline-none">
                Voir tout <i class="fas fa-arrow-right ml-1"></i>
            </button>
        </a>
    </div>
    <div class="space-y-4">
        @foreach($reservations as $reservation)
        <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition">
            <div class="flex items-center">
                <img src="/storage/{{$reservation->Service->Photo}}" alt="Service" class="w-10 h-10 rounded-full object-cover">
                <div class="ml-4">
                    <h4 class="font-medium text-sm">{{$reservation->Service->titre}}</h4>
                    <p class="text-xs text-gray-500 truncate max-w-xs">{{$reservation->Service->Description}}</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-xs text-gray-500">{{$reservation->reservation_date}}</p>
                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium 
                    @if($reservation->status == 'Confirmée')
                        bg-green-100 text-green-800
                    @elseif($reservation->status == 'En attente')
                        bg-yellow-100 text-yellow-800
                    @elseif($reservation->status== 'Annulée')
                        bg-red-100 text-red-800
                    @else
                        bg-gray-100 text-gray-800
                    @endif
                ">
                    {{($reservation->status)}}
                </span>
            </div>
        </div>
        @endforeach
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