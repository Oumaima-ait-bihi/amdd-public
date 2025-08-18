@extends('admin.layouts.layout')
@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg shadow-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
                    <h2 class="text-2xl font-semibold text-gray-800">Liste des Activités</h2>
                    <p class="text-gray-600">Gérez vos activités ici.</p>
                </div>

                <!-- Filter Form -->
                <div class="mb-6 flex gap-4 items-center justify-between flex-wrap">
                    <form method="GET" action="{{ route('admin.activities.index') }}" class="flex space-x-2">
                        <select name="filter" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6">
                            <option value="">Toutes les activités</option>
                            <option value="day" {{ request('filter') === 'day' ? 'selected' : '' }}>Aujourd'hui</option>
                            <option value="week" {{ request('filter') === 'week' ? 'selected' : '' }}>Cette semaine</option>
                        </select>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                            Filtrer
                        </button>
                    </form>
                    <a href="{{ route('admin.activities.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 ml-auto">
                        Ajouter une Activité
                    </a>
                </div>

                <!-- Data Table -->
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Début</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Fin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lieu</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Video</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lien</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($activities as $activity)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $activity->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ \Carbon\Carbon::parse($activity->start_date)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ \Carbon\Carbon::parse($activity->end_date)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $activity->location }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        @if ($activity->image)
                                            <img src="{{ Storage::url($activity->image) }}" alt="Activity Image" class="w-16 h-16 object-cover rounded">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        @if ($activity->video)
                                            <video controls class="w-16 h-16 object-cover rounded">
                                                <source src="{{ Storage::url($activity->video) }}" type="video/mp4">
                                                Votre navigateur ne supporte pas la balise vidéo.
                                            </video>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">{{ $activity->description }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        @if ($activity->link)

                                            <a href="{{ $activity->link }}" target="_blank" class="text-blue-600 hover:underline truncate block max-w-xs">{{ Str::limit($activity->link, 20) }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        {{-- <a href="{{ route('admin.activities.show', $activity->id) }}" class="text-blue-600 hover:text-blue-800 mr-3" title="Voir">
                                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a> --}}
                                        <a href="{{ route('admin.activities.edit', $activity->id) }}" class="text-yellow-600 hover:text-yellow-800 mr-3" title="Modifier">
                                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        {{-- <form action="{{ route('admin.activities.destroy', $activity->id) }}" method="POST" class="inline pr-3" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette activité ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" title="Supprimer">
                                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4M9 7h6m-5 4v6m4-6v6"></path>
                                                </svg>
                                            </button>
                                        </form> --}}
                                        <button data-url="{{ route('admin.activities.destroy', $activity->id) }}" class="text-red-600 hover:text-red-900 ml-4 delete-btn">
                                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4M9 7h6m-5 4v6m4-6v6"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">Aucune activité trouvée.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $activities->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
