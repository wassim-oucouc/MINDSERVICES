@extends('layout.admin')

@section('Services', 'flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600')

@section('title', 'Services')
@section('content')

<!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Gestion des Services</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..." class="bg-gray-100 rounded-full py-2 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                        <i class="fas fa-search absolute right-3 top-2.5 text-gray-500"></i>
                    </div>
                    <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                    </button>
                    <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none">
                        <i class="fas fa-cog text-xl"></i>
                    </button>
                </div>
            </header>

            <!-- Services content -->
            <div class="p-6">
                <!-- Stats cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Services</p>
                                <h3 class="text-2xl font-bold">{{$statistic['totalservices']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center">
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Services Actifs</p>
                                <h3 class="text-2xl font-bold">{{$statistic['ActifServices']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fas fa-check text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Services Inactif</p>
                                <h3 class="text-2xl font-bold">{{$statistic['InactifServices']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                            <i class="fas fa-cog text-gray-400 opacity-50"></i> 
                            </div>
                        </div>
                    </div>
                </div>
                @if(session('success'))
        <div class="w-full max-w-md my-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md flex justify-start items-center space-x-2" role="alert">
  <svg class="fill-current w-5 h-5 text-green-500 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
  </svg>
  <span><strong>Succès !</strong> {{session('success')}}</span>
</div>
@endif

                <!-- Action buttons -->
                <div class="flex flex-wrap items-center justify-between mb-6">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <a href="/admin/create/service">
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-indigo-700 transition-colors">
                            <i class="fas fa-plus"></i>
                            <span>Ajouter Service</span>
                        </button>
                        </a>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors">
                            <i class="fas fa-filter"></i>
                            <span>Filtres</span>
                        </button>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors">
                            <i class="fas fa-download"></i>
                            <span>Exporter</span>
                        </button>
                    </div>
                    <div class="flex space-x-4">
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Tous les services</option>
                            <option>Services actifs</option>
                            <option>Services inactifs</option>
                            <option>Nouveaux services</option>
                        </select>
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Trier par: Récent</option>
                            <option>Trier par: Nom A-Z</option>
                            <option>Trier par: Prix croissant</option>
                            <option>Trier par: Prix décroissant</option>
                        </select>
                    </div>
                </div>

                <!-- Services Table -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500">
                                            <span>Service</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestataire</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durée</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Ligne 1 -->
                                 @foreach($services as $value)
                                <tr class="table-row hover:bg-indigo-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500 mr-3">
                                            <div class="h-10 w-10 flex-shrink-0  rounded-md flex items-center justify-center">
                                               <img class = "rounded-lg" src="/storage/{{$value->Photo}}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{$value->titre}}</div>
                                                <div class="text-sm text-gray-500">{{$value->Description}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                            <div class="h-8 w-8 flex-shrink-0">
                                                <img src="/storage/{{$value->ProfilePhoto}}" alt="Prestataire" class="h-8 w-8 rounded-full object-cover">
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">{{$value->Prenom}} {{$value->Nom}}</div>
                                                <div class="text-xs text-gray-500">{{$value->Prenom}}</div>
                                            </div>
                                        </div>
    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$value->CategorieNom}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$value->Prix}} €</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$value->duration}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{$value->created_at}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($value->status == "Actif")
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                        @elseif($value->status == "Inactif")
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactif</span>
                                        @elseif($value->status == "Brouillon")
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Brouillon</span>
                                        @endif
                        
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a target = "_blank" href="/service/details/{{$value->id}}">
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
                                        </button>
                                        </a>
                                        <div>
                                        <button onclick = "openmodaledit({{$value->id}},'{{htmlspecialchars($value->titre)}}','{{htmlspecialchars($value->Description)}}',{{$value->Prix}},'{{$value->CategorieNom}}',{{$value->duration}},'{{htmlspecialchars($value->availability)}}')" class="text-indigo-600 hover:text-indigo-900 mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
</div>
                                        <form action="/admin/delete/service/{{$value->id}}" method = "POST">
                                            @csrf 
                                            @method('DELETE')
                                        <button class="text-red-600 hover:text-red-900 mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /> </svg>
                                        </button>
                                        </form>
                                        <form action="/admin/ban/service/{{$value->id}}" method = "POST">
                                        @csrf 
                                        @method('PUT')
                                        <button class="text-orange-600 hover:text-orange-900 mx-1" title="Bannir">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
</svg>
                                         </button>
                                         </form>
                                         <form action="/admin/uban/service/{{$value->id}}" method = "POST">
                                        @csrf
                                        @method('PUT')
                                         <button  class="text-green-600 hover:text-green-900 mx-1" title="Débannir ce produit">
                                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
        
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-8">
                    <div class="text-sm text-gray-600">
                    {{$services->links()}}
                    </div>
                    </div>
                </div>
            </div>
        </main>
        
<!-- Modal Backdrop -->
<div id="serviceModal" class="hidden h-15 w-15 fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center">
    <!-- Modal Container -->
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-3xl mx-4">
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-800">Modification de Service</h3>
            <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <!-- Modal Body with Scroll -->
        <div class="p-6 max-h-96 overflow-y-auto"> <!-- Added max-height and overflow -->
        @if($errors->any())
  <div class=" mx-auto my-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md">
    <ul class="list_errors list-disc pl-5">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
            

            <form id="serviceForm" action = "/admin/services" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PUT')
                <!-- Nom de Service -->
                 <input type="hidden" name="id_edit" id = "id_edit">
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom de Service *</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                        placeholder="Entrez le nom de Service">
                    <p class="mt-2 text-xs text-gray-500">Ce nom sera affiché sur votre site web.</p>
                </div>
                
                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description de Service</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                        placeholder="Entrez une description détaillée de Service"></textarea>
                    <p class="mt-2 text-xs text-gray-500">Décrivez ce service pour aider vos clients à comprendre ce qu'il contient.</p>
                </div>

                <!-- Prix -->
                <div class="mb-6">
                    <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                    <div class="relative">
                        <input type="number" id="prix" name="prix" step="0.01"
                            class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                            placeholder="Entrez le prix">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">€</span>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Indiquez le prix en euros (€).</p>
                </div>

                <!-- Catégorie -->
                <div class="mb-6">
                    <label for="categorie" class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                    <select id="categorie" name="categorie" >
                    @foreach($categories as $categorie)
                            <option value="{{$categorie->Nom}}" selected>{{$categorie->Nom}}</option>
                            @endforeach
                            </select>
                    <p class="mt-2 text-xs text-gray-500">Sélectionnez la catégorie du service.</p>
                </div>
                <div>
    <label for="availability" class="block text-sm font-medium text-gray-700 mb-2">availability</label>
    <div class="relative">
        <input type="text" id="availability" name="availability" step="1" class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" placeholder="Entrez la availability">
    </div>
<div>
                <div>
    <label for="Duration" class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
    <div class="relative">
        <input type="number" id="duration" name="duration" step="1" class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" placeholder="Entrez la duration">
        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">/H</span>
    </div>
    <div>
                            <label for="statut" class="block text-sm font-medium text-gray-700 mb-2">Statut du produit</label>
                            <select id="statut" name="statut"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                                <option value="Actif" selected>Actif</option>
                                <option value="Inactif">Inactif</option>
                                <option value="Brouillon">Brouillon</option>
                            </select>
                            <p class="mt-2 text-xs text-gray-500">Sélectionnez le statut du produit.</p>
                        </div>

                <!-- Photo upload -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Photo de Service</label>
                    
                    <div id="currentImageContainer" class="mb-3 hidden">
                        <p class="text-sm text-gray-500 mb-2">Image actuelle:</p>
                        <img id="currentImage" src="" alt="Service" class="w-32 h-32 object-cover rounded-lg">
                    </div>
                    
                    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl bg-gray-50 hover:bg-gray-100 transition-colors">
                        <div class="space-y-2 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <input id="image" name="image" type="file">
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 5MB</p>
                            <p class="text-xs text-gray-500">Laissez vide pour conserver l'image actuelle</p>
                        </div>
                    </div>
                </div>

    
                
                
                <!-- Action buttons -->
                <div class="flex items-center justify-end space-x-4 border-t border-gray-100 pt-6">
                    <button type="button" onclick="closeModal()" class="px-6 py-3 border border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                        Annuler
                    </button>
                    <button type="submit" class="px-6 py-3 border border-transparent rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>

    <script>
        console.log('hello')
        // Toggle sidebar
        document.querySelector('.fa-bars').addEventListener('click', function() {
            const sidebar = document.querySelector('aside');
            sidebar.classList.toggle('hidden');
        });

let Name = document.querySelector('#name');

let description = document.querySelector('#description');

let prix = document.querySelector('#prix');

let categorie = document.querySelector('#categorie');

let availability = document.querySelector('#availability');

let duration = document.querySelector('#duration');

let modal = document.querySelector('#serviceModal');

let inputid = document.querySelector('#id_edit');

let list_errors = document.querySelector('.list_errors');
console.log(list_errors)

if(list_errors)
{
    modal.classList.remove('hidden');
    let values = JSON.parse(localStorage.getItem('service'));
    inputid.value = values.id;
    Name.value = values.titre;
    description.value = values.Description;
    prix.value = values.Prix;
    duration.value = values.Duration;
    availability.value = values.Availability;
}


function openmodaledit(id,titre,Description,Prix,CategorieNom,Duration,Availability)
{
    let servicearray = [];
    let service = {
        id : id,
        titre : titre,
        Description : Description,
        Prix : Prix,
        CategorieNom : CategorieNom,
        Duration : Duration,
        Availability : Availability
    };


    let servicestring = JSON.stringify(service);

    servicearray.push(servicestring);

    localStorage.setItem('service',servicearray);




    inputid.value = id;
    Name.value = titre;
    description.value = Description;
    prix.value = Prix;
    duration.value = Duration;
    availability.value = Availability;
    modal.classList.remove('hidden');
}

// Toggle sidebar
document.querySelector('.fa-bars').addEventListener('click', function() {
        const sidebar = document.querySelector('aside');
        sidebar.classList.toggle('hidden');
    });

    function closeModal() {
        document.getElementById('serviceModal').classList.add('hidden');
    }


</script>

@endsection