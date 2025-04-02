@extends('layout.Admin')

@section('title', 'Gestion Des Avis')
@section('content')
        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <section class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Gestion des Avis</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..." class="bg-gray-100 rounded-full py-2 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                        <i class="fas fa-search absolute right-3 top-2.5 text-gray-500"></i>
                    </div>
                    <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">5</span>
                    </button>
                    <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none">
                        <i class="fas fa-cog text-xl"></i>
                    </button>
                </div>
</section>

            <!-- Reviews content -->
            <div class="p-6">
                <!-- Stats cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
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
                                <p class="text-sm font-medium text-gray-500">Avis en attente</p>
                                <p class="text-2xl font-semibold text-gray-900 mt-1">42</p>
                            </div>
                            <div class="h-12 w-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-yellow-600">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <span>Nécessite votre attention</span>
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
                                <p class="text-sm font-medium text-gray-500">Taux d'approbation</p>
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
                <div class="flex flex-wrap items-center justify-between mb-6">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <h3 class="font-semibold text-gray-900">Liste des Avis</h3>
                        <div class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600">
                            <i class="fas fa-info-circle"></i>
                            <span class="text-sm font-medium">42 avis en attente de modération</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Tous les statuts</option>
                            <option>En attente</option>
                            <option>Approuvés</option>
                            <option>Refusés</option>
                        </select>
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Toutes les notes</option>
                            <option>5 étoiles</option>
                            <option>4 étoiles</option>
                            <option>3 étoiles</option>
                            <option>2 étoiles</option>
                            <option>1 étoile</option>
                        </select>
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Trier par: Date (récent)</option>
                            <option>Trier par: Date (ancien)</option>
                            <option>Trier par: Note (élevée)</option>
                            <option>Trier par: Note (basse)</option>
                        </select>
                    </div>
                </div>

                <!-- Reviews List -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500">
                                            <span>ID</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestataire</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service Réservé</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Commentaire</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Note</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Avis 1 -->
                                 @foreach($Avis as $value)
                                <tr class="table-row hover:bg-indigo-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500 mr-3">
                                            <span class="text-sm text-gray-900">{{$value->id}}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 flex-shrink-0">
                                                <img src="/storage/{{$value->ClientPhoto}}" alt="Client" class="h-8 w-8 rounded-full object-cover">
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">{{$value->ClientPrenom}}  " " {{$value->ClientNom}} </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 flex-shrink-0">
                                                <img src="/storage{{$value->ProfessionalPhoto}}" alt="Prestataire" class="h-8 w-8 rounded-full object-cover">
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">{{$value->ProfessionalPrenom}}  " " {{$value->ProfessionalNom}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$value->titre}}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-md truncate">{{$value->Commentaire}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex text-yellow-400">
                                           
  @if($value->Note == 0)
    <i class="fas fa-star"></i>
    <i class="far fa-star"></i> 
    <i class="far fa-star"></i> 
    <i class="far fa-star"></i> 
    <i class="far fa-star"></i>  
    @elseif($value->Note == 2)
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="far fa-star"></i> 
    <i class="far fa-star"></i> 
    <i class="far fa-star"></i>
    @elseif($value->Note == 3)
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="far fa-star"></i>  
    <i class="far fa-star"></i>
    @elseif($value->Note == 4)
    <i class="fas fa-star"></i>  
    <i class="fas fa-star"></i>  
    <i class="fas fa-star"></i>  
    <i class="fas fa-star"></i>  
    <i class="far fa-star"></i>
    @elseif($value->Note == 5)
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
                                            @endif
                                            <span class="ml-1 text-gray-900 font-medium">{{$value->Note}}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">15/03/2025</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($value->status == "En attente")
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">En attente</span>
                                        @elseif(($value->status == "Approuvé"))
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approuvé</span>
                                        @elseif(($value->status == "Refusé"))
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Refusé</span>
                                        @endif
                                    </td>
                                
                                    <td class=" whitespace-nowrap text-right text-sm font-medium">
                                    <div class ="flex flex-row">
                                    @if($value->status == "En attente")
                                    <form action="/admin/approve/avis/{{$value->id}}" method = "POST">
                                        @csrf 
                                        @method('PUT')
                                        <button class="text-green-600 hover:text-green-800 mx-1 px-2 py-1 bg-green-100 rounded-md">
                                            <i class="fas fa-check mr-1"></i> Accepter
                                        </button>
                                        </form>
                                        <form action="/refuse/avis/{{$value->id}}" method = "POST">
                                        @csrf 
                                        @method('PUT')
                                        <button class="text-red-600 hover:text-red-800 mx-1 px-2 py-1 bg-red-100 rounded-md">
                                            <i class="fas fa-times mr-1"></i> Refuser
                                        </button>
</div>
                                        @elseif($value->status == "Approuvé")
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <form action="/admin/update/avis/{{$value->id}}" method = "POST">
                                        @csrf
                                        @method('put')
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        </form>
                                        <form action="/Admin/delete/avis/{{$value->id}}" method = "POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type = "submit"class="text-red-600 hover:text-red-900 mx-1">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        </form>
                
                                    </td>
                                 
                                    @elseif($value->status == "Refusé")
                                        @endif
                                </tr>
                                @endforeach
                                
                              

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-8">
                    <div class="text-sm text-gray-600">
                        Affichage de 1-5 sur 4,257 rendez-vous
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="px-4 py-2 bg-indigo-600 border border-indigo-600 rounded-lg text-white">1</button>
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">2</button>
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">3</button>
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">4</button>
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Toggle sidebar
        document.querySelector('.fa-bars').addEventListener('click', function() {
            const sidebar = document.querySelector('aside');
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>
</html>
@endsection
                                