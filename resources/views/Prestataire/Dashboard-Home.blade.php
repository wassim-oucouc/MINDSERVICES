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
            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center">
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

    <!-- Total Avis -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 mb-1">Total Avis</p>
                <h3 class="text-2xl font-bold">{{$statistic['totalavis']}}</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-yellow-500 flex items-center justify-center">
                <i class="fas fa-star text-white text-xl"></i>
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
        <canvas id="myChart" width="700" height="200"></canvas>
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
                    
                   
                        
                        <!-- Opportunities -->
                      <!-- Composant de Réservations Récentes -->
<div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
    <!-- En-tête du composant -->
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-semibold text-xl text-gray-800">Réservations Récentes</h3>
        <a href="/professional/reservation" class="group flex items-center text-indigo-600 hover:text-indigo-800 transition-colors">
            <span class="text-sm font-medium">Voir tout</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>
    
<!-- Liste des réservations -->
<div class="space-y-4 w-full">
    @foreach($reservation as $order)
    <div class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-all duration-200 shadow-sm hover:shadow">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Image du service -->
                <img class="w-12 h-12 rounded-full object-cover shadow-sm" src="/storage/{{$order->Service->Photo}}" alt="{{$order->Service->titre}}">
                <!-- Informations du service -->
                <div>
                    <h4 class="font-medium text-gray-800">{{$order->Service->titre}}</h4>
                    <p class="text-sm text-gray-500 mt-1">{{$order->Service->Prix}} €</p>
                    
                    <!-- Badge de statut -->
                    <div class="flex items-center mt-2">
                        @switch($order->status)
                            @case('En attente')
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-800 flex items-center">
                                    <span class="w-2 h-2 bg-amber-400 rounded-full mr-1.5"></span>
                                    En attente
                                </span>
                                @break
                            @case('Confirmée')
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 flex items-center">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-1.5"></span>
                                    Confirmée
                                </span>
                                @break
                            @case('Terminée')
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 flex items-center">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full mr-1.5"></span>
                                    Terminée
                                </span>
                                @break
                            @case('Annulée')
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 flex items-center">
                                    <span class="w-2 h-2 bg-red-400 rounded-full mr-1.5"></span>
                                    Annulée
                                </span>
                                @break
                            @case('En cours')
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-sky-100 text-sky-800 flex items-center">
                                    <span class="w-2 h-2 bg-sky-400 rounded-full mr-1.5"></span>
                                    En cours
                                </span>
                                @break
                        @endswitch
                    </div>
                </div>
            </div>
            
            <!-- Bouton de détails -->
            <a href="/professional/reservation/details/{{$order->id}}" class="transform hover:scale-105 transition-transform">
                <button class="bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-sm">
                    Voir détails
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

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

           <script>
       var chartData = {
        labels: ['Réservations en cours', 'Services actifs', 'Services terminés', 'Total Avis'],
        datasets: [{
            label: 'Performance Mensuelle',
            data: [
                {{$totals['totalReservationPending']}},
                {{$totals['totalServiceActif']}},
                {{$totals['totalReservationTerminer']}},
                {{$statistic['totalavis']}}
            ],
            backgroundColor: ['#4F7CAC', '#81C784', '#7986CB', '#FFD54F'],
            borderColor: ['#4F7CAC', '#81C784', '#7986CB', '#FFD54F'],
            borderWidth: 1
        }]
    };

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', 
        data: chartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });



            // Toggle sidebar
            document.querySelector('.fa-bars').addEventListener('click', function() {
                const sidebar = document.querySelector('aside');
                sidebar.classList.toggle('hidden');
            });
        </script>
    @endsection