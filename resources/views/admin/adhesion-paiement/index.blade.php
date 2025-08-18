@extends('admin.layouts.layout')
@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <!-- Page Title -->
                <div class="mb-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">Liste des Adhésions aux Paiements</h2>
                        <p class="text-gray-600">Gérez les adhésions aux paiements ici.</p>
                    </div>
                </div>

                <!-- Filter Form -->
                <div class="mb-4">
                    <form method="GET" action="{{ route('admin.adhesion-paiement') }}" class="flex space-x-2 justify-start">
                        <select name="filter" class="col-start-1 row-start-1 appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6">
                            <option value="">Toutes les adhesion paiement</option>
                            <option value="day" {{ request('filter') === 'day' ? 'selected' : '' }}>Aujourd'hui</option>
                            <option value="week" {{ request('filter') === 'week' ? 'selected' : '' }}>Cette semaine</option>
                        </select>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                            Filtrer
                        </button>
                    </form>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Genre</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Région</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CIN</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CIN Face 1</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CIN Face 2</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CV</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reçu Paiement</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Créé le</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($adhesionPaiement as $adhesion)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $adhesion->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $adhesion->nom }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $adhesion->prenom }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $adhesion->genre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $adhesion->tele }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $adhesion->region }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $adhesion->ville }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $adhesion->cin }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if ($adhesion->photo_1)
                                            <a href="{{ asset('uploads/Photo/' . $adhesion->photo_1) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Voir Photo</a>
                                        @else
                                            Aucune Photo
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if ($adhesion->cin_face_1)
                                            <a href="{{ asset('uploads/CIN_Passport_Face_recto/' . $adhesion->cin_face_1) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Voir CIN Face 1</a>
                                        @else
                                            Aucun CIN Face 1
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if ($adhesion->cin_face_2)
                                            <a href="{{ asset('uploads/CIN_Passport_Face_verso/' . $adhesion->cin_face_2) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Voir CIN Face 2</a>
                                        @else
                                            Aucun CIN Face 2
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if ($adhesion->cv)
                                            <a href="{{ asset('uploads/CV/' . $adhesion->cv) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Voir CV</a>
                                        @else
                                            Aucun CV
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if ($adhesion->recu_paiement)
                                            <a href="{{ asset('uploads/Recu_paiement/' . $adhesion->recu_paiement) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Voir Reçu</a>
                                        @else
                                            Aucun Reçu
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $adhesion->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15" class="px-6 py-4 text-center text-sm text-gray-500">
                                        Aucune adhésion trouvée.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $adhesionPaiement->appends(request()->query())->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection