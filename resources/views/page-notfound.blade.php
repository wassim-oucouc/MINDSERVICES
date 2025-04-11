@extends('layout.app')

@section('title', 'Page non trouvée')
@section('content')

<div class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md mx-auto px-4 py-12 text-center">
        <div class="mb-8">
            <h1 class="text-9xl font-bold text-indigo-600">404</h1>
            <h2 class="text-2xl font-semibold text-gray-900 mt-4">Page non trouvée</h2>
            <p class="text-gray-600 mt-4">La page que vous recherchez n'existe pas ou a été déplacée.</p>
        </div>
        
        <div class="mt-8 space-y-4">
            <a href="/" class="block w-full px-4 py-3 rounded-md bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition duration-150">
                  Retour à l'accueil
            </a>
            <a href="javascript:history.back()" class="block w-full px-4 py-3 rounded-md bg-white border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition duration-150">
                Retour à la page précédente
            </a>
        </div>
    </div>
</div>

@endsection