@extends('layout.app')

@section('title', 'Confirmation de Réservation')
@section('content')

<!-- Hero Section - Confirmation -->
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 py-8 bg-white sm:py-16 md:py-20 lg:py-28 xl:py-32">
            <div class="pt-10 mx-auto max-w-7xl px-4 sm:pt-12 sm:px-6 md:pt-16 lg:pt-20 lg:px-8 xl:pt-28">
                <div class="text-center">
                    <div class="flex justify-center mb-6">
                        <div class="h-20 w-20 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-check-circle text-4xl text-green-500"></i>
                        </div>
                    </div>
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">Demande reçue !</span>
                        <span class="block text-indigo-600">Réservation en attente</span>
                    </h1>
                    <p class="mt-5 text-xl text-gray-500 mx-auto max-w-3xl">
                        Votre réservation est en cours de révision par notre prestataire. Vous recevrez une notification dès qu'elle sera confirmée.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Détails de la réservation -->
<div class="py-12 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Détails de votre réservation
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Service demandé
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$confirmation['TitreService']}}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Prestataire
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$confirmation['PrenomPrestataire']}} {{$confirmation['NomPrestataire']}}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Date et heure souhaitées
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$confirmation['reservation_date']}} à {{$confirmation['reservation_time']}}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Adresse
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$confirmation['address']}}, {{$confirmation['postal_code']}} {{$confirmation['city']}}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Statut
                        </dt>
                        <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                En attente de confirmation
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>

<!-- Section Prochaines étapes -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Prochaines étapes</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Que se passe-t-il maintenant ?
            </p>
        </div>

        <div class="mt-10">
            <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                <!-- Étape 1 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">1. Attente de confirmation</h3>
                    <p class="mt-2 text-base text-gray-500 text-center">
                        Le prestataire examine votre demande et vérifie sa disponibilité
                    </p>
                </div>

                <!-- Étape 2 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">2. Échange avec le prestataire</h3>
                    <p class="mt-2 text-base text-gray-500 text-center">
                        Vous pourrez communiquer via telephone ou par email pour préciser vos besoins
                    </p>
                </div>

                <!-- Étape 3 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">3. Réalisation du service</h3>
                    <p class="mt-2 text-base text-gray-500 text-center">
                        Le prestataire intervient à la date convenue pour réaliser la prestation
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Questions fréquentes</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Besoin d'aide ?
            </p>
        </div>

        <div class="mt-10 max-w-3xl mx-auto">
            <!-- Question 1 -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md mb-4">
                <div class="px-4 py-5 sm:px-6 cursor-pointer flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Combien de temps pour obtenir une confirmation ?
                    </h3>
                    <i class="fas fa-chevron-down text-gray-500"></i>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <p class="text-sm text-gray-500">
                        La plupart des prestataires répondent dans un délai de 24 à 48 heures. Vous recevrez une notification par email et sur votre compte dès que votre réservation sera confirmée.
                    </p>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md mb-4">
                <div class="px-4 py-5 sm:px-6 cursor-pointer flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Puis-je annuler ma réservation ?
                    </h3>
                    <i class="fas fa-chevron-down text-gray-500"></i>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <p class="text-sm text-gray-500">
                        Vous pouvez annuler votre réservation à tout moment avant la confirmation du prestataire sans frais. Après confirmation, veuillez consulter les conditions d'annulation spécifiques du prestataire.
                    </p>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 sm:px-6 cursor-pointer flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Comment contacter le prestataire ?
                    </h3>
                    <i class="fas fa-chevron-down text-gray-500"></i>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <p class="text-sm text-gray-500">
                        Une fois votre réservation confirmée, vous pourrez échanger avec le prestataire via notre messagerie sécurisée accessible depuis votre espace client.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-indigo-700">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Besoin d'un autre service ?</span>
            <span class="block text-indigo-200">Explorez notre catalogue de prestataires</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="/services" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                    Découvrir les services
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
                <a href="/client/overview" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600">
                    Mon tableau de bord
                </a>
            </div>
        </div>
    </div>
</div>
@endsection