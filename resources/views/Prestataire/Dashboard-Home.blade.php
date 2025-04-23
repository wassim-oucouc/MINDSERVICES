    @extends('layout.prestataire')

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
                        <h2 class="text-xl font-semibold text-gray-800">Tableau de bord prestataire</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher..." class="bg-gray-100 rounded-full py-2 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                            <i class="fas fa-search absolute right-3 top-2.5 text-gray-500"></i>
                        </div>
                        <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">2</span>
                        </button>
                        <a href="/professional/settings">
                        <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none">
                            <i class="fas fa-cog text-xl"></i>
                        </button>
                        </a>
                    </div>
                </header>

                <!-- Dashboard content -->
                <div class="p-6">
                  <!-- Stats cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Réservations en cours -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 mb-1">Réservations en cours</p>
                <h3 class="text-2xl font-bold">{{$totals['totalReservationPending']}}</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-600 to-blue-500 flex items-center justify-center">
                <i class="fas fa-calendar-check text-white text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Services actifs -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 mb-1">Services actifs</p>
                <h3 class="text-2xl font-bold">{{$totals['totalServiceActif']}}</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center">
                <i class="fas fa-concierge-bell text-white text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Services terminés -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 mb-1">Services terminés</p>
                <h3 class="text-2xl font-bold">{{$totals['totalReservationTerminer']}}</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                <i class="fas fa-clipboard-check text-white text-xl"></i>
            </div>
        </div>
    </div>  
</div>
                    
                    <!-- Main content area -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Chart -->
                        <div class="bg-white rounded-xl shadow-sm p-6 lg:col-span-2 border border-gray-100">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-semibold text-lg">Performance Mensuelle</h3>
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
                        
                        <!-- Recent reviews -->
                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-semibold text-lg">Avis Récents</h3>
                                <a href="/professional/avis">
                                <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium focus:outline-none">
                                    Voir tout <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                                </a>
                            </div>
                            <div class="space-y-5">
                                @foreach($avis as $feedback)
                                <div class="flex items-start">
                                    <img class = "w-10 h-10 rounded-full object-cover" src="/storage/{{$feedback->Client->Photo}}">
                                    <div class="ml-4">
                                        <div class="flex items-center">
                                            <h4 class="font-medium text-sm">{{$feedback->Client->Prenom}} {{$feedback->Client->Nom}}</h4>
                                            <div class="flex text-yellow-500 ml-2">
                                            @for( $i = 1 ; $i <= 5 ; $i++)
                                    @if($i <= $feedback->Note)
                                        <i class="fas fa-star"></i> 
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor  
                                            </div>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-1">{{$feedback->Commentaire}}</p>
                                        <p class="text-xs text-gray-500 mt-1">{{$feedback->created_at}}</p>
                                    </div>
                                    
                                </div>
                                @endforeach
                    </div>
    </div>
    </div>
    </div>
                    
                    <!-- Recent activities and opportunities -->
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
                                        <i class="fas fa-comment-dots text-xs"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium">Nouveau message de Claire Dupont</h4>
                                        <p class="text-xs text-gray-500">Il y a 30 minutes</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-green-500 flex-shrink-0 flex items-center justify-center text-white">
                                        <i class="fas fa-check text-xs"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium">Projet "Conception site web" accepté</h4>
                                        <p class="text-xs text-gray-500">Il y a 2 heures</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-yellow-500 flex-shrink-0 flex items-center justify-center text-white">
                                        <i class="fas fa-star text-xs"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium">Nouvel avis 5 étoiles reçu</h4>
                                        <p class="text-xs text-gray-500">Il y a 3 heures</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-blue-500 flex-shrink-0 flex items-center justify-center text-white">
                                        <i class="fas fa-euro-sign text-xs"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium">Paiement reçu pour le projet "Logo entreprise"</h4>
                                        <p class="text-xs text-gray-500">Il y a 5 heures</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-8 h-8 rounded-full bg-purple-500 flex-shrink-0 flex items-center justify-center text-white">
                                        <i class="fas fa-bell text-xs"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium">Rappel: Deadline projet "Application mobile"</h4>
                                        <p class="text-xs text-gray-500">Il y a 8 heures</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Opportunities -->
                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-semibold text-lg">Reservation Récent</h3>
                                <a href="/professional/reservation">
                                <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium focus:outline-none">
                                    Voir tout <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                                </a>
                            </div>
                            <div class="space-y-4">
                                @foreach($reservation as $order)
                                <div class="p-4 border border-gray-100 rounded-lg hover:bg-gray-50 transition-colors">
                                    <div class="flex justify-between">
                                    <img class = "w-11 h-11 rounded-full object-cover" src="/storage/{{$order->Service->Photo}}">
                                        <div>
                                            <h4 class="font-medium text-sm">{{$order->Service->titre}}</h4>
                                            <p class="text-xs text-gray-500 mt-1">{{$order->Service->Prix}} €</p>
                                            <div class="flex items-center mt-2">
                                            @if($order->status == 'En attente')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-1"></span>
                                    En attente
                                </span>
                                @elseif($order->status == 'Confirmée')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-1"></span>
                                    Confirmée
                                </span>
                                @elseif($order->status == 'Terminée')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1"></span>
                                    Terminée
                                </span>
                                @elseif($order->status == 'Annulée')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-red-400 rounded-full mr-1"></span>
                                    Annulée
                                </span>
                                @elseif($order->status == 'En cours')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-sky-100 text-sky-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-sky-400 rounded-full mr-1"></span>
                                    En cours
                                </span>
                                @endif
                                            </div>
                                        </div>
                                        <a href="/professional/reservation/details/{{$order->id}}">
                                        <button class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded-lg text-xs transition-colors">
                                            Voir Details Reservation
                                        </button>
</a>
                                    </div>
                                </div>
                                @endforeach
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
    @endsection