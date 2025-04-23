@extends('layout.Prestataire')

@section('title', 'Mes Avis')
@section('Avis', 'bg-indigo-50 text-indigo-700')
@section('page-title', 'Mes Avis')

@section('content')
    <!-- Top header -->
    <section class="bg-white shadow-sm px-6 py-4 flex items-center justify-between mb-6">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold text-gray-800">Mes Avis Client</h2>
        </div>
        <div class="flex items-center space-x-4">
            <form action="/prestataire/avis/search" method="GET" class="relative">
                <input type="text" name="search" placeholder="Rechercher..." class="bg-gray-100 rounded-full py-2 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                <button type="submit" class="absolute right-3 top-2.5 text-gray-500">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </section>

    <!-- Stats cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total des avis</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">358</p>
                </div>
                <div class="h-12 w-12 bg-indigo-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-comment-dots text-indigo-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-green-600">
                <i class="fas fa-arrow-up mr-1"></i>
                <span>23% depuis le mois dernier</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Note moyenne</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">4.7/5</p>
                </div>
                <div class="h-12 w-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-star text-green-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-green-600">
                <i class="fas fa-arrow-up mr-1"></i>
                <span>0.3 depuis le mois dernier</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Taux de satisfaction</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">92%</p>
                </div>
                <div class="h-12 w-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-thumbs-up text-blue-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-green-600">
                <i class="fas fa-arrow-up mr-1"></i>
                <span>5% depuis le mois dernier</span>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <form action="/prestataire/avis/filter" method="GET" class="flex flex-wrap items-center justify-between mb-6">
        <div class="flex items-center space-x-4 mb-4 md:mb-0">
            <h3 class="font-semibold text-gray-900">Liste des Avis</h3>
        </div>
        <div class="flex flex-wrap gap-4">
            <select name="service" class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Tous les services</option>
                <option value="1">Service 1</option>
                <option value="2">Service 2</option>
                <option value="3">Service 3</option>
            </select>
            <select name="note" class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Toutes les notes</option>
                <option value="5">5 étoiles</option>
                <option value="4">4 étoiles</option>
                <option value="3">3 étoiles</option>
                <option value="2">2 étoiles</option>
                <option value="1">1 étoile</option>
            </select>
            <select name="sort" class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="date_desc">Trier par: Date (récent)</option>
                <option value="date_asc">Trier par: Date (ancien)</option>
                <option value="note_desc">Trier par: Note (élevée)</option>
                <option value="note_asc">Trier par: Note (basse)</option>
            </select>
            <button type="submit" class="bg-indigo-600 text-white rounded-lg px-4 py-2 hover:bg-indigo-700">
                Filtrer
            </button>
        </div>
    </form>

    <!-- Reviews List -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Commentaire</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Note</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Détails</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                   @foreach($avis as $feedback)
                    <tr class="hover:bg-indigo-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8 flex-shrink-0">
                                    <img src="/storage/{{$feedback->Client->Photo}}" alt="Client" class="h-8 w-8 rounded-full object-cover">
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{$feedback->Client->Prenom}} {{$feedback->Client->Nom}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$feedback->Service->titre}}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 max-w-md truncate">{{$feedback->Commentaire}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex text-yellow-400">
                            @for( $i = 1 ; $i <= 5 ; $i++)
                                    @if($i <= $feedback->Note)
                                    <i class="fas fa-star"></i> 
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                                <span class="ml-1 text-gray-900 font-medium">{{$feedback->Note}}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$feedback->created_at}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        @if($feedback->status == "En attente")
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">En attente</span>
                            @elseif($feedback->status == "Approuvé")
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approuvé</span>
                            @elseif($feedback->status == "Refusé")
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Refusé</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/prestataire/avis/{{$prestataire_id}}" class="text-indigo-600 hover:text-indigo-900 mx-1">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-8">
        <div class="text-sm text-gray-600">
        Affichage de 1-5 sur {{ $avis->total() }} avis
        </div>
        <div class="flex space-x-2">
         {{$avis->links()}}
        </div>
    </div>
@endsection