@extends('layout.app')

@section('title', 'Services - Plomberie')
@section('content')

<!-- Header Section -->
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
            <div class="pt-10 mx-auto max-w-7xl px-4 sm:pt-12 sm:px-6 md:pt-16 lg:pt-20 lg:px-8 xl:pt-28">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">Services de {{$categorie->Nom}}</span>
                        <span class="block text-indigo-600">{{$categorie->Nom}}</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
                        Découvrez tous nos prestataires qualifiés dans le domaine de la {{$categorie->Nom}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Category Description -->
<div class="bg-indigo-50">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/3 mb-6 md:mb-0">
                <img class="w-full h-auto rounded-lg shadow-md" src="/storage/{{$categorie->Photo}}" alt="{{$categorie->Nom}}">
            </div>
            <div class="md:w-2/3 md:pl-10">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">À propos des services de {{$categorie->Nom}}</h2>
                <p class="text-gray-600 mb-4">
                {{$categorie->Description}}
                </p>
                <p class="text-gray-600">
                    Tous nos Prestataires sont des professionnels certifiés et expérimentés, garantissant un travail de qualité et conforme aux normes en vigueur.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Services Listing -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Services disponibles</h2>
        
        @foreach($services as $service)
        <div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/4">
                    <img class="h-48 w-full object-cover md:h-full" src="/storage/{{$service->Photo}}" alt="Plombier Paris">
                </div>
                <div class="p-6 md:w-3/4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{$service->titre}}</h3>
                            <div class="flex items-center mt-1">
                                <div class="text-yellow-400 flex">
                                @for( $i = 1 ; $i <= 5 ; $i++) 
                                    @if($i <= $service->avis_avg_note)
                                        <i class="fas fa-star"></i> 
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor   
                                </div>
                                <span class="ml-2 text-gray-600">{{$service->avis_avg_note}} ({{$service->avis_count}} avis)</span>
                            </div>
                            <p class="text-gray-600 mt-2">
                                <i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i>{{$service->Professional->Ville ?? ""}} {{$service->Professional->Adresse ?? ""}}
                            </p>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex flex-col sm:flex-row sm:justify-between sm:items-center">
                        <p class="flex items-center text-lg font-semibold text-gray-900">
                            <span>À partir de {{$service->Prix}}€/h</span>
                        </p>
                        <div class="mt-4 sm:mt-0">
                            <a href="/service/details/{{$service->id}}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
     
      

        <!-- Pagination -->
        <div class="mt-12 px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">
            {{$services->links()}}
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>

                </div>
                <div>
               
        </div>
    </div>
</div>


<!-- CTA Section -->
<div class="bg-indigo-700">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Besoin d'un Prestataire en urgence ?</span>
            <span class="block text-indigo-200">Contactez nos prestataires disponibles 24/7.</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="/services" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                    Services d'urgence
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
                <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600">
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</div>
@endsection