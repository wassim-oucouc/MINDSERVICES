@extends('layout.client')

@section('title', 'Détails de la Réservation')

@section('services-réservés', 'flex items-center px-2 py-2 text-sm font-medium rounded-md bg-indigo-50 text-indigo-600')

@section('content')

<!-- CONTENU PRINCIPAL -->
<div class="flex-1 overflow-auto pt-16 md:pt-0 md:ml-0">
    <div class="shadow-lg">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center">
                    <a href="/client/reservation" class="mr-4 text-black transition-colors duration-200">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </a>
                    <h1 class="text-2xl font-semibold text-gray-900">Détails de la réservation</h1>
                </div>
                <div class="mt-4 md:mt-0">
                    @if($reservation->status == 'Confirmée')
                        <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-green-100 text-green-800 flex items-center inline-flex">
                            <span class="w-2 h-2 bg-green-400 rounded-full mr-1.5"></span>
                            Confirmée
                        </span>
                    @elseif($reservation->status == 'Terminée')
                        <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-gray-100 text-gray-800 flex items-center inline-flex">
                            <span class="w-2 h-2 bg-gray-400 rounded-full mr-1.5"></span>
                            Terminée
                        </span>
                    @elseif($reservation->status == 'Annulée')
                        <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-red-100 text-red-800 flex items-center inline-flex">
                            <span class="w-2 h-2 bg-red-400 rounded-full mr-1.5"></span>
                            Annulée
                        </span>
                        @elseif($reservation->status == 'En attente')
                        <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 flex items-center inline-flex">
                            <span class="w-2 h-2 bg-yellow-400 rounded-full mr-1.5"></span>
                            En attente
                            </span>
                    @elseif($reservation->status == 'En cours')
                        <span class="px-3 py-1.5 text-xs font-medium rounded-full bg-blue-100 text-blue-800 flex items-center inline-flex">
                            <span class="w-2 h-2 bg-blue-400 rounded-full mr-1.5"></span>
                            En cours
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Colonne de gauche: Informations principales -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Carte du service -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Informations du service</h2>
                        <div class="flex flex-col md:flex-row md:items-start">
                            <div class="flex-shrink-0 h-32 w-32 rounded-xl bg-indigo-100 flex items-center justify-center shadow overflow-hidden mb-4 md:mb-0 md:mr-6">
                                <img src="/storage/{{$reservation->Service->Photo}}" alt="Service Title" class="h-full w-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900">{{$reservation->Service->titre}}</h3>
                                <p class="mt-2 text-sm text-gray-600">{{$reservation->Service->Description}}</p>
                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <i class="fas fa-tag text-indigo-600"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Catégorie</p>
                                            <p class="text-sm text-gray-600">{{$reservation->Service->category->Nom}}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <i class="fas fa-euro-sign text-indigo-600"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Tarif</p>
                                            <p class="text-sm text-gray-600">{{$reservation->Service->Prix}} € / hour</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Détails de la réservation -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Détails de la réservation</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">Date et heure</h3>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="flex items-center text-sm text-gray-800">
                                        <i class="fas fa-calendar-day mr-3 h-5 w-5 text-indigo-500"></i>
                                        Date: {{$reservation->reservation_date}}
                                    </p>
                                    <p class="flex items-center text-sm text-gray-800 mt-3">
                                        <i class="fas fa-clock mr-3 h-5 w-5 text-indigo-500"></i>
                                        Heure: {{$reservation->reservation_time}}
                                    </p>
                                    <p class="flex items-center text-sm text-gray-800 mt-3">
                                        <i class="fas fa-hourglass-half mr-3 h-5 w-5 text-indigo-500"></i>
                                        Durée: {{$reservation->Service->duration}} heures
                                    </p>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">Adresse</h3>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="flex items-center text-sm text-gray-800">
                                        <i class="fas fa-map-marker-alt mr-3 h-5 w-5 text-indigo-500"></i>
                                        {{$reservation->Adresse->address}}
                                    </p>
                                    <p class="flex items-center text-sm text-gray-800 mt-3">
                                        <i class="fas fa-city mr-3 h-5 w-5 text-indigo-500"></i>
                                        {{$reservation->Adresse->postal_code}} {{$reservation->Adresse->city}}
                                    </p>
                                    <p class="flex items-center text-sm text-gray-800 mt-3">
                                        <i class="fas fa-info-circle mr-3 h-5 w-5 text-indigo-500"></i>
                                        Aucune information supplémentaire
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">Récapitulatif du paiement</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-sm text-gray-800">Prix horaire</span>
                                    <span class="text-sm font-medium text-gray-900">{{$reservation->Service->Prix}} €</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-sm text-gray-800">Durée du service</span>
                                    <span class="text-sm font-medium text-gray-900">{{$reservation->Service->duration}} heures</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-t border-gray-200 mt-2 pt-2">
                                    <span class="text-sm font-medium text-gray-800">Total</span>
                                    <span class="text-lg font-semibold text-indigo-600">{{$totalReservation}} €</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne de droite: Prestataire et actions -->
            <div class="space-y-8">
                <!-- Carte du prestataire -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Votre prestataire</h2>
                        <div class="flex flex-col items-center text-center">
                            <div class="h-24 w-24 rounded-full bg-indigo-100 flex items-center justify-center shadow-md overflow-hidden mb-4">
                                <img src="/storage/{{$reservation->Prestataire->Photo}}" alt="Provider Name" class="h-full w-full object-cover">
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">{{$reservation->Prestataire->Prenom}} {{$reservation->Prestataire->Nom}}</h3>
                            <div class="mt-2 flex items-center">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="far fa-star text-yellow-400"></i>
                                <span class="ml-2 text-sm text-gray-600">(10 avis)</span>
                            </div>
                            <p class="mt-4 text-sm text-gray-600">{{$reservation->Professional->service_principal}}</p>
                            <div class="mt-4 flex flex-col space-y-2 w-full">
                                <a href="tel:{{$reservation->Professional->telephone}}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">
                                    <i class="fas fa-phone-alt mr-2"></i> Appeler
                                </a>
                                <a href="mailto:{{$reservation->Prestataire->Email}}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                                    <i class="fas fa-envelope mr-2"></i> Envoyer un message
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions sur la réservation -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Actions</h2>
                        <div class="space-y-3">
                            <a href="mailto:{{$reservation->Prestataire->Email}}" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">
                                <i class="fas fa-comments mr-2"></i> Contacter le prestataire
                            </a>
                            @if($reservation->status == 'En cours')
                            <button type="button" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 transition-colors duration-200">
                                <i class="fas fa-edit mr-2"></i> Modifier ma réservation
                            </button>
                            <button type="button" class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                                <i class="fas fa-times mr-2"></i> Annuler ma réservation
                            </button>
                            @elseif($reservation->status =='Confirmée')
                            <button type="button" id="give-review-button" class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                                <i class="fas fa-star mr-2"></i> Donner l'avis
                            </button>
                            @elseif($reservation->status == 'En attente')
                            
                            <button type="button" class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
    <i class="fas fa-check-circle mr-2"></i> Compléter la réservation
