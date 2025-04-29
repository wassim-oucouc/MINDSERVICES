@extends('layout.Prestataire')

@section('title', 'Détail de Rendez-Vous')
@section('content')
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
        <!-- Top header -->
        <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
            <div class="flex items-center">
                <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-xl font-semibold text-gray-800">Détail du Rendez-vous</h2>
            </div>
            <div class="flex items-center">
                <a href="/professional/reservation" class="flex items-center text-indigo-600 hover:text-indigo-900">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Retour à la liste
                </a>
            </div>
        </header>

        <!-- Détail du rendez-vous -->
        <div class="p-6">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-6">
                <!-- En-tête avec statut -->
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                    <div class="flex items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Rendez-vous #{{$reservation->id}}</h3>
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
                    </div>
                    <div class="flex space-x-3">
                        <a target = "_blank" href="/service/details/{{$reservation->Service->id}}">
                    <button  class=" rounded-md px-3 py-1.5 bg-green-500 text-white  mx-1">
    🖨️
    <span>Details Service</span>
</button>
</a>
                    <button onclick="imprimerFacture()" class="px-3 py-1.5 bg-blue-500 text-white rounded  mx-1">
    🖨️
    <span>Imprimer la facture</span>
</button>
                    @if($reservation->status == 'En attente')
                    <form action="/professional/confirm/reservation/{{$reservation->id}}" method = "POST">
                        @csrf 
                        @method('PUT')
                        <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            <i class="fas fa-check mr-2"></i>Accepter
                        </button>
</form>
                        <form action="/professional/cancel/reservation/{{$reservation->id}}" method = "POST">
                            @csrf 
                            @method('PUT')
                        <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                            <i class="fas fa-times mr-2"></i>Refuser
                        </button>
</form>
@elseif($reservation->status == 'Confirmée')
<form action="/professional/cancel/reservation/details/{{$reservation->id}}" method = "POST">
                                        @csrf 
                                        @method('PUT')
                                        <button class="px-3 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 mx-1">
                                            Annuler
                                        </button>
                                        </form>
                                        <form action="/professional/reservation/confirmer/{{$reservation->id}}" method = "POST">
                                        @csrf 
                                        @method('PUT')
                                        <button class="px-3 py-1.5 bg-orange-500 text-white rounded hover:bg-orange-600 mx-1">
                                        Valider la réservation
                                        </button>
                                        </form>
@elseif($reservation->status == 'annulation demandée')
<form action="/professional/cancel/reservation/details/{{$reservation->id}}" method = "POST">
                        @csrf 
                        @method('PUT')
                        <button class="px-4 py-2 bg-green-500 text-white text-sm rounded hover:bg-green-600">
                            <i class="fas fa-check mr-2"></i>Accepter L'annulation
                        </button>
</form>
                        <form action="/professional/confirm/reservation/{{$reservation->id}}}" method = "POST">
                            @csrf 
                            @method('PUT')
                        <button class="px-4 py-2 bg-red-500 text-sm text-white rounded hover:bg-red-600">
                            <i class="fas fa-times mr-2"></i>Refuser L'annulation
                        </button>
</form>
@elseif($reservation->status == 'Terminée')
<form action="/professional/cancel/reservation/details/{{$reservation->id}}" method = "POST">
                                        @csrf 
                                        @method('PUT')
                                        <button class="px-3 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 mx-1">
                                            Annuler
                                        </button>
                                        </form>

                        @endif
                    </div>
                </div>

                <!-- Informations du rendez-vous -->
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Première colonne -->
                    <div>
                        <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Informations Client</h4>
                            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                <div class="h-16 w-16 flex-shrink-0">
                                    <img src="/storage/{{$reservation->Client->Photo}}" alt="Client" class="h-16 w-16 rounded-full object-cover">
                                </div>
                                <div class="ml-4">
                                    <div class="text-lg font-medium text-gray-900">{{$reservation->Client->Prenom ?? ""}} {{$reservation->Client->Nom ?? ""}}</div>
                                    <div class="text-gray-600">{{$reservation->Adresse->address}}</div>
                                    <div class="text-gray-600">{{$reservation->Adresse->city ?? ""}} {{$reservation->Adresse->postal_code ?? ""}}</div>
                                    <div class="text-gray-600">{{$reservation->Client->Email ?? ""}}</div>
                                    <div class="text-gray-600">{{$reservation->Client->Client->telephone ?? ""}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Service Réservé</h4>
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <div class="font-medium text-gray-900 mb-1">{{$reservation->Service->titre}}</div>
                                <div class="text-sm text-gray-600 mb-2">{{$reservation->Service->Description}}</div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Tarif:</span>
                                    <span class="font-medium text-gray-900">{{$reservation->Service->Prix}},00 €/h</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Seconde colonne -->
                    <div>
                        <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Détails du Rendez-vous</h4>
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <div class="text-xs text-gray-500">Date</div>
                                        <div class="font-medium text-gray-900">{{$reservation->reservation_date}}</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">Heure</div>
                                        <div class="font-medium text-gray-900">{{$reservation->reservation_time}}</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">Durée</div>
                                        <div class="font-medium text-gray-900">{{$reservation->Service->duration}}/h</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">Créé le</div>
                                        <div class="font-medium text-gray-900">{{$reservation->created_at}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Historique et actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        <div class="flex items-start">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">Rendez-vous créé</div>
                                <div class="text-xs text-gray-500">Le {{$reservation->created_at}} par {{$reservation->Client->Prenom}} {{$reservation->Client->Nom}}</div>
                            </div>
                        </div>
                    </div>
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

        function imprimerFacture()
        {
            window.print();
        }
    </script>

    <script src = "/js/print-invoice.js"></script>
@endsection