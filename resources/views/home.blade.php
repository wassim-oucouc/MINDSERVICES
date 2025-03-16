@extends('layout.app')


@section('title', 'Home')
@section('content')

<!-- Hero Section -->
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <polygon points="50,0 100,0 50,100 0,100" />
            </svg>
            <div class="pt-10 mx-auto max-w-7xl px-4 sm:pt-12 sm:px-6 md:pt-16 lg:pt-20 lg:px-8 xl:pt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">Trouvez les meilleurs</span>
                        <span class="block text-indigo-600">services près de chez vous</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        MINDSERVICE connecte les clients avec des prestataires qualifiés pour tous vos besoins de services locaux. Simple, rapide et fiable.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="#services" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                Explorer les services
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="#how-it-works" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                Comment ça marche
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image représentant des professionnels de service">
    </div>
</div>

<!-- Section Comment ça marche -->
<div id="how-it-works" class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Processus</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Comment ça marche
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Quelques étapes simples pour trouver le service idéal
            </p>
        </div>

        <div class="mt-10">
            <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                <!-- Étape 1 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">1. Recherchez</h3>
                    <p class="mt-2 text-base text-gray-500 text-center">
                        Trouvez le service dont vous avez besoin parmi nos nombreuses catégories
                    </p>
                </div>

                <!-- Étape 2 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">2. Choisissez</h3>
                    <p class="mt-2 text-base text-gray-500 text-center">
                        Comparez les prestataires selon les avis, tarifs et disponibilités
                    </p>
                </div>

                <!-- Étape 3 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">3. Réservez</h3>
                    <p class="mt-2 text-base text-gray-500 text-center">
                        Planifiez votre rendez-vous et profitez d'un service de qualité
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Services Populaires -->
<div id="services" class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Découvrez</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Nos services populaires
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Des professionnels qualifiés pour tous vos besoins
            </p>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Service 1 -->
            <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gray-200 relative">
                    <img class="w-full h-full object-cover" src="/api/placeholder/400/250" alt="Plomberie">
                    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">Plomberie</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Résolution de problèmes de plomberie, installation et entretien
                    </p>
                    <div class="mt-4">
                        <a href="services.html" class="text-indigo-600 hover:text-indigo-500 font-medium">
                            Découvrir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gray-200 relative">
                    <img class="w-full h-full object-cover" src="/api/placeholder/400/250" alt="Électricité">
                    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">Électricité</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Installation électrique, dépannage et mise aux normes
                    </p>
                    <div class="mt-4">
                        <a href="services.html" class="text-indigo-600 hover:text-indigo-500 font-medium">
                            Découvrir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gray-200 relative">
                    <img class="w-full h-full object-cover" src="/api/placeholder/400/250" alt="Jardinage">
                    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">Jardinage</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Entretien de jardin, tonte de pelouse et taille de haies
                    </p>
                    <div class="mt-4">
                        <a href="services.html" class="text-indigo-600 hover:text-indigo-500 font-medium">
                            Découvrir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service 4 -->
            <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gray-200 relative">
                    <img class="w-full h-full object-cover" src="/api/placeholder/400/250" alt="Ménage">
                    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">Ménage</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Nettoyage régulier ou ponctuel de votre domicile
                    </p>
                    <div class="mt-4">
                        <a href="services.html" class="text-indigo-600 hover:text-indigo-500 font-medium">
                            Découvrir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service 5 -->
            <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gray-200 relative">
                    <img class="w-full h-full object-cover" src="/api/placeholder/400/250" alt="Rénovation">
                    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">Rénovation</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Travaux de peinture, carrelage et rénovation intérieure
                    </p>
                    <div class="mt-4">
                        <a href="services.html" class="text-indigo-600 hover:text-indigo-500 font-medium">
                            Découvrir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service 6 -->
            <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gray-200 relative">
                    <img class="w-full h-full object-cover" src="/api/placeholder/400/250" alt="Informatique">
                    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">Informatique</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Dépannage informatique et assistance technique
                    </p>
                    <div class="mt-4">
                        <a href="services.html" class="text-indigo-600 hover:text-indigo-500 font-medium">
                            Découvrir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="services.html" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Voir tous les services <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<!-- Section Témoignages -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Témoignages</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Ce que nos clients disent
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Découvrez l'expérience des utilisateurs de notre plateforme
            </p>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Témoignage 1 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400 flex">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span class="ml-2 text-gray-600">5.0</span>
                </div>
                <p class="text-gray-600 italic mb-4">
                    "J'ai trouvé un plombier qualifié en quelques minutes pour réparer une fuite urgente. Service rapide et efficace !"
                </p>
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-indigo-800 font-semibold">SL</span>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-gray-900">Sophie Laurent</h3>
                        <p class="text-sm text-gray-500">Paris</p>
                    </div>
                </div>
            </div>

            <!-- Témoignage 2 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400 flex">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="ml-2 text-gray-600">4.5</span>
                </div>
                <p class="text-gray-600 italic mb-4">
                    "Excellente expérience avec le jardinier que j'ai engagé. Professionnel, ponctuel et travail soigné. Je recommande !"
                </p>
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-indigo-800 font-semibold">MB</span>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-gray-900">Marc Bertrand</h3>
                        <p class="text-sm text-gray-500">Lyon</p>
                    </div>
                </div>
            </div>

            <!-- Témoignage 3 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400 flex">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <span class="ml-2 text-gray-600">4.0</span>
                </div>
                <p class="text-gray-600 italic mb-4">
                    "Interface très intuitive pour trouver un électricien. Tarifs transparents et prestation de qualité. Très satisfaite !"
                </p>
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-indigo-800 font-semibold">CL</span>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-gray-900">Claire Leclerc</h3>
                        <p class="text-sm text-gray-500">Bordeaux</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-indigo-700">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Prêt à trouver votre prestataire ?</span>
            <span class="block text-indigo-200">Inscrivez-vous gratuitement dès aujourd'hui.</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="client-register.html" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                    S'inscrire comme client
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
                <a href="professional-register.html" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600">
                    Devenir prestataire
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 