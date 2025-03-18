@extends('layout.app')

@section('title', 'Détail du service')
@section('content')

<!-- Section principale -->
<div class="bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Partie supérieure: catégorie clickable et titre -->
        <div class="mb-6">
            <a href="/categories/plomberie" class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800 hover:bg-indigo-200 transition-colors">
                <i class="fas fa-tag mr-2"></i> Plomberie
            </a>
            <h1 class="mt-4 text-3xl font-extrabold text-gray-900 sm:text-4xl md:text-5xl">Réparation de fuite d'eau</h1>
        </div>
        
        <!-- Contenu principal en deux colonnes -->
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <!-- Colonne gauche (2/3) -->
            <div class="lg:col-span-2">
                <!-- Image principale du service -->
                <div class="rounded-xl overflow-hidden shadow-lg mb-8">
                    <img src="/api/placeholder/800/450" alt="Réparation de fuite d'eau" class="w-full h-full object-cover">
                </div>
                
                <!-- Prix et informations essentielles -->
                <div class="bg-white rounded-xl p-6 shadow-md mb-8 border-l-4 border-indigo-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-semibold">Tarif horaire</p>
                            <p class="text-3xl font-bold text-gray-900">70€<span class="text-gray-500 text-xl font-normal">/heure</span></p>
                        </div>
                        <div class="flex flex-col items-end">
                            <div class="flex items-center mb-1">
                                <div class="flex text-yellow-400 mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-gray-700 font-medium">4.9</span>
                                <span class="text-gray-500 ml-1">(128 avis)</span>
                            </div>
                            <p class="text-green-600 font-medium">
                                <i class="fas fa-check-circle mr-1"></i> Disponible aujourd'hui
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Badges et garanties -->
                <div class="flex flex-wrap gap-3 mb-8">
                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-blue-50 text-blue-700">
                        <i class="fas fa-shield-alt mr-1.5"></i> Service garanti
                    </span>
                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-purple-50 text-purple-700">
                        <i class="fas fa-history mr-1.5"></i> Intervention rapide
                    </span>
                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-green-50 text-green-700">
                        <i class="fas fa-certificate mr-1.5"></i> Professionnel certifié
                    </span>
                </div>
                
                <!-- Description du service -->
                <div class="bg-white rounded-xl p-6 shadow-md mb-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Description du service</h2>
                    <div class="prose max-w-none text-gray-600">
                        <p>
                            Notre service de réparation de fuites d'eau intervient rapidement pour diagnostiquer et réparer tout type de fuite dans votre domicile. Nos plombiers certifiés disposent de l'équipement nécessaire pour détecter même les fuites les plus difficiles à repérer.
                        </p>
                        <p>
                            Nous intervenons pour les fuites visibles (robinets, éviers, douches, toilettes) ainsi que pour les fuites cachées (canalisations encastrées, tuyaux souterrains). Notre expertise nous permet de minimiser les dégâts et de réaliser les réparations avec un minimum d'impact sur votre intérieur.
                        </p>
                    </div>
                    
                    <!-- Ce qui est inclus -->
                    <h3 class="text-lg font-bold text-gray-900 mt-6 mb-3">Ce qui est inclus</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Déplacement du plombier à votre domicile</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Diagnostic complet pour identifier l'origine de la fuite</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Réparation de la fuite (remplacement de joints, soudure, etc.)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Vérification du bon fonctionnement après réparation</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Garantie de 6 mois sur les travaux effectués</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Galerie photos -->
                <div class="bg-white rounded-xl p-6 shadow-md mb-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Galerie photos</h2>
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                        <img src="/api/placeholder/300/200" alt="Travail de plomberie 1" class="rounded-lg shadow-sm hover:opacity-90 transition-opacity cursor-pointer">
                        <img src="/api/placeholder/300/200" alt="Travail de plomberie 2" class="rounded-lg shadow-sm hover:opacity-90 transition-opacity cursor-pointer">
                        <img src="/api/placeholder/300/200" alt="Travail de plomberie 3" class="rounded-lg shadow-sm hover:opacity-90 transition-opacity cursor-pointer">
                    </div>
                </div>
                
                <!-- Avis clients -->
                <div class="bg-white rounded-xl p-6 shadow-md">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Avis clients</h2>
                        <a href="#all-reviews" class="text-indigo-600 hover:text-indigo-700 font-medium">Voir tous les avis</a>
                    </div>
                    
                    <!-- Liste des avis (3 maximum) -->
                    <div class="space-y-6">
                        <!-- Avis 1 -->
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                        <span class="text-indigo-800 font-semibold">JP</span>
                                    </div>
                                </div>
                                <div class="ml-3 flex-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium text-gray-900">Jean-Pierre Dubois</h3>
                                        <p class="text-sm text-gray-500">Il y a 2 jours</p>
                                    </div>
                                    <div class="flex text-yellow-400 mt-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-600">
                                        <p>Excellent service ! J'ai appelé pour une fuite urgente sous mon évier, le plombier est intervenu dans l'heure. Très professionnel, il a identifié rapidement le problème et l'a réparé efficacement. Prix raisonnable et travail soigné.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Avis 2 -->
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                        <span class="text-indigo-800 font-semibold">SM</span>
                                    </div>
                                </div>
                                <div class="ml-3 flex-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium text-gray-900">Sophie Martin</h3>
                                        <p class="text-sm text-gray-500">Il y a 1 semaine</p>
                                    </div>
                                    <div class="flex text-yellow-400 mt-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-600">
                                        <p>Très bon service, plombier compétent qui a su détecter une fuite cachée dans ma salle de bain. Intervention propre et efficace. Seul petit bémol, le prix un peu élevé.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Colonne droite (1/3) - Profil du prestataire et réservation -->
            <div class="mt-10 lg:mt-0">
                <!-- Carte prestataire -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-6">
                    <!-- Header prestataire -->
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 px-6 py-4 text-white">
                        <h3 class="text-lg font-medium">Prestataire du service</h3>
                    </div>
                    
                    <!-- Informations prestataire -->
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="h-16 w-16 rounded-full overflow-hidden border-2 border-indigo-100">
                                <img src="/api/placeholder/64/64" alt="Martin Dupont" class="h-full w-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Martin Dupont</h4>
                                <p class="text-gray-600">Plombier certifié</p>
                                <div class="flex text-yellow-400 mt-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="ml-2 text-gray-600 text-xs">4.9</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Localisation -->
                        <div class="mt-6 flex items-center text-gray-700">
                            <i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i>
                            <span>Paris, 75011</span>
                        </div>
                        
                        <!-- Vérifications -->
                        <div class="mt-4 space-y-2">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 w-5"></i>
                                <span class="ml-2 text-sm text-gray-600">Identité vérifiée</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-certificate text-green-500 w-5"></i>
                                <span class="ml-2 text-sm text-gray-600">Certifications validées</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-thumbs-up text-green-500 w-5"></i>
                                <span class="ml-2 text-sm text-gray-600">98% de clients satisfaits</span>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="/prestataires/martin-dupont" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">
                                Voir le profil complet
                            </a>
                        </div>
                    </div>
                    
                    <!-- Section Réservation -->
                    <div class="p-6 bg-gray-50 border-t border-gray-100">
                        <a href="/reservation/plomberie/123" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-calendar-check mr-2"></i> Réserver maintenant
                        </a>
                        
                        <p class="text-xs text-gray-500 mt-2 text-center">
                            Réservation gratuite, paiement après service
                        </p>
                    </div>
                    
                    <!-- Partage -->
                    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-center space-x-4">
                        <button class="inline-flex items-center text-gray-700 hover:text-indigo-600">
                            <i class="far fa-heart mr-1"></i> Favoris
                        </button>
                        <span class="text-gray-300">|</span>
                        <button class="inline-flex items-center text-gray-700 hover:text-indigo-600">
                            <i class="fas fa-share-alt mr-1"></i> Partager
                        </button>
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