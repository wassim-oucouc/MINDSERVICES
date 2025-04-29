@extends('layout.app')

@section('title', 'Réservation de service')
@section('content')
<body class="bg-white text-gray-900">
    <div class="max-w-5xl mx-auto p-4">
        <!-- En-tête de navigation -->
        <header class="flex items-center mb-6">
            <i class="fas fa-chevron-left text-xl"></i>
            
            <h1 class="text-2xl font-semibold ml-2">Réservation de Service</h1>
        </header>
        @if (session('error'))
    <div class="max-w-6xl mx-auto mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erreur!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none'">
                    <title>Fermer</title>
                    <path d="M10 9l-5-5-1.41 1.41L8.59 10l-5 5L5 16l5-5 5 5 1.41-1.41-5-5 5-5L15 4l-5 5z"/>
                </svg>
            </span>
        </div>
    </div>
@endif
        <!-- Bannière principale avec étapes de progression -->
        <section class="relative bg-cover bg-center rounded-lg overflow-hidden mb-8" style="background-image: url('/api/placeholder/1600/400')">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-900 to-indigo-700 opacity-90"></div>
             
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <!-- En-tête avec étapes -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold text-white">Finalisez votre réservation</h2>
                        <p class="mt-2 text-indigo-100">Quelques dernières informations pour confirmer votre demande</p>
                    </div>
                    <input id = "service_id" type="hidden" name="service_id" value = "{{$service->id}}" >
                    <!-- Indicateur d'étapes -->
                    <div class="mt-4 md:mt-0 flex items-center">
                        <div class="flex items-center text-white">
                            <span class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-800 flex items-center justify-center font-bold">1</span>
                            <span class="mx-2 text-indigo-200">→</span>
                            <span class="w-10 h-10 rounded-full bg-white text-indigo-800 flex items-center justify-center font-bold">2</span>
                            <span class="mx-2 text-indigo-200">→</span>
                            <span class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-800 flex items-center justify-center font-bold">3</span>
                        </div>
                    </div>
                </div>

                <!-- Carte du service réservé -->
                <div class="mt-8 bg-white bg-opacity-10 rounded-xl p-6 backdrop-filter backdrop-blur-sm">
                    <div class="flex flex-col md:flex-row items-start">
                        <div class="flex-shrink-0 mb-4 md:mb-0">
                            <img src="/storage/{{$service->Photo}}" alt="Service professionnel" class="w-20 h-20 object-cover rounded-lg">
                        </div>
                        <div class="md:ml-4 flex-grow">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-white">{{$service->titre}}</h3>
                                    <p class="text-indigo-100">{{$service->category->Nom}}</p>
                                </div>
                                <div class="mt-2 md:mt-0">
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-300 mr-2">
                                        @for( $i = 1 ; $i <= 5 ; $i++)
                                    @if($i <= $AvisAverage)
                                        <i class="fas fa-star"></i> 
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor   
                                        </div>
                                        <span class="text-white font-medium">{{$AvisAverage}}</span>
                                        <span class="text-indigo-200 ml-1">({{$TotalAvisPrestataire}} avis)</span>
                                    </div>
                                    <p class="text-white font-bold text-xl mt-1">{{$service->Prix}}€<span class="text-indigo-200 text-base font-normal">/heure</span></p>
                                </div>
                            </div>
                            
                            <!-- Informations sur le professionnel -->
                            <div class="flex items-center mt-2">
                                <div class="h-8 w-8 rounded-full overflow-hidden bg-indigo-100 flex-shrink-0">
                                    <img src="/storage/{{$service->Prestataire->Photo}}" alt="Professionnel" class="h-full w-full object-cover">
                                </div>
                                <div class="ml-2">
                                    <p class="text-white">{{$service->Prestataire->Prenom}} {{$service->Prestataire->Nom}}</p>
                                    <p class="text-indigo-200 text-sm">Professionnel certifié</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section principale de réservation -->
        <main class="flex flex-col lg:flex-row gap-6">
            <div class="flex-1">
                <form id = "reservation" action= "/reservation/step/store" method = "POST">
                    @csrf
                    <input id = "reservation_date" value = "" type="hidden" name="reservation_date">
                    <input id = "reservation_time" value = "" type="hidden" name="reservation_time">
                    <input id = "service_id" type="hidden" name="id_service" value = "{{$service->id}}">
                    <input type="hidden" name="prestataire_id" value = "{{$service->Prestataire->id}}">
                <!-- Message d'alerte -->
                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <p class="font-semibold">Service de qualité exceptionnelle.</p>
                    <p>Les réservations sont fréquentes chez nous.</p>
                </div>

                <!-- Formulaire de réservation -->
                <section class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Votre réservation</h2>
                    <!-- Sélection de date -->
                    <div class="mb-4">
                        <label for="date-picker" class="font-semibold block mb-2">Date</label>
                        <input name = "date" type="text" id="date-picker" class="w-full border rounded-lg p-2" placeholder="Sélectionnez une date">
                    </div>
                    
                    <!-- Sélection d'heure -->
                    <div class="mb-4">
                        <label for="time-select" class="font-semibold block mb-2">Heure</label>
                        <select name = "time" class="w-full border rounded-lg p-2" id="time-select">
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
                <!-- Authentification et contact -->
                <section>
                    <h2 class="text-xl font-semibold mb-4">Connectez-vous ou inscrivez-vous pour réserver</h2>
                    
                 
                    
                    <!-- Politique de confidentialité -->
                    <p class="text-sm text-gray-600 mb-6">
                    Appuyez sur "Continuer" pour vous connecter ou créer un compte, puis remplissez vos informations personnelles afin de finaliser votre réservation.
                    Si vous êtes déjà connecté, vous serez redirigé directement vers le formulaire de réservation.
                        <a class="text-blue-600" href="#">Politique de confidentialité</a>
                    </p>
                    
                    <!-- Bouton de soumission -->
                    <button name = "submit_button" id ="button_continuer" type ="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                        Continuer
                    </button>
                </section>
                </form>
            </div>
            
            <!-- Ici vous pouvez ajouter une sidebar pour le résumé de la commande si nécessaire -->
        </main>
    </div>
    
    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser le sélecteur de date
            flatpickr("#date-picker", {
                dateFormat: "Y-m-d",
                minDate: "today",
                disableMobile: "true"
            });
        });
    </script>
</body>
@endsection