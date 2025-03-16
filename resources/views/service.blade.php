@extends('layout.app')


@section('title', 'Service')


@section('content')
<main>
        <!-- Breadcrumb -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
            <nav class="mb-5">
                <ol class="flex text-sm">
                    <li class="flex items-center">
                        <a href="index.html" class="text-gray-500 hover:text-indigo-600">Accueil</a>
                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                    </li>
                    <li class="flex items-center">
                        <a href="services.html" class="text-gray-500 hover:text-indigo-600">Services</a>
                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                    </li>
                    <li class="flex items-center">
                        <a href="#" class="text-gray-500 hover:text-indigo-600">Développement Web</a>
                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                    </li>
                    <li class="text-gray-900 font-medium">Création de Site E-commerce Premium</li>
                </ol>
            </nav>
        </div>

        <!-- Service Header -->
        <div class="service-image-container" style="background-image: url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
            <div class="service-image-overlay">
                <div class="max-w-7xl mx-auto">
                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2.5 py-1 rounded-full">Développement Web</span>
                    <h1 class="text-3xl md:text-4xl font-bold mt-2">Création de Site E-commerce Premium</h1>
                    <div class="flex flex-wrap items-center gap-4 mt-4">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span>Paris, France</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-hashtag mr-2"></i>
                            <span>75001</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-2"></i>
                            <span>4.9</span>
                            <span class="text-gray-300 ml-1">(128 avis)</span>
                        </div>
                    </div>
                </div>
            </div>
            <span class="badge absolute top-4 right-4 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-1 rounded-full">Vérifiée</span>
        </div>

        <!-- Service Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Service Description -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h2 class="text-xl font-bold mb-4">Description du service</h2>
                        <p class="text-gray-600 mb-4">
                            Je vous propose une création complète et sur mesure de votre site e-commerce premium, comprenant une interface utilisateur intuitive, un back-office optimisé, et une expérience d'achat fluide pour vos clients.
                        </p>
                        <p class="text-gray-600 mb-4">
                            En tant que développeur web spécialisé dans le e-commerce depuis plus de 5 ans, j'accompagne les entrepreneurs et les entreprises dans la mise en place de leur boutique en ligne performante et professionnelle.
                        </p>
                        <p class="text-gray-600 mb-4">
                            Mon approche combine à la fois esthétique moderne, ergonomie optimale et performance technique pour vous garantir un site e-commerce qui convertit vos visiteurs en clients.
                        </p>

                        <h3 class="text-lg font-semibold mt-6 mb-3">Ce qui est inclus :</h3>
                        <ul class="space-y-2 text-gray-600 mb-4">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Design personnalisé et responsive (adapté à tous les appareils)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Configuration des méthodes de paiement (Stripe, PayPal, etc.)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Intégration des options de livraison et suivi de colis</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Optimisation SEO pour le référencement naturel</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Formation à l'utilisation du back-office (2 heures incluses)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Support technique pendant 1 mois après livraison</span>
                            </li>
                        </ul>

                        <h3 class="text-lg font-semibold mt-6 mb-3">Technologies utilisées :</h3>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">WordPress</span>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">WooCommerce</span>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">PHP</span>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">HTML/CSS</span>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">JavaScript</span>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">MySQL</span>
                        </div>

                        <h3 class="text-lg font-semibold mt-6 mb-3">Délai de livraison :</h3>
                        <p class="text-gray-600">
                            Entre 3 et 5 semaines selon la complexité du projet.
                        </p>
                    </div>

    

                    <!-- Reviews -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold">Avis clients</h2>
                            <div class="flex items-center">
                                <div class="flex text-yellow-400 mr-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-900">4.9</span>
                                <span class="text-sm text-gray-500 ml-1">(128)</span>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Review 1 -->
                            <div class="border-b border-gray-100 pb-6">
                                <div class="flex items-start">
                                    <img class="review-avatar rounded-full object-cover mr-4" 
                                         src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                         alt="Reviewer">
                                    <div class="flex-1">
                                        <div class="flex justify-between mb-1">
                                            <h4 class="text-base font-medium">Sophie Martin</h4>
                                            <span class="text-sm text-gray-500">Il y a 2 semaines</span>
                                        </div>
                                        <div class="flex text-yellow-400 text-sm mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p class="text-gray-600">
                                            Paul a créé un site e-commerce exceptionnel pour ma boutique de vêtements. Le design est moderne, l'interface est intuitive et les ventes ont augmenté de 40% depuis le lancement. Je recommande vivement ses services !
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Review 2 -->
                            <div class="border-b border-gray-100 pb-6">
                                <div class="flex items-start">
                                    <img class="review-avatar rounded-full object-cover mr-4" 
                                         src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                         alt="Reviewer">
                                    <div class="flex-1">
                                        <div class="flex justify-between mb-1">
                                            <h4 class="text-base font-medium">Thomas Dubois</h4>
                                            <span class="text-sm text-gray-500">Il y a 1 mois</span>
                                        </div>
                                        <div class="flex text-yellow-400 text-sm mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p class="text-gray-600">
                                            Excellent travail sur mon site e-commerce pour produits artisanaux. Paul a été à l'écoute de mes besoins spécifiques et a livré exactement ce que je cherchais. Le site est rapide, sécurisé et facile à utiliser.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Review 3 -->
                            <div>
                                <div class="flex items-start">
                                    <img class="review-avatar rounded-full object-cover mr-4" 
                                         src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                         alt="Reviewer">
                                    <div class="flex-1">
                                        <div class="flex justify-between mb-1">
                                            <h4 class="text-base font-medium">Alex Bernard</h4>
                                            <span class="text-sm text-gray-500">Il y a 2 mois</span>
                                        </div>
                                        <div class="flex text-yellow-400 text-sm mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p class="text-gray-600">
                                            Très satisfait du résultat final. Le site est bien optimisé et fonctionne parfaitement sur tous les appareils. Le seul petit bémol est le délai qui a été un peu plus long que prévu, mais la qualité du travail compense largement ce petit retard.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 text-center">
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Voir tous les 128 avis <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Booking Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6  top-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">À partir de 1299€</h3>
                            <span class="text-sm text-gray-500">Prix fixe</span>
                        </div>
                        
                        <p class="text-sm text-gray-600 mb-6">
                            Prix final selon les fonctionnalités requises et la complexité du projet.
                        </p>

                        <h4 class="font-medium text-gray-900 mb-2">Options disponibles :</h4>
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center justify-between">
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                    <span class="ml-2 text-sm text-gray-700">Multi-langues (+299€)</span>
                                </label>
                                <i class="fas fa-info-circle text-gray-400 hover:text-gray-600 cursor-pointer"></i>
                            </div>
                            <div class="flex items-center justify-between">
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                    <span class="ml-2 text-sm text-gray-700">Module de réservation (+199€)</span>
                                </label>
                                <i class="fas fa-info-circle text-gray-400 hover:text-gray-600 cursor-pointer"></i>
                            </div>
                            <div class="flex items-center justify-between">
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                    <span class="ml-2 text-sm text-gray-700">Maintenance mensuelle (+89€/mois)</span>
                                </label>
                                <i class="fas fa-info-circle text-gray-400 hover:text-gray-600 cursor-pointer"></i>
                            </div>
                        </div>

                        <div class="space-y-4 mb-6">
                            <button class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition-colors font-medium">
                                Réserver maintenant
                            </button>
                            <button class="w-full bg-white border border-indigo-600 text-indigo-600 py-3 rounded-lg hover:bg-indigo-50 transition-colors font-medium">
                                Contacter le prestataire
                            </button>
                        </div>

                        <div class="space-y-3 text-sm text-gray-600">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-check mr-2 text-gray-400"></i>
                                <span>98% de taux de satisfaction</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-2 text-gray-400"></i>
                                <span>Délai de réponse: < 24h</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-shield-alt mr-2 text-gray-400"></i>
                                <span>Paiement sécurisé</span>
                            </div>
                        </div>
                    </div>

                    <!-- Provider Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <div class="text-center">
                            <div class=" mx-auto w-20 h-20 mb-3">
                                <img class="w-full h-full rounded-full object-cover border-2 border-indigo-100" 
                                     src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1287&auto=format&fit=crop" 
                                     alt="Provider Profile">
                                <div class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 rounded-full border border-white"></div>
                            </div>
                            <h3 class="text-lg font-semibold">Paul Martin</h3>
                            <p class="text-sm text-gray-600 mb-2">Développeur Web</p>
                            <div class="flex justify-center mb-3">
                                <div class="flex text-yellow-400 text-xs">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">4.8 (58 avis)</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-4">
                                Spécialiste en développement web et e-commerce avec 5 ans d'expérience.
                            </p>
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                Voir le profil complet
                            </a>
                        </div>
                    </div>

                    <!-- Location Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h3 class="font-semibold text-gray-900 mb-3">Localisation</h3>
                        <div class="aspect-w-16 aspect-h-9 mb-4">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.142047342126!2d2.3354330156581374!3d48.87456857928921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e38f817b573%3A0x48d69c30470e7aeb!2sOp%C3%A9ra%20Garnier!5e0!3m2!1sfr!2sfr!4v1670265332664!5m2!1sfr!2sfr" 
                                class="w-full h-48 rounded-lg" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-2 text-gray-400"></i>
                                <span>12 Rue de la Paix, 75001 Paris, France</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-hashtag mr-2 text-gray-400"></i>
                                <span>Code postal: 75001</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-globe-europe mr-2 text-gray-400"></i>
                                <span>France</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-building mr-2 text-gray-400"></i>
                                <span>Paris</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium flex items-center">
                                <i class="fas fa-directions mr-2"></i>
                                <span>Itinéraire</span>
                            </a>
                        </div>
                    </div>

                    <!-- Availability Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="font-semibold text-gray-900 mb-3">Disponibilité</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center justify-between">
                                <span>Lundi - Vendredi</span>
                                <span>09:00 - 18:00</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Samedi</span>
                                <span>10:00 - 15:00</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Dimanche</span>
                                <span class="text-red-500">Fermé</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-900">Prochaine disponibilité</span>
                                <span class="text-sm text-green-600 font-medium">Demain</span>
                            </div>
                            <div class="flex space-x-2 mb-1">
                                <span class="inline-block text-xs py-1 px-2 bg-green-100 text-green-800 rounded">10:00</span>
                                <span class="inline-block text-xs py-1 px-2 bg-green-100 text-green-800 rounded">14:30</span>
                                <span class="inline-block text-xs py-1 px-2 bg-green-100 text-green-800 rounded">16:15</span>
                            </div>
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                Voir toutes les disponibilités
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Similar Services -->
            <div class="mt-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Services similaires</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Service 1 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <img class="h-48 w-full object-cover" 
                             src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&h=300&q=80" 
                             alt="Service">
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-1">
                                <div>
                                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-0.5 rounded-full">Développement Web</span>
                                </div>
                                <div class="flex text-yellow-400 text-xs">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 ml-1">4.7</span>
                                </div>
                            </div>
                            <h3 class="text-base font-medium text-gray-900 mt-2">Développement de Site Corporate</h3>
                            <div class="flex items-center text-sm text-gray-600 mt-1 mb-2">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                <span>Paris, 75002</span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-indigo-600 font-medium">À partir de 900€</span>
                                <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Service 2 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <img class="h-48 w-full object-cover" 
                             src="https://images.unsplash.com/photo-1540319585560-a4e19d7e8b23?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&h=300&q=80" 
                             alt="Service">
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-1">
                                <div>
                                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-0.5 rounded-full">E-commerce</span>
                                </div>
                                <div class="flex text-yellow-400 text-xs">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 ml-1">4.9</span>
                                </div>
                            </div>
                            <h3 class="text-base font-medium text-gray-900 mt-2">Optimisation SEO Pour E-commerce</h3>
                            <div class="flex items-center text-sm text-gray-600 mt-1 mb-2">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                <span>Lyon, 69001</span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-indigo-600 font-medium">À partir de 450€</span>
                                <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Service 3 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <img class="h-48 w-full object-cover" 
                             src="https://images.unsplash.com/photo-1563986768494-4dee09f4960a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&h=300&q=80" 
                             alt="Service">
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-1">
                                <div>
                                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-0.5 rounded-full">Développement Web</span>
                                </div>
                                <div class="flex text-yellow-400 text-xs">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 ml-1">4.8</span>
                                </div>
                            </div>
                            <h3 class="text-base font-medium text-gray-900 mt-2">Application Web Sur Mesure</h3>
                            <div class="flex items-center text-sm text-gray-600 mt-1 mb-2">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                <span>Paris, 75008</span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-indigo-600 font-medium">À partir de 1500€</span>
                                <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Service 4 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <img class="h-48 w-full object-cover" 
                             src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&h=300&q=80" 
                             alt="Service">
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-1">
                                <div>
                                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-0.5 rounded-full">E-commerce</span>
                                </div>
                                <div class="flex text-yellow-400 text-xs">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 ml-1">4.6</span>
                                </div>
                            </div>
                            <h3 class="text-base font-medium text-gray-900 mt-2">Refonte Site E-commerce</h3>
                            <div class="flex items-center text-sm text-gray-600 mt-1 mb-2">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                <span>Marseille, 13001</span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-indigo-600 font-medium">À partir de 950€</span>
                                <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection