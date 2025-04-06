@extends('layout.client')

@section('title', 'Mon Profil')

@section('mon-profil', 'flex items-center px-2 py-2 text-sm font-medium rounded-md bg-indigo-50 text-indigo-600')

@section('content')
<!-- CONTENU PRINCIPAL -->
<div class="flex-1 overflow-auto pt-16 md:pt-0 md:ml-0">
    <div class="shadow-lg">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center">
                    <h1 class="text-2xl font-semibold text-gray-900">Mon Profil</h1>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        <i class="fas fa-edit mr-2"></i> Modifier le profil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Colonne de gauche: Informations principales -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Informations personnelles -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Informations personnelles</h2>
                        <div class="flex flex-col md:flex-row md:items-start">
                            <div class="flex-shrink-0 h-32 w-32 rounded-full bg-indigo-100 flex items-center justify-center shadow overflow-hidden mb-4 md:mb-0 md:mr-6">
                                <img src="/storage/{{$client->Photo}}" alt="Photo de profil" class="h-full w-full object-cover">
                            </div>
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Nom complet</h3>
                                    <p class="text-base font-medium text-gray-900">{{$client->Prenom}} {{$client->Nom}}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Email</h3>
                                    <p class="text-base text-gray-900">{{$client->Email}}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Numero Telephone</h3>
                                    <p class="text-base text-gray-900">{{$client->telephone}}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Pays</h3>
                                    <p class="text-base text-gray-900">{{$client->pays}}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Date d'inscription</h3>
                                    <p class="text-base text-gray-900">{{$client->created_at}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Notifications</h3>
                                    <div class="flex items-center mt-2">
                                        <input id="email-notif" name="email-notif" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="email-notif" class="ml-2 block text-sm text-gray-900">Notifications par email</label>
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <input id="sms-notif" name="sms-notif" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="sms-notif" class="ml-2 block text-sm text-gray-900">Notifications par SMS</label>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Préférences de contact</h3>
                                    <div class="flex items-center mt-2">
                                        <input id="matin" name="contact-pref" type="radio" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                        <label for="matin" class="ml-2 block text-sm text-gray-900">Matin (8h-12h)</label>
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <input id="apres-midi" name="contact-pref" type="radio" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                        <label for="apres-midi" class="ml-2 block text-sm text-gray-900">Après-midi (13h-18h)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Historique des réservations -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-900">Historique des réservations</h2>
                            <a href="/client/reservation" class="text-indigo-600 hover:text-indigo-500 text-sm font-medium">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestataire</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($reservations as $value)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{$value->CategorieNom}}</div>
                                                <div class="text-sm text-gray-500">{{$value->titre}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{$value->reservation_date}}</div>
                                                <div class="text-sm text-gray-500">{{$value->reservation_time}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{$value->Prenom}} {{$value->Nom}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($value->status == 'En attente')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                En attente
                                                </span>
                                                @elseif($value->status == 'Confirmée')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Confirmée
                                                </span>
                                                @elseif($value->status == 'Terminée')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                Terminée
                                                </span>
                                                @elseif($value->status == 'Annulée')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Annulée
                                                </span>
                                                @elseif($value->status == 'En cours')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                En cours
                                                </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="/client/reservation/details/{{$value->id}}" class="text-indigo-600 hover:text-indigo-900">Détails</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne de droite: Services favoris -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Services favoris -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Mes services favoris</h2>
                        <div class="space-y-4">
                            <!-- Service favori 1 -->
                            <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-indigo-300 transition-colors duration-200">
                                <div class="flex-shrink-0 h-12 w-12 rounded-lg bg-indigo-100 flex items-center justify-center">
                                    <i class="fas fa-broom text-indigo-600 text-lg"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="text-sm font-medium text-gray-900">Ménage à Domicile</h3>
                                    <p class="text-xs text-gray-500">à partir de 25€/h</p>
                                </div>
                                <button class="text-red-500 hover:text-red-700 ml-2">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>

                            <!-- Service favori 2 -->
                            <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-indigo-300 transition-colors duration-200">
                                <div class="flex-shrink-0 h-12 w-12 rounded-lg bg-indigo-100 flex items-center justify-center">
                                    <i class="fas fa-wrench text-indigo-600 text-lg"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="text-sm font-medium text-gray-900">Plomberie</h3>
                                    <p class="text-xs text-gray-500">à partir de 45€/h</p>
                                </div>
                                <button class="text-red-500 hover:text-red-700 ml-2">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>

                            <!-- Service favori 3 -->
                            <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-indigo-300 transition-colors duration-200">
                                <div class="flex-shrink-0 h-12 w-12 rounded-lg bg-indigo-100 flex items-center justify-center">
                                    <i class="fas fa-laptop text-indigo-600 text-lg"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="text-sm font-medium text-gray-900">Assistance Informatique</h3>
                                    <p class="text-xs text-gray-500">à partir de 35€/h</p>
                                </div>
                                <button class="text-red-500 hover:text-red-700 ml-2">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="/services" class="text-indigo-600 hover:text-indigo-500 text-sm font-medium">
                                Découvrir plus de services <i class="fas fa-arrow-right ml-1"></i>
                            </a>
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
@endsection