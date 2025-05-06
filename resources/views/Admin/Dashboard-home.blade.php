@extends('layout.admin')

@section('title', 'Home')
@section('home', 'flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600')

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
    <!-- Top Header -->
    <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
        <div class="flex items-center">
            <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <h2 class="text-xl font-semibold text-gray-800">Tableau de bord administrateur</h2>
        </div>
    
    </header>

    <!-- Statistiques -->
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @php
                $cards = [
                    ['label' => 'Total Utilisateurs', 'value' => $statisticusers['totalusers'], 'icon' => 'fa-users', 'color' => 'from-indigo-600 to-indigo-500'],
                    ['label' => 'Prestataires Actifs', 'value' => $statisticusers['totalprestataire'], 'icon' => 'fa-briefcase', 'color' => 'bg-blue-500'],
                    ['label' => 'Clients Actifs', 'value' => $statisticusers['totalclients'], 'icon' => 'fa-user-friends', 'color' => 'bg-green-500'],
                    ['label' => 'Utilisateurs Banni', 'value' => $statisticusers['totalusersbanni'], 'icon' => 'fa-user-slash', 'color' => 'bg-red-500'],
                ];
            @endphp

            @foreach($cards as $card)
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">{{ $card['label'] }}</p>
                            <h3 class="text-2xl font-bold">{{ $card['value'] }}</h3>
                        </div>
                        <div class="w-12 h-12 rounded-full {{ str_contains($card['color'], 'from-') ? 'bg-gradient-to-r ' . $card['color'] : $card['color'] }} flex items-center justify-center">
                            <i class="fas {{ $card['icon'] }} text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Chart + Inscriptions -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Chart -->
            <div class="bg-white rounded-xl shadow-sm p-6 lg:col-span-2 border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-semibold text-lg">Statistiques d'Utilisateurs</h3>
                  
                </div>
                <div class="h-80 w-full">
    <canvas id="userStatsChart"></canvas>
</div>

            </div>

            <!-- Inscriptions récentes -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-semibold text-lg">Inscriptions Récentes</h3>
                    <a href="/admin/utilisateurs">
                        <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">Voir tout <i class="fas fa-arrow-right ml-1"></i></button>
                    </a>
                </div>
                <div class="space-y-5">
                    @foreach($lastusers as $user)
                        <div class="flex items-center">
                            <img src="/storage/{{$user->Photo}}" class="w-10 h-10 rounded-full object-cover" alt="Photo utilisateur">
                            <div class="ml-4">
                                <h4 class="font-medium text-sm">{{ $user->Prenom }} {{ $user->Nom }}</h4>
                                <p class="text-xs text-gray-500">{{ $user->Role->nom }} • {{ $user->created_at->locale('fr')->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-semibold text-lg">Réservations Récentes</h3>
                <a href="/admin/rendez-vous">
                    <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">Voir tout <i class="fas fa-arrow-right ml-1"></i></button>
                </a>
            </div>
            <div class="space-y-4">
                @foreach($reservations as $reservation)
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition">
                        <div class="flex items-center">
                            <img src="/storage/{{$reservation->Service->Photo}}" alt="Service" class="w-10 h-10 rounded-full object-cover">
                            <div class="ml-4">
                                <h4 class="font-medium text-sm">{{ $reservation->Service->titre }}</h4>
                                <p class="text-xs text-gray-500 truncate max-w-xs">{{ $reservation->Service->Description }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-500">{{ $reservation->reservation_date }}</p>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium 
                                @if($reservation->status == 'Confirmée')
                                    bg-green-100 text-green-800
                                @elseif($reservation->status == 'En attente')
                                    bg-yellow-100 text-yellow-800
                                @elseif($reservation->status == 'Annulée')
                                    bg-red-100 text-red-800
                                @else
                                    bg-gray-100 text-gray-800
                                @endif">
                                {{ $reservation->status }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

<script>
    const ctx = document.getElementById('userStatsChart').getContext('2d');
    const userStatsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total Utilisateurs', 'Prestataires', 'Clients', 'Bannis'],
            datasets: [{
                label: "Nombre d'utilisateurs",
                data: [
                    {{ $statisticusers['totalusers'] }},
                    {{ $statisticusers['totalprestataire'] }},
                    {{ $statisticusers['totalclients'] }},
                    {{ $statisticusers['totalusersbanni'] }}
                ],
                backgroundColor: [
                    'rgba(79, 70, 229, 0.7)',
                    'rgba(59, 130, 246, 0.7)',
                    'rgba(34, 197, 94, 0.7)',
                    'rgba(239, 68, 68, 0.7)'
                ],
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
