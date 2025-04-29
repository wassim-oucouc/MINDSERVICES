@extends('layout.client')

@section('title', 'Mon Profil')

@section('mon-profil', 'flex items-center px-3 py-2 text-sm font-medium rounded-md bg-blue-50 text-blue-600')

@section('content')
<!-- CONTENU PRINCIPAL -->
<div class="flex-1 overflow-auto pt-16 md:pt-0 md:ml-0">
    <!-- En-tête avec dégradé comme dans les autres pages -->
    <div class="bg-gradient-to-r from-blue-700 to-teal-500 py-8 relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center">
                    <h1 class="text-2xl font-extrabold text-white tracking-tight">Mon Profil</h1>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="/client/settings" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-blue-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i> Modifier le profil
                    </a>
                </div>
            </div>
        </div>
        <!-- Vague décorative en bas -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-8 text-gray-50 fill-current">
                <path d="M0,96L48,85.3C96,75,192,53,288,48C384,43,480,53,576,69.3C672,85,768,107,864,101.3C960,96,1056,64,1152,48C1248,32,1344,32,1392,32L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 -mt-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Colonne de gauche: Informations principales -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Informations personnelles -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Informations personnelles</h2>
                        <div class="flex flex-col md:flex-row md:items-start">
                            <div class="flex-shrink-0 h-32 w-32 rounded-full bg-gradient-to-br from-blue-100 to-teal-100 flex items-center justify-center shadow overflow-hidden mb-4 md:mb-0 md:mr-6">
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
                                        <input id="email-notif" name="email-notif" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label for="email-notif" class="ml-2 block text-sm text-gray-900">Notifications par email</label>
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <input id="sms-notif" name="sms-notif" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label for="sms-notif" class="ml-2 block text-sm text-gray-900">Notifications par SMS</label>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Préférences de contact</h3>
                                    <div class="flex items-center mt-2">
                                        <input id="matin" name="contact-pref" type="radio" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <label for="matin" class="ml-2 block text-sm text-gray-900">Matin (8h-12h)</label>
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <input id="apres-midi" name="contact-pref" type="radio" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
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
                            <a href="/client/reservation" class="text-blue-600 hover:text-blue-500 text-sm font-medium">
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
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
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
                                                <a href="/client/reservation/details/{{$value->id}}" class="text-blue-600 hover:text-blue-900">Détails</a>
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
                        <div class="space-y-4">
                           
                        </div>

                    </div>
                </div>

                <!-- Support client -->
                <div class="bg-gradient-to-r from-blue-50 to-teal-50 shadow-lg rounded-xl overflow-hidden border border-blue-100">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-teal-100 flex items-center justify-center">
                                <i class="fas fa-headset text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-medium text-gray-900">Besoin d'aide ?</h3>
                                <p class="text-sm text-gray-600 mt-1">Notre équipe est disponible 7j/7</p>
                            </div>
                        </div>
                        <div class="mt-4 space-y-3">
                            <a href="/help" class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors duration-200">
                                <i class="fas fa-comments mr-2"></i> Contacter le support
                            </a>
                            <a href="/faq" class="inline-flex items-center justify-center w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
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