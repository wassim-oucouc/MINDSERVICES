@extends('layout.Admin')

@section('title', 'flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600')

@section('title', 'Rendez-Vous')
@section('content')
        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Gestion des Rendez-vous</h2>
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

            <!-- Appointments content -->
            <div class="p-6">
                <!-- Filters -->
                <div class="flex flex-wrap items-center justify-between mb-6">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <h3 class="font-semibold text-gray-900">Liste des Rendez-vous</h3>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Tous les statuts</option>
                            <option>En attente</option>
                            <option>Confirmés</option>
                            <option>Terminés</option>
                            <option>Annulés</option>
                        </select>
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Tous les prestataires</option>
                            <option>Paul Martin</option>
                            <option>Camille Laurent</option>
                            <option>Lucas Petit</option>
                            <option>Emma Bernard</option>
                        </select>
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Trier par: Date (récent)</option>
                            <option>Trier par: Date (ancien)</option>
                            <option>Trier par: Durée</option>
                            <option>Trier par: Statut</option>
                        </select>
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
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500">
                                            <span>ID</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestataire</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Heure</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durée</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <@foreach($reservation as $reserv)
                                <tr class="table-row hover:bg-indigo-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500 mr-3">
                                            <span class="text-sm text-gray-900">#{{$reserv->id}}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 flex-shrink-0">
                                                <img src="/storage/{{$reserv->Client->Photo}}" alt="Client" class="h-8 w-8 rounded-full object-cover">
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">{{$reserv->Client->Prenom}} {{$reserv->Client->Nom}}</div>
                                                <div class="text-xs text-gray-500">{{$reserv->Client->Email}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 flex-shrink-0">
                                                <img src="/storage/{{$reserv->Prestataire->Photo}}" alt="Prestataire" class="h-8 w-8 rounded-full object-cover">
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">{{$reserv->Prestataire->Prenom}} {{$reserv->Prestataire->Nom}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$reserv->Service->titre}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$reserv->reservation_date}}</div>
                                        <div class="text-xs text-gray-500">{{$reserv->reservation_time}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$reserv->Service->duration}}/h</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    @if($reserv->status == 'Confirmée')
                            <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-green-100 text-green-800 flex items-center inline-flex">
                                <span class="w-2 h-2 bg-green-400 rounded-full mr-1.5"></span>
                                Confirmée
                            </span>
                        @elseif($reserv->status == 'Terminée')
                            <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-gray-100 text-gray-800 flex items-center inline-flex">
                                <span class="w-2 h-2 bg-gray-400 rounded-full mr-1.5"></span>
                                Terminée
                            </span>
                        @elseif($reserv->status == 'Annulée')
                            <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-red-100 text-red-800 flex items-center inline-flex">
                                <span class="w-2 h-2 bg-red-400 rounded-full mr-1.5"></span>
                                Annulée
                            </span>
                        @elseif($reserv->status == 'En attente')
                            <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 flex items-center inline-flex">
                                <span class="w-2 h-2 bg-yellow-400 rounded-full mr-1.5"></span>
                                En attente
                            </span>
                        @elseif($reserv->status == 'En cours')
                            <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-orange-100 text-orange-800 flex items-center inline-flex">
                                <span class="w-2 h-2 bg-blue-400 rounded-full mr-1.5"></span>
                                En cours
                            </span>
                            @elseif($reserv->status == 'annulation demandée')
                            <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-orange-100 text-orange-800 flex items-center inline-flex">
                                <span class="w-2 h-2 bg-orange-400 rounded-full mr-1.5"></span>
                                annulation demandée
                            </span>
                            @elseif($reserv->status == 'En attente Paiement')
                            <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 flex items-center inline-flex">
                                <span class="w-2 h-2 bg-yellow-400 rounded-full mr-1.5"></span>
                                En attente Paiement
                            </span>
                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="openmodal(
    {{$reserv->id}},
    '{{$reserv->status}}',
    '{{$reserv->Prestataire->Prenom}}',
    '{{$reserv->Prestataire->Nom}}',
    '{{$reserv->Prestataire->Email}}',
    '{{$reserv->Prestataire->Photo}}',
    '{{$reserv->Client->Prenom}}',
    '{{$reserv->Client->Nom}}',
    '{{$reserv->Client->Email}}',
    '{{$reserv->Client->Photo}}',
    '{{$reserv->reservation_date}}',
    '{{$reserv->reservation_time}}',
    '{{$reserv->Service->titre}}',
    '{{$reserv->Service->duration}}',
    '{{$reserv->created_at}}',
    '{{$reserv->Service->Prix}}'
)" class="text-indigo-600 hover:text-indigo-900 mx-1">                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 mx-1">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal Backdrop (hidden by default) -->
<div id="reservationModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <!-- Modal Content -->
    <div class="bg-white rounded-xl shadow-xl max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between bg-indigo-50">
            <h3 class="text-xl font-semibold text-indigo-700">Détails du Rendez-vous #<span id="modal-reservation-id">123</span></h3>
            <button  onclick = "closemodal()" id="closeModal" class="text-gray-500 hover:text-indigo-600 focus:outline-none">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="p-6">
            <!-- Status Banner -->
            <div class="mb-6 flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600">
                <i class="fas fa-info-circle text-xl"></i>
                <p class="font-medium">Statut: <span id="modal-status">Confirmé</span></p>
            </div>
            
            <!-- Main Info Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Client Information -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-user mr-2 text-indigo-500"></i>
                        Information du Client
                    </h4>
                    <div class="flex items-start">
                        <div class="mr-4">
                            <img id="modal-client-photo" src="/placeholder.svg?height=80&width=80" alt="Client" class="h-20 w-20 rounded-full object-cover border-2 border-indigo-200">
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Nom complet</p>
                            <p id="modal-client-name" class="text-gray-900 font-medium mb-2">Prénom Nom</p>
                            
                            <p class="text-sm text-gray-500">Email</p>
                            <p id="modal-client-email" class="text-gray-900 mb-2">client@example.com</p>
                            
                 
                        </div>
                    </div>
                </div>
                
                <!-- Prestataire Information -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-user-tie mr-2 text-indigo-500"></i>
                        Information du Prestataire
                    </h4>
                    <div class="flex items-start">
                        <div class="mr-4">
                            <img id="modal-prestataire-photo" src="/placeholder.svg?height=80&width=80" alt="Prestataire" class="h-20 w-20 rounded-full object-cover border-2 border-indigo-200">
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Nom complet</p>
                            <p id="modal-prestataire-name" class="text-gray-900 font-medium mb-2">Prénom Nom</p>
                            
                            <p class="text-sm text-gray-500">Email</p>
                            <p id="modal-prestataire-specialite" class="text-gray-900 mb-2">Spécialité</p>
                
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Service & Appointment Details -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 mb-6">
                <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                    <i class="fas fa-calendar-alt mr-2 text-indigo-500"></i>
                    Détails du Rendez-vous
                </h4>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Service</p>
                        <p id="modal-service" class="text-gray-900 font-medium">Nom du service</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Date & Heure</p>
                        <p id="modal-date-time" class="text-gray-900 font-medium">12/05/2023 à 14:30</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Durée</p>
                        <p id="modal-duration" class="text-gray-900 font-medium">1h30</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Prix</p>
                        <p id="modal-price" class="text-gray-900 font-medium">75€</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Méthode de paiement</p>
                        <p id="modal-payment" class="text-gray-900 font-medium">Carte bancaire</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Créé le</p>
                        <p id="created_at" class="text-gray-900 font-medium">10/05/2023</p>
                    </div>
                </div>
            </div>
            
            <!-- Notes -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 mb-6">
                <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                    <i class="fas fa-sticky-note mr-2 text-indigo-500"></i>
                    Notes
                </h4>
                <p id="modal-notes" class="text-gray-700">Aucune note pour ce rendez-vous.</p>
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div class=" buttons border-t border-gray-200 px-6 py-4 bg-gray-50 flex flex-wrap items-center justify-end gap-3">
            <button onclick = "window.print()"  class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors">
                <i class="fas fa-print mr-2"></i>
                Imprimer
            </button>
            <button id = "modifierreservation" class="px-4 py-2 bg-indigo-600 rounded-lg text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors">
                <i class="fas fa-edit mr-2"></i>
                Modifier
            </button>
            <form id = "cancelreservation" action ="/admin/rendez-vous/cancel/{{$reserv->id}}" method = "POST" >
                @csrf 
                @method('PUT')
            <button id = "annulerrdv" type = "submit" class="px-4 py-2 bg-red-600 rounded-lg text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors">
                <i class="fas fa-times-circle mr-2"></i>
                Annuler le RDV
            </button>
        </div>
    </div>
