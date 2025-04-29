@extends('layout.app')

@section('title', 'Catégories')
@section('content')

<!-- Header Section -->
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
            <div class="pt-10 mx-auto max-w-7xl px-4 sm:pt-12 sm:px-6 md:pt-16 lg:pt-20 lg:px-8 xl:pt-28">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">Toutes nos catégories</span>
                        <span class="block text-indigo-600">de services</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
                        Découvrez l'ensemble des services proposés par nos prestataires qualifiés
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($categories as $categorie)
            <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gray-200 relative">
                    <img class="w-full h-full object-cover" src="/storage/{{$categorie->Photo}}" alt="Plomberie">
                    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">{{$categorie->Nom}}</h3>
                    <p class="mt-2 text-base text-gray-500">
                    {{$categorie->Description}}
                    </p>
                    <div class="mt-4">
                        <a href="/categorie/services/{{$categorie->id}}" class="text-indigo-600 hover:text-indigo-500 font-medium">
                            Voir les prestataires <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-indigo-700">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Vous ne trouvez pas ce que vous cherchez ?</span>
            <span class="block text-indigo-200">Contactez-nous pour toute demande spécifique.</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                    Nous contacter
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
                <a href="/" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600">
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection