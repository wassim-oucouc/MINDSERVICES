@extends('layout.app')

@section('title', 'Réservation de service')
@section('content')
<!-- Header avec fond pro -->
<div class="relative bg-cover bg-center" style="background-image: url('/api/placeholder/1600/400')">
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-900 to-indigo-700 opacity-90"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- En-tête avec étapes -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white">Finalisez votre réservation</h1>
                <p class="mt-2 text-indigo-100">Quelques dernières informations pour confirmer votre demande</p>
            </div>
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
        
        <!-- Détails du service en cours de réservation -->
        <div class="mt-8 bg-white bg-opacity-10 rounded-xl p-6 backdrop-filter backdrop-blur-sm">
            <div class="flex flex-col md:flex-row items-start">
                <div class="flex-shrink-0 mb-4 md:mb-0">
                    <img src="/api/placeholder/150/150" alt="Réparation de fuite" class="w-20 h-20 object-cover rounded-lg">
                </div>
                <div class="md:ml-4 flex-grow">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                        <div>
                            <h2 class="text-xl font-bold text-white">Réparation de fuite d'eau</h2>
                            <p class="text-indigo-100">Plomberie</p>
                        </div>
                        <div class="mt-2 md:mt-0">
                            <div class="flex items-center">
                                <div class="flex text-yellow-300 mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-white font-medium">4.9</span>
                                <span class="text-indigo-200 ml-1">(128 avis)</span>
                            </div>
                            <p class="text-white font-bold text-xl mt-1">70€<span class="text-indigo-200 text-base font-normal">/heure</span></p>
                        </div>
                    </div>
                    <div class="flex items-center mt-2">
                        <div class="h-8 w-8 rounded-full overflow-hidden bg-indigo-100 flex-shrink-0">
                            <img src="/api/placeholder/32/32" alt="Martin Dupont" class="h-full w-full object-cover">
                        </div>
                        <div class="ml-2">
                            <p class="text-white">Martin Dupont</p>
                            <p class="text-indigo-200 text-sm">Plombier certifié</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contenu principal -->
<div class="bg-gray-50 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <!-- Formulaire de réservation (gauche) -->
            <div class="lg:col-span-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- En-tête du formulaire -->
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-900">Informations de réservation</h2>
                    </div>
                    
                    <!-- Formulaire -->
                    <form action="/reservation/submit" method="post" class="px-6 py-6">
                        @csrf
                        <input type="hidden" name="service_id" value="123">
                        <input type="hidden" name="provider_id" value="456">
                        
                        <!-- Étape 1: Date et heure -->
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-indigo-600 text-white text-sm mr-2">1</span>
                                Choisissez une date et une heure
                            </h3>
                            
                            <!-- Sélection de date -->
                            <div class="mb-6">
                                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date souhaitée*</label>
                                
                                <!-- Calendrier interactif -->
                                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <button type="button" class="text-indigo-600 hover:text-indigo-500">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <h4 class="text-base font-medium text-gray-900">Mars 2025</h4>
                                        <button type="button" class="text-indigo-600 hover:text-indigo-500">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                    
                                    <div class="grid grid-cols-7 gap-2 mb-2">
                                        <div class="text-center text-xs text-gray-500 font-medium">Lu</div>
                                        <div class="text-center text-xs text-gray-500 font-medium">Ma</div>
                                        <div class="text-center text-xs text-gray-500 font-medium">Me</div>
                                        <div class="text-center text-xs text-gray-500 font-medium">Je</div>
                                        <div class="text-center text-xs text-gray-500 font-medium">Ve</div>
                                        <div class="text-center text-xs text-gray-500 font-medium">Sa</div>
                                        <div class="text-center text-xs text-gray-500 font-medium">Di</div>
                                        
                                        <!-- Jours du mois -->
                                        <div class="opacity-50 text-center py-2 text-sm">28</div>
                                        <div class="opacity-50 text-center py-2 text-sm">29</div>
                                        <div class="opacity-50 text-center py-2 text-sm">30</div>
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">1</div>
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">2</div>
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">3</div>
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">4</div>
                                        
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">5</div>
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">6</div>
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">7</div>
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">8</div>
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">9</div>
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded bg-indigo-600 text-white font-medium">10</div>
                                        <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">11</div>
                                    </div>
                                    
                                    <input type="hidden" id="date" name="date" value="2025-03-10">
                                    <p class="text-sm text-gray-500 mt-2">Date sélectionnée: <strong>10 mars 2025</strong></p>
                                </div>
                            </div>
                            
                            <!-- Sélection de l'heure -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Heure souhaitée*</label>
                                <div class="grid grid-cols-4 gap-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8">
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded opacity-50">8:00</div>
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded opacity-50">9:00</div>
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">10:00</div>
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">11:00</div>
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">12:00</div>
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">13:00</div>
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded bg-indigo-600 text-white font-medium">14:00</div>
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">15:00</div>
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">16:00</div>
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">17:00</div>
                                    <div class="text-center py-2 text-sm border border-gray-200 rounded hover:bg-gray-50 cursor-pointer transition-colors">18:00</div>
                                </div>
                                <input type="hidden" id="time" name="time" value="14:00">
                            </div>
                        </div>
                        
                        <!-- Étape 2: Adresse d'intervention -->
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-indigo-600 text-white text-sm mr-2">2</span>
                                Adresse d'intervention
                            </h3>
                            
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Adresse complète*</label>
                                    <input type="text" id="address" name="address" placeholder="Numéro et nom de la rue" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                
                                <div>
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Code postal*</label>
                                    <input type="text" id="postal_code" name="postal_code" placeholder="75011" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Ville*</label>
                                    <input type="text" id="city" name="city" placeholder="Paris" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                
                                <div class="sm:col-span-2">
                                    <label for="additional_info" class="block text-sm font-medium text-gray-700 mb-1">Complément d'adresse</label>
                                    <input type="text" id="additional_info" name="additional_info" placeholder="Étage, code d'entrée, digicode, etc." class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                
                                <div class="sm:col-span-2">
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone mobile*</label>
                                    <input type="tel" id="phone" name="phone" placeholder="06 12 34 56 78" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <p class="mt-1 text-xs text-gray-500">Nécessaire pour que le prestataire puisse vous contacter</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Étape 3: Détails de l'intervention -->
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-indigo-600 text-white text-sm mr-2">3</span>
                                Détails du problème
                            </h3>
                            
                            <div>
                                <label for="problem_description" class="block text-sm font-medium text-gray-700 mb-1">Description du problème*</label>
                                <textarea id="problem_description" name="problem_description" rows="4" placeholder="Décrivez votre problème de fuite en détail pour aider le plombier à préparer son intervention (localisation, symptômes, urgence, etc.)..." class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                            </div>
                            
                            <!-- Photos optionnelles -->
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Photos (optionnel)</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-indigo-500 transition-colors">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                                <span>Télécharger des fichiers</span>
                                                <input id="file-upload" name="photos[]" type="file" class="sr-only" multiple accept="image/*">
                                            </label>
                                            <p class="pl-1">ou glisser-déposer</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF jusqu'à 5 Mo
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Étape 4: Options de paiement -->
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-indigo-600 text-white text-sm mr-2">4</span>
                                Mode de paiement
                            </h3>
                            
                            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                                <div class="space-y-4">
                                    <div class="relative flex items-center">
                                        <input id="payment-card" name="payment_method" type="radio" checked class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                        <label for="payment-card" class="ml-3 flex flex-grow items-center">
                                            <span class="block text-sm font-medium text-gray-700">Carte bancaire</span>
                                            <span class="ml-auto flex">
                                                <img src="/api/placeholder/30/20" alt="Visa" class="h-5 mx-1">
                                                <img src="/api/placeholder/30/20" alt="Mastercard" class="h-5 mx-1">
                                                <img src="/api/placeholder/30/20" alt="CB" class="h-5 mx-1">
                                            </span>
                                        </label>
                                    </div>
                                    
                                    <div class="relative flex items-center">
                                        <input id="payment-paypal" name="payment_method" type="radio" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                        <label for="payment-paypal" class="ml-3 flex flex-grow items-center">
                                            <span class="block text-sm font-medium text-gray-700">PayPal</span>
                                            <span class="ml-auto">
                                                <img src="/api/placeholder/60/25" alt="PayPal" class="h-5">
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="mt-4 bg-gray-50 p-4 rounded-md">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-info-circle text-indigo-500 mt-0.5"></i>
                                        </div>
                                        <div class="ml-3 text-sm text-gray-500">
                                            <p>Votre carte ne sera débitée qu'une fois le service effectué et validé par vos soins. Une préautorisation du montant estimé sera effectuée lors de la confirmation de réservation.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Conditions générales -->
                        <div class="mb-8">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="font-medium text-gray-700">J'accepte les conditions générales</label>
                                    <p class="text-gray-500">En cochant cette case, vous acceptez les <a href="#" class="text-indigo-600 hover:text-indigo-500">conditions générales d'utilisation</a> et notre <a href="#" class="text-indigo-600 hover:text-indigo-500">politique de confidentialité</a>.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Bouton de soumission -->
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-lg text-base font-medium rounded-md text-white bg-gradient-to-r from-indigo-600 to-indigo-800 hover:from-indigo-700 hover:to-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                                Confirmer la réservation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Résumé de la commande (droite) -->
            <div class="mt-10 lg:mt-0 lg:col-span-4">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-6">
                    <!-- En-tête du résumé -->
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 px-6 py-4 text-white">
                        <h3 class="text-lg font-medium">Résumé de la réservation</h3>
                    </div>
                    
                    <!-- Détails du service -->
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="h-16 w-16 flex-shrink-0 bg-gray-200 rounded-md overflow-hidden">
                                <img src="/api/placeholder/64/64" alt="Réparation de fuite" class="h-full w-full object-cover">
                            </div>
                            <div class="ml-4 flex-1">
                                <h4 class="text-lg font-medium text-gray-900">Réparation de fuite d'eau</h4>
                                <p class="text-gray-500">Plomberie</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informations du prestataire -->
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Prestataire</h4>
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full overflow-hidden bg-gray-200">
                                <img src="/api/placeholder/32/32" alt="Martin Dupont" class="h-full w-full object-cover">
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Martin Dupont</p>
                                <div class="flex text-yellow-400 mt-1">
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star text-xs"></i>
                                    <i class="fas fa-star-half-alt text-xs"></i>
                                    <span class="ml-1 text-gray-500 text-xs">4.9 (128 avis)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Date et heure -->
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Date et Heure</h4>
                        <p class="text-gray-900 flex items-center">
                            <i class="far fa-calendar-alt text-indigo-500 mr-2"></i>
                            Lundi 10 mars 2025
                        </p>
                        <p class="text-gray-900 flex items-center mt-1">
                            <i class="far fa-clock text-indigo-500 mr-2"></i>
                            14:00
                        </p>
                    </div>
                    
                    <!-- Estimation des coûts -->
                    <div class="px-6 py-4">
                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Estimation des coûts</h4>
                        
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Tarif horaire</span>
                                <span class="text-gray-900 font-medium">70€</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Frais de déplacement</span>
                                <span class="text-gray-900 font-medium">15€</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Frais de service</span>
                                <span class="text-gray-900 font-medium">10€</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Durée estimée</span>
                                <span class="text-gray-900 font-medium">1-2 heures</span>
                            </div>
                            <div class="pt-4 mt-2 border-t border-gray-200 flex justify-between">
                                <span class="text-gray-900 font-medium">Total estimé</span>
                                <span class="text-indigo-600 font-bold">95€ - 165€</span>
                            </div>
                        </div>
                        
                        <div class="mt-4 text-xs text-gray-500">
                            <p>* Le montant final sera calculé en fonction de la durée réelle de l'intervention et des pièces nécessaires.</p>
                        </div>
                    </div>
                    
                    <!-- Garantie -->
                    <div class="px-6 py-4 bg-indigo-50 border-t border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-100 rounded-full p-2">
                                <i class="fas fa-shield-alt text-indigo-600"></i>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-900">Garantie MINDSERVICE</h4>
                                <p class="text-xs text-gray-600">Service garanti ou remboursé. Paiement sécurisé.</p>
                            </div>
                        </div>
                    </div>
                </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection