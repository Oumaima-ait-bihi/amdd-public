@extends('admin.layouts.layout')
@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <!-- Success/Error Messages -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg shadow-sm">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Page Title -->
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Liste des Événements</h2>
                    <p class="text-gray-600">Gérez vos événements AMDD ici.</p>
                </div>

                <!-- Filter Form -->
                <div class="mb-6 flex gap-4 items-center justify-between flex-wrap">
                    <form method="GET" action="{{ route('admin.evenements.index') }}" class="flex space-x-2">
                        <select name="filter" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6">
                            <option value="">Tous les événements</option>
                            <option value="day" {{ request('filter') === 'day' ? 'selected' : '' }}>Aujourd'hui</option>
                            <option value="week" {{ request('filter') === 'week' ? 'selected' : '' }}>Cette semaine</option>
                        </select>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                            Filtrer
                        </button>
                    </form>
                    <a href="{{ route('admin.evenements.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 ml-auto">
                        Ajouter un Événement
                    </a>
                </div>

                <!-- Data Table -->
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre (FR)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type (FR)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Début</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Fin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vidéo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gallery</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description (FR)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description (AR)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Liens</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($evenements as $evenement)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $evenement->titre_fr }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $evenement->type_fr }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ \Carbon\Carbon::parse($evenement->date_debut)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ \Carbon\Carbon::parse($evenement->date_fin)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $evenement->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($evenement->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        @if ($evenement->image && !is_array($evenement->image))
                                            <img src="{{ Storage::url($evenement->image) }}" alt="Event Image" class="w-16 h-16 object-cover rounded">
                                        @elseif (is_array($evenement->image) && !empty($evenement->image))
                                            <img src="{{ Storage::url($evenement->image[0]) }}" alt="Event Image" class="w-16 h-16 object-cover rounded">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        @if ($evenement->video)
                                            <video controls class="w-16 h-16 object-cover rounded">
                                                <source src="{{ Storage::url($evenement->video) }}" type="video/mp4">
                                                Votre navigateur ne supporte pas la balise vidéo.
                                            </video>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        @if (is_array($evenement->gallery) && !empty($evenement->gallery))
                                            <div class="flex space-x-2">
                                                @foreach ($evenement->gallery as $galleryImage)
                                                    <img src="{{ Storage::url($galleryImage) }}" alt="Gallery Image" class="w-10 h-10 object-cover rounded">
                                                @endforeach
                                            </div>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">{{ $evenement->description_fr }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">{{ $evenement->description_ar }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 max-h-16 overflow-hidden">
                                        @if (is_array($evenement->links) && !empty($evenement->links))
                                            <div class="flex flex-col space-y-1 max-h-16 overflow-y-auto">
                                                @foreach ($evenement->links as $link)
                                                    <a href="{{ $link }}" target="_blank" class="text-blue-600 hover:underline truncate block max-w-xs">{{ Str::limit($link, 20) }}</a>
                                                @endforeach
                                            </div>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.evenements.edit', $evenement->id) }}" class="text-yellow-600 hover:text-yellow-800 mr-3" title="Modifier">
                                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        {{-- <form action="{{ route('admin.evenements.destroy', $evenement->id) }}" method="POST" class="inline pr-3" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" title="Supprimer">
                                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4M9 7h6m-5 4v6m4-6v6"></path>
                                                </svg>
                                            </button>
                                        </form> --}}
                                        <button data-url="{{ route('admin.evenements.destroy', $evenement->id) }}" class="text-red-600 hover:text-red-900 ml-4 delete-btn">
                                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4M9 7h6m-5 4v6m4-6v6"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="px-6 py-4 text-center text-gray-500">Aucun événement trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $evenements->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
