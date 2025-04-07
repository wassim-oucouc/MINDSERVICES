@extends('layout.app')

@section('title', 'Réservation du service')
@section('content')

<!-- Section principale de réservation -->
<div class="bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Navigation retour -->
        <div class="mb-6">
            <a href="javascript:history.back()" class="inline-flex items-center text-gray-700 hover:text-indigo-600">
                <i class="fas fa-chevron-left mr-2"></i> Retour au service
            </a>
            <h1 class="mt-4 text-3xl font-extrabold text-gray-900 sm:text-4xl">Réservation du service</h1>
        </div>
        
        <!-- Alerte "Service populaire" -->
        <div class="bg-indigo-50 border-l-4 border-indigo-500 p-4 rounded-lg mb-8">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-indigo-600"></i>
                </div>
                <div class="ml-3">
                    <p class="font-semibold text-indigo-700">C'est un service très demandé.</p>
                    <p class="text-indigo-600">Les créneaux pour ce service se remplissent rapidement.</p>
                </div>
            </div>
        </div>

        <!-- Contenu principal en deux colonnes -->
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <!-- Colonne gauche (2/3) -->
            <div class="lg:col-span-2">
               <!-- Section date -->
<div class="bg-white rounded-xl p-6 shadow-md mb-8">
    <h2 class="text-xl font-bold text-gray-900 mb-6">
        <i class="far fa-calendar-alt text-indigo-600 mr-2"></i>
        Choisissez une date
    </h2>
    
    <!-- Navigation du mois (statique) -->
    <div class="flex items-center justify-between mb-4">
        <button class="p-2 rounded-full hover:bg-gray-100 text-gray-600">
            <i class="fas fa-chevron-left"></i>
        </button>
        <h3 class="text-lg font-medium text-gray-900">Avril 2025</h3>
        <button class="p-2 rounded-full hover:bg-gray-100 text-gray-600">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    
    <!-- Calendrier amélioré -->
    <div class="mb-6">
        <div class="grid grid-cols-7 gap-1 text-center mb-2">
            <div class="text-gray-500 font-medium text-sm py-2">Lun</div>
            <div class="text-gray-500 font-medium text-sm py-2">Mar</div>
            <div class="text-gray-500 font-medium text-sm py-2">Mer</div>
            <div class="text-gray-500 font-medium text-sm py-2">Jeu</div>
            <div class="text-gray-500 font-medium text-sm py-2">Ven</div>
            <div class="text-gray-500 font-medium text-sm py-2">Sam</div>
            <div class="text-gray-500 font-medium text-sm py-2">Dim</div>
        </div>

        <!-- Jours du mois -->
        <div class="grid grid-cols-7 gap-1 text-center">
            <!-- Jours précédents (disabled) -->
            <div class="py-3 text-gray-300">30</div>
            <div class="py-3 text-gray-300">31</div>
            
            <!-- Jours actuels (avec des boutons pour les dates disponibles) -->
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">1</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">2</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">3</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">4</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">5</button>
            <div class="py-3 border border-gray-100 bg-gray-50 text-gray-400 rounded-md">6</div>
            <div class="py-3 border border-gray-100 bg-gray-50 text-gray-400 rounded-md">7</div>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">8</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">9</button>
            <button class="py-3 border-2 border-indigo-500 bg-indigo-100 text-indigo-700 font-medium rounded-md cursor-pointer">10</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">11</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">12</button>
            <div class="py-3 border border-gray-100 bg-gray-50 text-gray-400 rounded-md">13</div>
            <div class="py-3 border border-gray-100 bg-gray-50 text-gray-400 rounded-md">14</div>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">15</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">16</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">17</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">18</button>
            <button class="py-3 border border-gray-200 rounded-md hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">19</button>
            <div class="py-3 border border-gray-100 bg-gray-50 text-gray-400 rounded-md">20</div>
            <div class="py-3 border border-gray-100 bg-gray-50 text-gray-400 rounded-md">21</div>
        </div>
    </div>
    
    <p class="text-gray-700 font-medium flex items-center">
        <i class="fas fa-check-circle text-green-500 mr-2"></i>
        Date sélectionnée: <span class="font-bold text-indigo-700 ml-2">Mardi 10 Avril 2025</span>
    </p>
</div>

<!-- Section heure -->
<div class="bg-white rounded-xl p-6 shadow-md mb-8">
    <h2 class="text-xl font-bold text-gray-900 mb-6">
        <i class="far fa-clock text-indigo-600 mr-2"></i>
        Choisissez une heure
    </h2>
    
    <!-- Créneaux horaires avec design amélioré -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mb-6">
        <!-- Créneau indisponible avec info bulle -->
        <div class="relative group">
            <div class="py-3 px-2 border border-gray-200 rounded-md text-center text-gray-400 bg-gray-50 cursor-not-allowed">
                08:00
                <span class="absolute left-0 bottom-full mb-2 w-28 bg-gray-800 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    Indisponible
                </span>
            </div>
        </div>
        
        <button class="py-3 px-2 border border-gray-200 rounded-md text-center text-gray-700 hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">09:00</button>
        <button class="py-3 px-2 border border-gray-200 rounded-md text-center text-gray-700 hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">10:00</button>
        <button class="py-3 px-2 border border-gray-200 rounded-md text-center text-gray-700 hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">11:00</button>
        
        <!-- Créneau sélectionné -->
        <button class="py-3 px-2 border-2 border-indigo-500 rounded-md text-center bg-indigo-100 text-indigo-700 font-medium cursor-pointer">14:00</button>
        
        <button class="py-3 px-2 border border-gray-200 rounded-md text-center text-gray-700 hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">15:00</button>
        <button class="py-3 px-2 border border-gray-200 rounded-md text-center text-gray-700 hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">16:00</button>
        <button class="py-3 px-2 border border-gray-200 rounded-md text-center text-gray-700 hover:border-indigo-400 hover:bg-indigo-50 transition-colors cursor-pointer">17:00</button>
    </div>
    
    <p class="text-gray-700 font-medium flex items-center">
        <i class="fas fa-check-circle text-green-500 mr-2"></i>
        Heure sélectionnée: <span class="font-bold text-indigo-700 ml-2">14:00</span>
    </p>
