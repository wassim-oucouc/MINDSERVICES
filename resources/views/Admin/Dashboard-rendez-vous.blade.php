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
               
            </header>

            <!-- Appointments content -->
            <div class="p-6">
                <!-- Filters -->
                <div class="flex flex-wrap items-center justify-between mb-6">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <h3 class="font-semibold text-gray-900">Liste des Rendez-vous</h3>
                    </div>
                   
                </div>

                @if(session('error'))
    <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
        {{ session('error') }}
    </div>
@endif
@if(session('modifier'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
        {{ session('modifier') }}
    </div>
@endif

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
                @foreach($reservation as $reserv)
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
                            {{json_encode($reserv->status)}},
                            {{json_encode($reserv->Prestataire->Prenom)}},
                            {{json_encode($reserv->Prestataire->Nom)}},
                            {{json_encode($reserv->Prestataire->Email)}},
                            {{json_encode($reserv->Prestataire->Photo)}},
                            {{json_encode($reserv->Client->Prenom)}},
                            {{json_encode($reserv->Client->Nom)}},
                            {{json_encode($reserv->Client->Email)}},
                            {{json_encode($reserv->Client->Photo)}},
                            {{json_encode($reserv->reservation_date)}},
                            {{json_encode($reserv->reservation_time)}},
                            {{json_encode($reserv->Service->titre)}},
                            {{json_encode($reserv->Service->duration)}},
                            {{json_encode($reserv->created_at)}},
                            {{json_encode($reserv->Service->Prix)}})" class="text-indigo-600 hover:text-indigo-900 mx-1">
                            <i class="fas fa-eye"></i>
                        </button>
                    <div>
                        <button onclick="modaldatemodifier({{$reserv->id}},'{{$reserv->reservation_date}}','{{$reserv->reservation_time}}',{{$reserv->Service->id}})" class="text-indigo-600 hover:text-indigo-900 mx-1">
                            <i class="fas fa-edit"></i>
                        </button>
</div>
                        <div>
                        <form action="/admin/rendez-vous/details/delete/{{$reserv->id}}" method = "POST">
                            @csrf 
                            @method('DELETE')
                        <button class="text-red-600 hover:text-red-900 mx-1">
                            <i class="fas fa-times-circle"></i>
                        </button>
                        </form>
</div>
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
            <h3  class="text-xl font-semibold text-indigo-700">Détails du Rendez-vous</h3>
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
            <form id = "cancelreservation" action ="/admin/rendez-vous/cancel/{{$reserv->id}}" method = "POST" >
                @csrf 
                @method('PUT')
            <button id = "annulerrdv" type = "submit" class="px-4 py-2 bg-red-600 rounded-lg text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors">
                <i class="fas fa-times-circle mr-2"></i>
                Annuler le RDV
            </button>
</form>
        </div>
    </div>
</div>

<!-- Modal pour modifier la date de réservation -->
<div id="modificationDateModal" class="fixed inset-0 flex items-center justify-center z-50 backdrop-blur-sm bg-white/30 hidden">
  <div class="bg-white/80 backdrop-blur-md rounded-2xl p-6 w-full max-w-md shadow-2xl border border-gray-200">
  @if(session('error'))
    <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
        {{ session('error') }}
    </div>
@endif
<form action="/admin/rendez-vous/details/update" method="POST">
      @csrf
      @method('PUT')
    <h2 class="text-xl font-bold text-gray-800 mb-4">Modifier la date de réservation</h2>
    <p class="text-gray-700 mb-4">Veuillez choisir une nouvelle date et heure pour votre réservation :</p>
    
   
      <input type="hidden" id = "reservation_id" name="reservation_id" value="{{$reserv->id}}">
      <input type="hidden" id = "service_id" name="service_id">
      
      <div class="mb-4">
        <label for="new_date" class="block text-sm font-medium text-gray-700 mb-1">Nouvelle date</label>
        <input type="date" id="date_picker" name="new_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      </div>
      
      <div class="mb-6">
        <label for="new_time" class="block text-sm font-medium text-gray-700 mb-1">Nouvelle heure</label>
        <select id = "time_picker" name = "time" class="w-full border rounded-lg p-2" id="time-select">
                            <option value="" disabled selected>Sélectionnez une heure</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                        </select>
      </div>
      
      <div class="flex justify-center space-x-4">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200">
          Confirmer
        </button>
        <button type="button" onclick="fermerModalDate()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition-colors duration-200">
          Annuler
        </button>
        </form>
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
 let ModalDateHeure = document.querySelector('#modificationDateModal');
let service_id = document.querySelector('#service_id');

let date_picker = document.querySelector('#date_picker');

let time_picker = document.querySelector('#time_picker');

let reservation_id = document.querySelector('#reservation_id');

let reservation_id_text = document.querySelector('#modal_reservation_id');



 flatpickr("#date_picker", {
        dateFormat: "Y-m-d",
                minDate: "today",
                disableMobile: "true"
    });

 

    function fermerModalDate()
    {
        ModalDateHeure.classList.add('hidden');
    }


    function modaldatemodifier(id,reservation_date,reservation_time,id_service)
    {
        document.querySelector('#modal_reservation_id').textContent = 50 
        reservation_id.value = id;
        service_id.value = id_service;
        date_picker.value = reservation_date;
        time_picker.value = reservation_time;
        ModalDateHeure.classList.remove('hidden');
    }

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