@extends('layout.Admin')

@section('title', 'Modification d\'Avis')
@section('content')
        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <section class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Modification d'Avis</h2>
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

            <!-- Edit Review Content -->
            <div class="p-6">
                <!-- Breadcrumb -->
                <nav class="mb-6 flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="/admin/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600">
                                <i class="fas fa-home mr-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-400 mx-2 text-sm"></i>
                                <a href="/admin/avis" class="text-sm font-medium text-gray-700 hover:text-indigo-600">Gestion des Avis</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-400 mx-2 text-sm"></i>
                                <span class="text-sm font-medium text-gray-500">Modification</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Review Info Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-6">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informations de l'Avis</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Client Info -->
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div class="h-12 w-12 flex-shrink-0">
                                        <img src="/storage/{{$Avis->Client->Photo}}" alt="Client" class="h-12 w-12 rounded-full object-cover">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Client</div>
                                        <div class="text-lg font-semibold">{{$Avis->Client->Prenom}}  {{$Avis->Client->Nom}}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Prestataire Info -->
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div class="h-12 w-12 flex-shrink-0">
                                        <img src="/storage/{{$Avis->Prestataire->Photo}}" alt="Prestataire" class="h-12 w-12 rounded-full object-cover">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Prestataire</div>
                                        <div class="text-lg font-semibold">{{$Avis->Prestataire->Prenom}}  {{$Avis->Prestataire->Nom}}</div>
                                    </div>
                                </div>
                            </div>
                            
                         
                            
                            <!-- Date Info -->
                            <div>
                                <div class="text-sm font-medium text-gray-500">Date de l'avis</div>
                                <div class="text-base font-medium text-gray-900 mt-1">{{$Avis->created_at}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Form -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-6">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Modifier l'Avis</h3>
                        
                        <form action="/admin/update/avis/{{$Avis->id}}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')
                            
                            <!-- Rating as Select -->
                            <div>
                                <label for="note" class="block text-sm font-medium text-gray-700 mb-2">Note</label>
                                <div class="flex items-center">
                                    <select id="note" name="Note" class="mt-1 block w-40 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        @if($Avis->Note == 1)
                                        <option value="1" selected>1/5 ⭐</option>
                                        <option value="2">2/5 ⭐⭐</option>
                                        <option value="3">3/5 ⭐⭐⭐</option>
                                        <option value="4" >4/5 ⭐⭐⭐⭐</option>
                                        <option value="5">5/5 ⭐⭐⭐⭐⭐</option>
                                        @elseif($Avis->Note == 2)
                                        <option value="1">1/5 ⭐</option>
                                        <option value="2" selected>2/5 ⭐⭐</option>
                                        <option value="3">3/5 ⭐⭐⭐</option>
                                        <option value="4" >4/5 ⭐⭐⭐⭐</option>
                                        <option value="5">5/5 ⭐⭐⭐⭐⭐</option>
                                        @elseif($Avis->Note == 3)
                                        <option value="1">1/5 ⭐</option>
                                        <option value="2">2/5 ⭐⭐</option>
                                        <option value="3" selected>3/5 ⭐⭐⭐</option>
                                        <option value="4" >4/5 ⭐⭐⭐⭐</option>
                                        <option value="5">5/5 ⭐⭐⭐⭐⭐</option>
                                        @elseif($Avis->Note == 4)
                                        <option value="1">1/5 ⭐</option>
                                        <option value="2">2/5 ⭐⭐</option>
                                        <option value="3">3/5 ⭐⭐⭐</option>
                                        <option value="4" selected>4/5 ⭐⭐⭐⭐</option>
                                        <option value="5">5/5 ⭐⭐⭐⭐⭐</option>
                                        @elseif($Avis->Note == 5)
                                        <option value="1">1/5 ⭐</option>
                                        <option value="2">2/5 ⭐⭐</option>
                                        <option value="3">3/5 ⭐⭐⭐</option>
                                        <option value="4">4/5 ⭐⭐⭐⭐</option>
                                        <option value="5" selected>5/5 ⭐⭐⭐⭐⭐</option>
                                        @endif
                                    </select>

                                </div>
                            </div>
                            
                            <!-- Comment -->
                            <div>
                                <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-2">Commentaire</label>
                                <textarea value = "{{$Avis->Commentaire}}" id="commentaire" name="Commentaire" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 resize-none">{{$Avis->Commentaire}}</textarea>
                            </div>
                            
                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Statut de l'avis</label>
                                <div class="mt-2 space-y-2">
                                    <div class="flex items-center">
                                        <input id="status-pending" name="status" type="radio" value="En attente" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                        <label for="status-pending" class="ml-3 block text-sm font-medium text-gray-700">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">En attente</span>
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="status-approved" name="status" type="radio" value="Approuvé" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                        <label for="status-approved" class="ml-3 block text-sm font-medium text-gray-700">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Approuvé</span>
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="status-rejected" name="status" type="radio" value="Refusé" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                        <label for="status-rejected" class="ml-3 block text-sm font-medium text-gray-700">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Refusé</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Rejection Reason (shown only when 'Refusé' is selected) -->
                            <div id="rejection-reason" class="hidden">
                                <label for="reason" class="block text-sm font-medium text-gray-700 mb-2">Motif du refus</label>
                                <textarea id="reason" name="rejection_reason" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 resize-none"></textarea>
                                <p class="mt-1 text-sm text-gray-500">Ce message sera envoyé à l'utilisateur pour expliquer pourquoi son avis a été refusé.</p>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex justify-end space-x-3 pt-4">
                                <a href="/admin/avis" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Annuler</a>
                                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sauvegarder les modifications</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

    <script>
       
    </script>
@endsection