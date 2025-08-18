@extends('admin.layouts.layout')
@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <!-- Page Title -->
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Ajouter une Nouvelle Annonce</h2>
                    <p class="text-gray-600">Remplissez les champs ci-dessous pour créer une annonce.</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg shadow-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('admin.annonces.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12">
                        <!-- Title and Description Section -->
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <!-- Titre FR -->
                                <div class="sm:col-span-3">
                                    <label for="titre_annonce_fr" class="block text-sm/6 font-medium text-gray-900">Titre (FR)</label>
                                    <div class="mt-2">
                                        <input type="text" name="titre_annonce_fr" id="titre_annonce_fr" value="{{ old('titre_annonce_fr') }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required placeholder="Entrez le titre en français">
                                    </div>
                                </div>

                                <!-- Titre AR -->
                                <div class="sm:col-span-3">
                                    <label for="titre_annonce_ar" class="block text-sm/6 font-medium text-gray-900">Titre (AR)</label>
                                    <div class="mt-2">
                                        <input type="text" name="titre_annonce_ar" id="titre_annonce_ar" value="{{ old('titre_annonce_ar') }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required dir="rtl" placeholder="أدخل العنوان بالعربية">
                                    </div>
                                </div>

                                <!-- Description FR -->
                                <div class="col-span-full">
                                    <label for="description_annonce_fr" class="block text-sm/6 font-medium text-gray-900">Description (FR)</label>
                                    <div class="mt-2">
                                        <textarea name="description_annonce_fr" id="description_annonce_fr" rows="3"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            placeholder="Entrez une description en français">{{ old('description_annonce_fr') }}</textarea>
                                    </div>
                                </div>

                                <!-- Description AR -->
                                <div class="col-span-full">
                                    <label for="description_annonce_ar" class="block text-sm/6 font-medium text-gray-900">Description (AR)</label>
                                    <div class="mt-2">
                                        <textarea name="description_annonce_ar" id="description_annonce_ar" rows="3"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            dir="rtl" placeholder="أدخل وصفًا بالعربية">{{ old('description_annonce_ar') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Date and Image Section -->
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-900">Date et Image</h2>
                            <p class="mt-1 text-sm/6 text-gray-600">Définissez la date et l'image de l'annonce.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <!-- Date Annonce -->
                                <div class="sm:col-span-3">
                                    <label for="date_annonce" class="block text-sm/6 font-medium text-gray-900">Date</label>
                                    <div class="mt-2">
                                        <input type="date" name="date_annonce" id="date_annonce" value="{{ old('date_annonce') }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required>
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="col-span-full">
                                    <label for="image_annonce" class="block text-sm/6 font-medium text-gray-900">Image</label>
                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                        <div class="text-center">
                                            <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                            </svg>
                                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                                <label for="image_annonce" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="image_annonce" name="image_annonce" type="file" class="sr-only" accept="image/*">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 2MB</p>
                                        </div>
                                    </div>
                                    <p id="image-file-name" class="mt-2 text-sm/6 text-gray-600"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('admin.annonces.index') }}" class="text-sm/6 font-semibold text-gray-900">Annuler</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Créer l'Annonce</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for File Input Display -->
<script>
    // Display selected file name for Image
    document.getElementById('image_annonce').addEventListener('change', function(event) {
        const fileName = event.target.files[0] ? event.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('image-file-name').textContent = fileName;
    });
</script>

@endsection