</div>
                
                <!-- Bouton Continuer -->
                <div class="flex justify-end">
                    <button class="w-full sm:w-auto py-3 px-6 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm flex items-center justify-center transition-colors">
                        Continuer vers l'inscription
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
            
            <!-- Colonne droite (1/3) - Récapitulatif du service -->
            <div class="mt-10 lg:mt-0">
                <div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-6">
                    <!-- Header récapitulatif -->
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 px-6 py-4 text-white">
                        <h3 class="text-lg font-medium">Récapitulatif de la réservation</h3>
                    </div>
                    
                    <!-- Détails du service -->
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="h-16 w-16 rounded-lg overflow-hidden">
                                <img src="/api/placeholder/120/120" alt="Service de plomberie" class="h-full w-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Réparation de fuite d'eau</h4>
                                <p class="text-gray-600">Service de plomberie</p>
                                <div class="flex text-yellow-400 mt-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="ml-2 text-gray-600 text-xs">4.9 (128 avis)</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Détails prestataire -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h5 class="font-medium text-gray-900 mb-2">Prestataire</h5>
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full overflow-hidden">
                                    <img src="/api/placeholder/60/60" alt="Prestataire" class="h-full w-full object-cover">
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">Martin Durand</p>
                                    <p class="text-sm text-gray-600">Plombier certifié</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Détails date et heure -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h5 class="font-medium text-gray-900 mb-3">Votre réservation</h5>
                            
                            <div class="flex items-start mb-3">
                                <i class="far fa-calendar-alt text-indigo-600 mt-1 w-5"></i>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-800">Mardi 10 Avril 2025</p>
                                    <p class="text-sm text-gray-600">À 14:00</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start mb-3">
                                <i class="fas fa-map-marker-alt text-indigo-600 mt-1 w-5"></i>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-800">À votre adresse</p>
                                    <p class="text-sm text-gray-600">À préciser lors de la réservation</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="far fa-clock text-indigo-600 mt-1 w-5"></i>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-800">Durée estimée: 2 heures</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tarifs -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h5 class="font-medium text-gray-900 mb-3">Tarifs</h5>
                            
                            <div class="flex justify-between mb-2">
                                <p class="text-gray-600">Tarif horaire</p>
                                <p class="font-medium">80€ / heure</p>
                            </div>
                            
                            <div class="flex justify-between mb-2">
                                <p class="text-gray-600">Durée estimée</p>
                                <p class="font-medium">2 heures</p>
                            </div>
                            
                            <div class="flex justify-between mb-2">
                                <p class="text-gray-600">Frais de déplacement</p>
                                <p class="font-medium">Inclus</p>
                            </div>
                            
                            <div class="flex justify-between pt-2 mt-2 border-t border-gray-200">
                                <p class="font-bold text-gray-800">Total estimé</p>
                                <p class="font-bold text-gray-800">160€</p>
                            </div>
                            
                            <p class="text-xs text-gray-500 mt-2">Le montant final peut varier en fonction de la durée réelle du service.</p>
                        </div>
                    </div>
                    
                    <!-- Garantie -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-shield-alt text-indigo-600 mr-2"></i>
                            <p class="text-sm">Service garanti par MINDSERVICE</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section des instructions -->
<div class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-bold mb-8 text-center">Comment fonctionne la réservation ?</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Étape 1 -->
            <div class="text-center">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto mb-4 text-2xl">
                    1
                </div>
                <h3 class="text-xl font-medium mb-2">Réservez</h3>
                <p class="text-gray-300">
                    Choisissez une date et une heure qui vous conviennent et indiquez votre adresse.
                </p>
            </div>
            
            <!-- Étape 2 -->
            <div class="text-center">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto mb-4 text-2xl">
                    2
                </div>
                <h3 class="text-xl font-medium mb-2">Confirmation</h3>
                <p class="text-gray-300">
                    Le prestataire confirme votre rendez-vous sous 30 minutes en moyenne.
                </p>
            </div>
            
            <!-- Étape 3 -->
            <div class="text-center">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto mb-4 text-2xl">
                    3
                </div>
                <h3 class="text-xl font-medium mb-2">Service & Paiement</h3>
                <p class="text-gray-300">
                    Le service est réalisé et vous payez en ligne de façon sécurisée après la prestation.
                </p>
            </div>
        </div>
        
        <div class="mt-10 text-center">
            <p class="text-gray-400 max-w-3xl mx-auto">
                Tous les services réservés via MINDSERVICE sont garantis. Si vous n'êtes pas satisfait, notre équipe interviendra pour résoudre le problème ou vous proposer un remboursement selon nos conditions de service.
            </p>
        </div>
    </div>
</div>
@endsection