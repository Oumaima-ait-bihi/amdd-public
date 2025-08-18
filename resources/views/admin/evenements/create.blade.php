@extends('admin.layouts.layout')
@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <!-- Page Title -->
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Ajouter un Nouvel Événement</h2>
                    <p class="text-gray-600">Remplissez les champs ci-dessous pour créer un événement.</p>
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

                <!-- Form -->
                <form action="{{ route('admin.evenements.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12">
                        <!-- Title and Type Section -->
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <!-- Titre FR -->
                                <div class="sm:col-span-3">
                                    <label for="titre_fr" class="block text-sm/6 font-medium text-gray-900">Titre (FR)</label>
                                    <div class="mt-2">
                                        <input type="text" name="titre_fr" id="titre_fr" value="{{ old('titre_fr') }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required placeholder="Entrez le titre en français">
                                    </div>
                                </div>

                                <!-- Titre AR -->
                                <div class="sm:col-span-3">
                                    <label for="titre_ar" class="block text-sm/6 font-medium text-gray-900">Titre (AR)</label>
                                    <div class="mt-2">
                                        <input type="text" name="titre_ar" id="titre_ar" value="{{ old('titre_ar') }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required dir="rtl" placeholder="أدخل العنوان بالعربية">
                                    </div>
                                </div>

                                <!-- Type FR -->
                                <div class="sm:col-span-3">
                                    <label for="type_fr" class="block text-sm/6 font-medium text-gray-900">Type (FR)</label>
                                    <div class="mt-2 grid grid-cols-1">
                                        <select name="type_fr" id="type_fr"
                                            class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required>
                                            <option value="" disabled {{ old('type_fr') ? '' : 'selected' }}>Sélectionnez un type</option>
                                            <option value="Conference" {{ old('type_fr') === 'Conference' ? 'selected' : '' }}>Conférence</option>
                                            <option value="Workshop" {{ old('type_fr') === 'Workshop' ? 'selected' : '' }}>Atelier</option>
                                            <option value="Seminar" {{ old('type_fr') === 'Seminar' ? 'selected' : '' }}>Séminaire</option>
                                            <option value="Meetup" {{ old('type_fr') === 'Meetup' ? 'selected' : '' }}>Rencontre</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Type AR -->
                                <div class="sm:col-span-3">
                                    <label for="type_ar" class="block text-sm/6 font-medium text-gray-900">Type (AR)</label>
                                    <div class="mt-2 grid grid-cols-1">
                                        <select name="type_ar" id="type_ar"
                                            class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required dir="rtl">
                                            <option value="" disabled {{ old('type_ar') ? '' : 'selected' }}>اختر نوعًا</option>
                                            <option value="Conference" {{ old('type_ar') === 'Conference' ? 'selected' : '' }}>مؤتمر</option>
                                            <option value="Workshop" {{ old('type_ar') === 'Workshop' ? 'selected' : '' }}>ورشة عمل</option>
                                            <option value="Seminar" {{ old('type_ar') === 'Seminar' ? 'selected' : '' }}>ندوة</option>
                                            <option value="Meetup" {{ old('type_ar') === 'Meetup' ? 'selected' : '' }}>لقاء</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Description FR -->
                                <div class="col-span-full">
                                    <label for="description_fr" class="block text-sm/6 font-medium text-gray-900">Description (FR)</label>
                                    <div class="mt-2">
                                        <textarea name="description_fr" id="description_fr" rows="3"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            placeholder="Entrez une description en français">{{ old('description_fr') }}</textarea>
                                    </div>
                                </div>

                                <!-- Description AR -->
                                <div class="col-span-full">
                                    <label for="description_ar" class="block text-sm/6 font-medium text-gray-900">Description (AR)</label>
                                    <div class="mt-2">
                                        <textarea name="description_ar" id="description_ar" rows="3"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            dir="rtl" placeholder="أدخل وصفًا بالعربية">{{ old('description_ar') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Date and Status Section -->
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-900">Dates et Statut</h2>
                            <p class="mt-1 text-sm/6 text-gray-600">Définissez les dates et le statut de l'événement.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <!-- Date Début -->
                                <div class="sm:col-span-3">
                                    <label for="date_debut" class="block text-sm/6 font-medium text-gray-900">Date Début</label>
                                    <div class="mt-2">
                                        <input type="date" name="date_debut" id="date_debut" value="{{ old('date_debut') }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required>
                                    </div>
                                </div>

                                <!-- Date Fin -->
                                <div class="sm:col-span-3">
                                    <label for="date_fin" class="block text-sm/6 font-medium text-gray-900">Date Fin</label>
                                    <div class="mt-2">
                                        <input type="date" name="date_fin" id="date_fin" value="{{ old('date_fin') }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="sm:col-span-3">
                                    <label for="status" class="block text-sm/6 font-medium text-gray-900">Statut</label>
                                    <div class="mt-2 grid grid-cols-1">
                                        <select name="status" id="status"
                                            class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                            required>
                                            <option value="" disabled {{ old('status') ? '' : 'selected' }}>Sélectionnez un statut</option>
                                            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Actif</option>
                                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactif</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Links (Dynamic Inputs) -->
                                <div class="col-span-full">
                                    <label for="links" class="block text-sm/6 font-medium text-gray-900">Liens (URLs)</label>
                                    <div class="mt-2" id="links-container">
                                        <div class="flex items-center gap-x-3 mb-2">
                                            <input type="url" name="links[]" value="{{ old('links.0') }}"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                                                placeholder="https://example.com">
                                            <button type="button" id="add-link" class="flex items-center rounded-md bg-indigo-600 px-2 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                                <span class="material-symbols-outlined">add</span>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="mt-3 text-sm/6 text-gray-600">Ajoutez des liens supplémentaires en cliquant sur le bouton "+".</p>
                                </div>
                            </div>
                        </div>

                        <!-- Image, Video and Gallery Upload Section -->
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-900">Médias</h2>
                            <p class="mt-1 text-sm/6 text-gray-600">Ajoutez une image principale, une vidéo et une galerie d'images pour l'événement.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <!-- Image Upload with Drag and Drop -->
                                <div class="col-span-full">
                                    <label for="image" class="block text-sm/6 font-medium text-gray-900">Image</label>
                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 image-drop-area" id="image-drop-area">
                                        <div class="text-center">
                                            <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                            </svg>
                                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                                <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 2MB</p>
                                        </div>
                                    </div>
                                    <p id="image-file-name" class="mt-2 text-sm/6 text-gray-600"></p>
                                </div>

                                <!-- Video Upload with Drag and Drop -->
                                <div class="col-span-full">
                                    <label for="video" class="block text-sm/6 font-medium text-gray-900">Vidéo</label>
                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 video-drop-area" id="video-drop-area">
                                        <div class="text-center">
                                            <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd" />
                                            </svg>
                                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                                <label for="video" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500">
                                                    <span>Upload a video</span>
                                                    <input id="video" name="video" type="file" class="sr-only" accept="video/*">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs/5 text-gray-600">MP4, AVI, MOV up to 50MB</p>
                                        </div>
                                    </div>
                                    <p id="video-file-name" class="mt-2 text-sm/6 text-gray-600"></p>
                                </div>

                                <!-- Gallery Upload with Drag and Drop (Multiple Files) -->
                                <div class="col-span-full">
                                    <label for="gallery" class="block text-sm/6 font-medium text-gray-900">Galerie (Images multiples)</label>
                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 gallery-drop-area" id="gallery-drop-area">
                                        <div class="text-center">
                                            <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                            </svg>
                                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                                <label for="gallery" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500">
                                                    <span>Upload files</span>
                                                    <input id="gallery" name="gallery[]" type="file" class="sr-only" accept="image/*" multiple>
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 5MB total</p>
                                        </div>
                                    </div>
                                    <p id="gallery-file-name" class="mt-2 text-sm/6 text-gray-600"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('admin.evenements.index') }}" class="text-sm/6 font-semibold text-gray-900">Annuler</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Créer l'Événement</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for File Input Display and Dynamic Links -->
