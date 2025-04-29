@extends('layout.Prestataire')

@section('title', 'Gestion des Rendez-Vous')
@section('content')
    <!-- Main Content -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
        <!-- Top header -->
        <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
            <div class="flex items-center">
                <button class="text-gray-500 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md p-1 mr-6 transition-colors">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-xl font-semibold text-gray-800">Gestion des Rendez-vous</h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Rechercher..." class="bg-gray-100 rounded-full py-2 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all w-64">
                    <i class="fas fa-search absolute right-3 top-2.5 text-gray-500"></i>
                </div>
                <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full relative transition-colors">
                    <i class="fas fa-bell text-xl"></i>
                    <span class="absolute top-0 right-0 h-5 w-5 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                </button>
                <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full transition-colors">
                    <i class="fas fa-cog text-xl"></i>
                </button>
            </div>
        </header>

        <!-- Appointments content -->
        <div class="p-6">
            <!-- Header and Filters -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Liste des Rendez-vous</h3>
                        <p class="text-sm text-gray-500 mt-1">Gérez tous vos rendez-vous clients</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <div class="relative">
                            <select class="bg-white border border-gray-300 rounded-lg pl-4 pr-10 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm appearance-none cursor-pointer">
                                <option>Tous les statuts</option>
                                <option>En attente</option>
                                <option>Confirmés</option>
                                <option>En cours</option>
                                <option>Terminés</option>
                                <option>Annulés</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-500 pointer-events-none"></i>
                        </div>
                        <div class="relative">
                            <select class="bg-white border border-gray-300 rounded-lg pl-4 pr-10 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm appearance-none cursor-pointer">
                                <option>Trier par: Date (récent)</option>
                                <option>Trier par: Date (ancien)</option>
                                <option>Trier par: Durée</option>
                                <option>Trier par: Statut</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-500 pointer-events-none"></i>
                        </div>
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg px-4 py-2.5 text-sm font-medium flex items-center transition-colors">
                            <i class="fas fa-calendar-plus mr-2"></i>
                            Nouveau
                        </button>
                    </div>
                </div>
            </div>

            <!-- Appointments Table -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <span>ID</span>
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Heure</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durée</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($reservations as $reservation)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-900">#{{$reservation->id}}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 rounded-full overflow-hidden border-2 border-white shadow-sm">
                                            <img src="/storage/{{$reservation->Client->Photo}}" alt="{{$reservation->Client->Prenom}}" class="h-full w-full object-cover">
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">{{$reservation->Client->Prenom}} {{$reservation->Client->Nom}}</div>
                                            <div class="text-xs text-gray-500">{{$reservation->Client->Email}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{$reservation->Service->titre}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{$reservation->reservation_date}}</div>
                                    <div class="text-xs text-gray-500">{{$reservation->reservation_time}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center text-sm text-gray-900">
                                        <i class="far fa-clock text-gray-400 mr-1.5"></i>
                                        {{$reservation->Service->duration}} h
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                @if($reservation->status == 'En attente')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-1.5"></span>
                                    En attente
                                </span>
                                @elseif($reservation->status == 'Confirmée')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-1.5"></span>
                                    Confirmée
                                </span>
                                @elseif($reservation->status == 'Terminée')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></span>
                                    Terminée
                                </span>
                                @elseif($reservation->status == 'Annulée')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-red-400 rounded-full mr-1.5"></span>
                                    Annulée
                                </span>
                                @elseif($reservation->status == 'En cours')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-sky-100 text-sky-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-sky-400 rounded-full mr-1.5"></span>
                                    En cours
                                </span>
                                @elseif($reservation->status == 'En attente Paiement')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-orange-100 text-sky-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-orange-400 rounded-full mr-1.5"></span>
                                    En attente Paiement
                                </span>
                                @elseif($reservation->status == 'annulation demandée')
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 text-sky-800 flex items-center">
                                    <span class="w-1.5 h-1.5 bg-red-400 rounded-full mr-1.5"></span>
                                    annulation demandée
                                </span>
                                @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end items-center space-x-2">
                                        @if($reservation->status == 'En attente')
                                        <div class="flex items-center">
                                            <a href="/professional/reservation/details/{{$reservation->id}}" class="text-gray-500 hover:text-indigo-600 bg-gray-100 hover:bg-indigo-50 p-2 rounded-lg transition-colors" title="Voir détails">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="/professional/confirm/reservation/{{$reservation->id}}" method="POST" class="ml-2">
                                                @csrf 
                                                @method('PUT')
                                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors flex items-center" title="Accepter">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            <form action="/professional/cancel/reservation/{{$reservation->id}}" method="POST" class="ml-2">
                                                @csrf 
                                                @method('PUT')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors flex items-center" title="Refuser">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                        @elseif($reservation->status == 'Confirmée')
                                        <div class="flex items-center">
                                            <a href="/professional/reservation/details/{{$reservation->id}}" class="text-gray-500 hover:text-indigo-600 bg-gray-100 hover:bg-indigo-50 p-2 rounded-lg transition-colors" title="Voir détails">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                        @elseif($reservation->status == 'En cours')
                                        <div class="flex items-center">
                                            <a href="/professional/reservation/details/{{$reservation->id}}" class="text-gray-500 hover:text-indigo-600 bg-gray-100 hover:bg-indigo-50 p-2 rounded-lg transition-colors" title="Voir détails">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors ml-2 flex items-center" title="Terminer">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                            <form action="/professional/cancel/reservation/{{$reservation->id}}" method="POST" class="ml-2">
                                                @csrf 
                                                @method('PUT')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors flex items-center" title="Annuler">
                                                    <i class="fas fa-times-circle"></i>
                                                </button>
                                            </form>
                                        </div>
                                        @else
                                        <div class="flex items-center">
                                            <a href="/professional/reservation/details/{{$reservation->id}}" class="text-gray-500 hover:text-indigo-600 bg-gray-100 hover:bg-indigo-50 p-2 rounded-lg transition-colors" title="Voir détails">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-between items-center mt-8">
                <div class="text-sm text-gray-600">
                    {{$reservations->links()}}
                </div>
            </div>
        </div>
    </main>

    <script>
        // Toggle sidebar
        document.querySelector('.fa-bars').addEventListener('click', function() {
            const sidebar = document.querySelector('aside');
            sidebar.classList.toggle('hidden');
        });
    </script>
@endsection