</div>
                

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-8">
                    <div class="text-sm text-gray-600">
                       {{$reservation->links()}}
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>

let modal_client_name = document.querySelector('#modal-client-name');
let modal_client_email = document.querySelector('#modal-client-email');
let modal_client_photo = document.querySelector('#modal-client-photo');
let modal_prestataire_name = document.querySelector('#modal-prestataire-name');
let modal_prestataire_email= document.querySelector('#modal-prestataire-specialite');
let modal_prestataire_photo = document.querySelector('#modal-prestataire-photo');
let nom_service = document.querySelector('#modal-service');
let modal_date_time = document.querySelector('#modal-date-time');
let modal_duration = document.querySelector('#modal-duration');
let modal_price = document.querySelector('#modal-price');
let created_at = document.querySelector('#created_at');
 let modal_status = document.querySelector('#modal-status');

 function closemodal()
{
    document.querySelector('#reservationModal').classList.add('hidden');
}



function openmodal(
    id,
    status,
    PrenomPrestataire,
    NomPrestataire,
    EmailPrestataire,
    PhotoPrestataire,
    PrenomClient,
    NomClient,
    EmailClient,
    PhotoClient,
    ReservationDate,
    ReservationTime,
    ServiceTitre,
    ServiceDuration,
    createdAtParam,
    ServicePrix
) {
    if(!document.querySelector('#annulerrdv'))
{
    document.querySelector('.buttons').innerHTML += `<button id = "modifierreservation" class="px-4 py-2 bg-indigo-600 rounded-lg text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors">
                <i class="fas fa-edit mr-2"></i>
                Modifier
            </button>
            <form id = "cancelreservation" action ="/admin/rendez-vous/cancel/{{$reserv->id}}" method = "POST" >
                @csrf 
                @method('PUT')
    <button id="annulerrdv" type="submit" class="px-4 py-2 bg-red-600 rounded-lg text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors">
                <i class="fas fa-times-circle mr-2"></i>
                Annuler le RDV
            </button>
            </form>`;
}
    if(status == 'Annulée')
{
    document.querySelector('#modifierreservation').remove();
    document.querySelector('#annulerrdv').remove();
}
    console.log(id)
    let  cancelform = document.querySelector('#cancelreservation');
    console.log(cancelform)
    cancelform.action = "/admin/rendez-vous/cancel/" + id;
    console.log('hello');
    modal_status.textContent = status;
    created_at.innerText = createdAtParam;
    modal_prestataire_name.textContent = PrenomPrestataire + " " + NomPrestataire;
    modal_client_name.textContent = PrenomClient + " " + NomClient;

    modal_prestataire_email.textContent = EmailPrestataire;
    modal_client_email.textContent = EmailClient; 

    modal_client_photo.src = "/storage/" + PhotoClient;
    modal_prestataire_photo.src = "/storage/" + PhotoPrestataire;

    nom_service.textContent = ServiceTitre;
    modal_date_time.textContent = ReservationDate + " à " + ReservationTime;
    modal_duration.textContent = ServiceDuration + "h";
    modal_price.textContent = ServicePrix;

    document.querySelector('#reservationModal').classList.remove('hidden');
}



        document.querySelector('.fa-bars').addEventListener('click', function() {
            const sidebar = document.querySelector('aside');
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>
</html>

@endsection