<script>
    // Prevent default drag behaviors
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Highlight drop area
    function highlight(area) {
        area.classList.add('border-indigo-600', 'bg-indigo-50');
    }

    // Unhighlight drop area
    function unhighlight(area) {
        area.classList.remove('border-indigo-600', 'bg-indigo-50');
    }

    // Image Drag and Drop
    const imageInput = document.getElementById('image');
    const imageDropArea = document.getElementById('image-drop-area');

    imageInput.addEventListener('change', function(event) {
        const fileName = event.target.files[0] ? event.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('image-file-name').textContent = fileName;
    });

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        imageDropArea.addEventListener(eventName, preventDefaults, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        imageDropArea.addEventListener(eventName, () => highlight(imageDropArea), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        imageDropArea.addEventListener(eventName, () => unhighlight(imageDropArea), false);
    });

    imageDropArea.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        imageInput.files = files;
        const fileName = files[0] ? files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('image-file-name').textContent = fileName;
    }, false);

    // Video Drag and Drop
    const videoInput = document.getElementById('video');
    const videoDropArea = document.getElementById('video-drop-area');

    videoInput.addEventListener('change', function(event) {
        const fileName = event.target.files[0] ? event.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('video-file-name').textContent = fileName;
    });

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        videoDropArea.addEventListener(eventName, preventDefaults, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        videoDropArea.addEventListener(eventName, () => highlight(videoDropArea), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        videoDropArea.addEventListener(eventName, () => unhighlight(videoDropArea), false);
    });

    videoDropArea.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        videoInput.files = files;
        const fileName = files[0] ? files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('video-file-name').textContent = fileName;
    }, false);

    // Gallery Drag and Drop (Append Files)
    const galleryInput = document.getElementById('gallery');
    const galleryDropArea = document.getElementById('gallery-drop-area');

    galleryInput.addEventListener('change', function(event) {
        const files = event.target.files;
        const fileNames = files.length ? Array.from(files).map(file => file.name).join(', ') : 'Aucun fichier sélectionné';
        document.getElementById('gallery-file-name').textContent = fileNames;
    });

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        galleryDropArea.addEventListener(eventName, preventDefaults, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        galleryDropArea.addEventListener(eventName, () => highlight(galleryDropArea), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        galleryDropArea.addEventListener(eventName, () => unhighlight(galleryDropArea), false);
    });

    galleryDropArea.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const newFiles = dt.files;

        // Create a new FileList by combining existing and new files
        const existingFiles = galleryInput.files || new FileList();
        const combinedFiles = new DataTransfer();

        // Add existing files
        for (let i = 0; i < existingFiles.length; i++) {
            combinedFiles.items.add(existingFiles[i]);
        }

        // Add new dropped files
        for (let i = 0; i < newFiles.length; i++) {
            combinedFiles.items.add(newFiles[i]);
        }

        galleryInput.files = combinedFiles.files;

        const fileNames = combinedFiles.files.length
            ? Array.from(combinedFiles.files).map(file => file.name).join(', ')
            : 'Aucun fichier sélectionné';
        document.getElementById('gallery-file-name').textContent = fileNames;
    }, false);

    // Add dynamic link inputs
    document.getElementById('add-link').addEventListener('click', function() {
        const container = document.getElementById('links-container');
        const newLinkDiv = document.createElement('div');
        newLinkDiv.className = 'flex items-center gap-x-3 mb-2';
        newLinkDiv.innerHTML = `
            <input type="url" name="links[]"
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-200 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-300 ease-in-out sm:text-sm/6"
                placeholder="https://example.com">
            <button type="button" class="remove-link flex items-center rounded-md bg-red-600 px-2 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-red-500">
                <span class="material-symbols-outlined">remove</span>
            </button>
        `;
        container.appendChild(newLinkDiv);

        newLinkDiv.querySelector('.remove-link').addEventListener('click', function() {
            container.removeChild(newLinkDiv);
        });
    });
</script>

@endsection
