@extends('layout.client')

@section('title', 'Donner un avis')

@section('services-réservés', 'flex items-center px-3 py-2 text-sm font-medium rounded-md bg-blue-50 text-blue-600')

@section('content')

<!-- CONTENU PRINCIPAL -->
<div class="flex-1 overflow-auto pt-16 md:pt-0 md:ml-0">
    <div class="bg-gradient-to-r from-blue-600 to-sky-500 shadow-lg">
        <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-white">Donner votre avis</h1>
        </div>
    </div>
    
    <main class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Détails du service -->
        <div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800">Détails du service</h2>
            </div>
            
            <div class="px-6 py-4">
                <div class="flex items-start sm:items-center">
                    <div class="flex-shrink-0 h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center shadow overflow-hidden">
                        <img src="/storage/{{$service->Photo}}" alt="Titre du service" class="h-full w-full object-cover">
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{$service->titre}}</h3>
                        <p class="text-sm text-gray-600">Service effectué par: <span class="font-medium">{{$service->Prestataire->Prenom}} {{$service->Prestataire->Nom}}</span></p>
                    </div>
                </div>
            </div>
        </div>
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


        
        <!-- Formulaire d'avis -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800">Votre évaluation</h2>
            </div>
            
            <form action="/client/reservation/avis/{{$service->id}}" method="POST" class="px-6 py-6">
                @csrf
                
                <!-- Note étoiles -->
                 <input type="hidden" name="prestataire_id" value ="{{$prestataire_id}}">
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Votre note</label>
                    <div class="flex items-center space-x-1">
                        <div class="flex">
                            <select id="rating" name="rating" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-700 transition-colors duration-200">
                                <option value="1">1 étoile</option>
                                <option value="2">2 étoiles</option>
                                <option value="3">3 étoiles</option>
                                <option value="4">4 étoiles</option>
                                <option value="5">5 étoiles</option>
                            </select>
                        </div>
                        <span class="text-sm text-gray-500 ml-2">Sélectionnez votre note</span>
                    </div>
                    <p class="mt-1 text-xs text-red-600 hidden">Veuillez sélectionner une note</p>
                </div>
                
                <!-- Commentaire -->
                <div class="mb-6">
                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Votre commentaire</label>
                    <textarea id="comment" name="comment" rows="4" class="w-full text-sm rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 text-gray-700 transition-colors duration-200" placeholder="Partagez votre expérience en détail"></textarea>
                    <p class="mt-1 text-xs text-red-600 hidden">Ce champ est requis</p>
                </div>
                
                               <!-- Recommanderiez-vous ce service? -->
                               <div class="mb-6">
                    <span class="block text-sm font-medium text-gray-700 mb-2">Recommanderiez-vous ce service?</span>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <input id="recommend-yes" name="recommend" type="radio" value="1" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="recommend-yes" class="ml-2 block text-sm text-gray-700">Oui</label>
                        </div>
                        <div class="flex items-center">
                            <input id="recommend-no" name="recommend" type="radio" value="0" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="recommend-no" class="ml-2 block text-sm text-gray-700">Non</label>
                        </div>
                    </div>
                </div>
                
                <!-- Boutons d'action -->
                <div class="flex justify-end space-x-3">
                    <a href="/client/services-reserves" class="px-4 py-2 text-sm border border-gray-300 rounded shadow-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">Annuler</a>
                    <button type="submit" class="px-4 py-2 text-sm border border-transparent rounded shadow-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">Soumettre l'avis</button>
                </div>
            </form>
        </div>
        
        <!-- Politique d'avis -->
        <div class="mt-6 bg-blue-50 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle h-5 w-5 text-blue-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800">Politique d'avis</h3>
                    <div class="mt-2 text-xs text-blue-700">
                        <p>
                            Votre avis aide les autres utilisateurs à prendre une décision éclairée. Nous nous réservons le droit de modérer les avis ne respectant pas nos conditions d'utilisation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection