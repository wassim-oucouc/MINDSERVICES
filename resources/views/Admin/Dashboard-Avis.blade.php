@extends('layout.Admin')

@section('title', 'Gestion Des Avis')
@section('Avis', 'bg-indigo-50 text-indigo-700')
@section('page-title', 'Gestion des Avis')

@section('content')
    <!-- Top header -->
    <section class="bg-white shadow-sm px-6 py-4 flex items-center justify-between mb-6">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold text-gray-800">Gestion des Avis</h2>
        </div>
       
    </section>

 <!-- Stats cards -->
 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total des avis</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">{{$statistic['totalavis']}}</p>
                </div>
                <div class="h-12 w-12 bg-indigo-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-comment-dots text-indigo-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Avis en attente</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">{{$statistic['totalavispending']}}</p>
                </div>
                <div class="h-12 w-12 bg-yellow-100 rounded-full flex items-center justify-center">
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Note moyenne</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">{{number_format($statistic['AvgAvis'],2)}}</p>
                </div>
                <div class="h-12 w-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-star text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Avis Approuver</p>
                    <p class="text-2xl font-semibold text-gray-900 mt-1">{{$statistic['totalavisapprouver']}}</p>
                </div>
                <div class="h-12 w-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-thumbs-up text-blue-600 text-xl"></i>
                </div>
        </div>
    </div>
</div>

    <!-- Filters -->
    <div class="flex flex-wrap items-center justify-between mb-6">
        <div class="flex items-center space-x-4 mb-4 md:mb-0">
            <h3 class="font-semibold text-gray-900">Liste des Avis</h3>
            <div class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600">
                <i class="fas fa-info-circle"></i>
                <span class="text-sm font-medium">{{$statistic['totalavispending']}} avis en attente de modération</span>
            </div>
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
                    @foreach($Avis as $value)
                    <tr class="hover:bg-indigo-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500 mr-3">
                                <span class="text-sm text-gray-900">{{ $value->id }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8 flex-shrink-0">
                                    <img src="/storage/{{ $value->ClientPhoto }}" alt="Client" class="h-8 w-8 rounded-full object-cover">
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $value->ClientPrenom }} {{ $value->ClientNom }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8 flex-shrink-0">
                                    <img src="/storage/{{ $value->ProfessionalPhoto }}" alt="Prestataire" class="h-8 w-8 rounded-full object-cover">
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $value->ProfessionalPrenom }} {{ $value->ProfessionalNom }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $value->titre }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 max-w-md truncate">{{ $value->Commentaire }}</div>
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
                                <span class="ml-1 text-gray-900 font-medium">{{ $value->Note }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">15/03/2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($value->status == "En attente")
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">En attente</span>
                            @elseif($value->status == "Approuvé")
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approuvé</span>
                            @elseif($value->status == "Refusé")
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Refusé</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            @if($value->status == "En attente")
                                <div class="flex flex-row justify-end">
                                    <form action="/admin/approve/avis/{{ $value->id }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                        <button class="text-green-600 hover:text-green-800 mx-1 px-2 py-1 bg-green-100 rounded-md">
                                            <i class="fas fa-check mr-1"></i> Accepter
                                        </button>
                                    </form>
                                    <form action="/refuse/avis/{{ $value->id }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                        <button class="text-red-600 hover:text-red-800 mx-1 px-2 py-1 bg-red-100 rounded-md">
                                            <i class="fas fa-times mr-1"></i> Refuser
                                        </button>
                                    </form>
                                </div>
                            @elseif($value->status == "Approuvé")
                                <div class="flex flex-row justify-end">
                        
                                    <form action="/admin/update/avis/{{ $value->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                    <form action="/Admin/delete/avis/{{ $value->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 mx-1">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
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
            {{$Avis->links()}}
        </div>
        </div>
</div>
    </div>
@endsection