@extends('layout.app')

@section('title', 'Informations client')
@section('content')
<body class="bg-white text-gray-900">
    <div class="max-w-5xl mx-auto p-4">
        <!-- En-tête de navigation -->
        <header class="flex items-center mb-6">
            <i class="fas fa-chevron-left text-xl"></i>
            <h1 class="text-2xl font-semibold ml-2">Informations Client</h1>
        </header>

        <!-- Bannière principale avec étapes de progression -->
        <section class="relative bg-cover bg-center rounded-lg overflow-hidden mb-8" style="background-image: url('/api/placeholder/1600/400')">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-900 to-indigo-700 opacity-90"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <!-- En-tête avec étapes -->
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
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold text-white">Finalisez votre réservation</h2>
                        <p class="mt-2 text-indigo-100">Veuillez compléter vos informations personnelles</p>
                    </div>
                    <input id="service_id" type="hidden" name="service_id" value="1">
                    <!-- Indicateur d'étapes -->
                    <div class="mt-4 md:mt-0 flex items-center">
                        <div class="flex items-center text-white">
                            <span class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-800 flex items-center justify-center font-bold">1</span>
                            <span class="mx-2 text-indigo-200">→</span>
                            <span class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-800 flex items-center justify-center font-bold">2</span>
                            <span class="mx-2 text-indigo-200">→</span>
                            <span class="w-10 h-10 rounded-full bg-white text-indigo-800 flex items-center justify-center font-bold">3</span>
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

                            <!-- Résumé de la réservation -->
                            <div class="mt-3 p-2 bg-white bg-opacity-20 rounded-lg">
                                <div class="flex flex-wrap">
                                    <div class="mr-6 mb-2">
                                        <span class="text-indigo-200">Date:</span>
                                        <span class="text-white font-medium ml-1">{{$date_reservation}}</span>
                                    </div>
                                    <div>
                                        <span class="text-indigo-200">Heure:</span>
                                        <span class="text-white font-medium ml-1">{{$reservation_time}}</span>
                                    </div>
                                </div>
                            </div>
                            
                                                       <!-- Informations sur le professionnel -->
                                                       <div class="flex items-center mt-3">
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

        <!-- Section principale pour les informations client -->
        <main class="flex flex-col lg:flex-row gap-6">
            <div class="flex-1">
                <form id="client-info-form" action="/reservation/step/complete" method="POST">
                    @csrf
                    <input type="hidden" name="date" value="{{$date_reservation}}">
                    <input type="hidden" name="time" value="{{$reservation_time}}">
                    <input type="hidden" name="id_service" value ="{{$id_service}}">
                    <input type="hidden" name="prestataire_id" value ="{{$prestataire_id}}">
                    
                    <!-- Message d'alerte -->
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg mb-6">
                        <p class="font-semibold text-blue-700">Dernière étape!</p>
                        <p class="text-blue-600">Veuillez compléter vos informations pour finaliser votre réservation.</p>
                    </div>

                    <!-- Informations personnelles -->
                    <section class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Vos informations personnelles</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <!-- Ajoutez ici les champs pour les informations personnelles -->
                        </div>
                    </section>

                    <!-- Adresse de service -->
                    <section class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Adresse de service</h2>
                        <div class="mb-6">
                            <!-- Adresse complète -->
                            <label for="address" class="font-medium block mb-1">Adresse complète</label>
                            <input type="text" id="address" name="address" class="w-full border rounded-lg p-3" required>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <!-- Code postal -->
                            <div>
                                <label for="postal_code" class="font-medium block mb-1">Code postal</label>
                                <input type="number" id="postal_code" name="postal_code" class="w-full border rounded-lg p-3" required>
                            </div>
                            
                            <!-- Ville -->
                            <div>
                                <label for="city" class="font-medium block mb-1">Ville</label>
                                <input type="text" id="city" name="city" class="w-full border rounded-lg p-3" required>
                            </div>
                            
                            <!-- Pays -->
                            <div>
                                <label for="pays" class="font-medium block mb-1">Pays</label>
                                <input type="text" id="pays" name="pays" class="w-full border rounded-lg p-3" required>
                            </div>
                        </div>
                    </section>

                    <!-- Instructions supplémentaires -->
                    <section class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Instructions supplémentaires</h2>
                        <div class="mb-6">
                            <label for="instructions" class="font-medium block mb-1">Instructions pour le prestataire (optionnel)</label>
                            <textarea id="instructions" name="instructions" rows="4" class="w-full border rounded-lg p-3" 
                                      placeholder="Informations complémentaires, détails sur l'accès, etc."></textarea>
                        </div>
                    </section>

                  
                        
                      

                    <!-- Politique de confidentialité et conditions -->
                    <div class="mb-6">
                        <div class="flex items-start">
                            <input type="checkbox" id="terms" name="terms" class="mt-1" required>
                            <label for="terms" class="ml-2 text-sm text-gray-600">
                                J'accepte les <a href="#" class="text-blue-600">conditions générales</a> et la <a href="#" class="text-blue-600">politique de confidentialité</a>
                            </label>
                        </div>
                    </div>

                    <!-- Récapitulatif de la réservation -->
                    <section class="mb-8 bg-gray-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-4">Récapitulatif</h2>
                        
                        <div class="flex justify-between mb-3">
                            <span>{{$service->titre}}</span>
                            <span>{{$service->Prix}}€</span>
                        </div>
                        
                        <div class="border-t border-gray-300 my-3"></div>
                        
                        <div class="flex justify-between font-semibold text-lg">
                            <span>Total</span>
                            <span>{{$totalprix}}€</span>
                        </div>
                    </section>
                    
                    <!-- Bouton de soumission -->
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                        Confirmer et réserver
                    </button>
                </form>
            </div>
            
            <!-- Sidebar avec récapitulatif de la réservation pour desktop -->
            <div class="hidden lg:block w-80 flex-shrink-0">
                <div class="bg-gray-50 p-6 rounded-lg sticky top-6">
                    <h3 class="text-lg font-semibold mb-4">Récapitulatif</h3>
                    
                    <div class="mb-4">
                        <div class="flex items-center">
                            <img src="/storage/{{$service->Photo}}" alt="Service" class="w-16 h-16 object-cover rounded-lg">
                            <div class="ml-3">
                                <h4 class="font-medium">{{$service->titre}}</h4>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 my-4"></div>
                    
                    <div class="mb-3">
                        <span class="text-gray-600">Date:</span>
                        <span class="font-medium ml-1">{{$date_reservation}}</span>
                    </div>
                    
                    <div class="mb-3">
                        <span class="text-gray-600">Heure:</span>
                        <span class="font-medium ml-1">{{$reservation_time}}</span>
                    </div>
                    
                    <div class="border-t border-gray-200 my-4"></div>
                    
                    <div class="flex justify-between mb-3">
                        <span>Prix du service</span>
                        <span>{{$service->Prix}}€</span>
                    </div>
                    
                    <div class="border-t border-gray-200 my-3"></div>
                    
                    <div class="flex justify-between font-semibold text-lg">
                        <span>Total</span>
                        <span>{{$totalprix}}€</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
@endsection