</button>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Modal d'avis -->
                <div id="review-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                    <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
                    <div class="modal-container bg-white w-11/12 md:w-1/3 rounded-lg shadow-lg z-50 overflow-y-auto">
                        <div class="modal-header flex justify-between items-center p-4 border-b">
                            <h2 class="text-xl font-semibold">Donner un avis</h2>
                            <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body p-4">
                            <form action="/client/reservation/{{$reservation->id}}/review" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="rating" class="block text-sm font-medium text-gray-700">Évaluation</label>
                                    <select id="rating" name="rating" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="1">1 étoile</option>
                                        <option value="2">2 étoiles</option>
                                        <option value="3">3 étoiles</option>
                                        <option value="4">4 étoiles</option>
                                        <option value="5">5 étoiles</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="comment" class="block text-sm font-medium text-gray-700">Commentaire</label>
                                    <textarea id="comment" name="comment" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">
                                        Soumettre l'avis
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Support client -->
                <div class="bg-indigo-50 shadow-lg rounded-xl overflow-hidden border border-indigo-100">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                <i class="fas fa-headset text-indigo-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-medium text-gray-900">Besoin d'aide ?</h3>
                                <p class="text-sm text-gray-600 mt-1">Notre équipe est disponible 7j/7</p>
                            </div>
                        </div>
                        <div class="mt-4 space-y-3">
                            <a href="/help" class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">
                                <i class="fas fa-comments mr-2"></i> Contacter le support
                            </a>
                            <a href="/faq" class="inline-flex items-center justify-center w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                                <i class="fas fa-question-circle mr-2"></i> FAQ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    document.getElementById('give-review-button').addEventListener('click', function() {
        document.getElementById('review-modal').classList.remove('hidden');
    });

    document.getElementById('close-modal').addEventListener('click', function() {
        document.getElementById('review-modal').classList.add('hidden');
    });

    // Fermer le modal en cliquant en dehors de celui-ci
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('review-modal');
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>

@endsection