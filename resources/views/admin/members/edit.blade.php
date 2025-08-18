@extends('admin.layouts.layout')
@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <!-- Page Title -->
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Modifier un Membre</h2>
                    <p class="text-gray-600">Modifiez les informations du membre ci-dessous.</p>
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

                <!-- Success Message -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('admin.members.update', $member->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')
                    <div class="border-b border-gray-900/10 pb-8">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                            <!-- Name -->
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-900">Nom</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}"
                                        class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none"
                                        placeholder="Entrez le nom" required>
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                                <div class="mt-2">
                                    <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}"
                                        class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none"
                                        placeholder="Entrez l'email" required>
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="sm:col-span-3">
                                <label for="password" class="block text-sm font-medium text-gray-900">Nouveau Mot de Passe (facultatif)</label>
                                <div class="mt-2">
                                    <input type="password" name="password" id="password"
                                        class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none"
                                        placeholder="Entrez un nouveau mot de passe">
                                    @error('password')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="sm:col-span-3">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Confirmer le Nouveau Mot de Passe</label>
                                <div class="mt-2">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none"
                                        placeholder="Confirmez le mot de passe" autocomplete="off">
                                    @error('password_confirmation')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Is Active -->
                            <div class="sm:col-span-3">
                                <label for="is_active" class="block text-sm font-medium text-gray-900">Statut</label>
                                <div class="mt-2">
                                    <select name="is_active" id="is_active"
                                        class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none">
                                        <option value="1" {{ old('is_active', $member->is_active) ? 'selected' : '' }}>Actif</option>
                                        <option value="0" {{ !old('is_active', $member->is_active) ? 'selected' : '' }}>Inactif</option>
                                    </select>
                                    @error('is_active')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-end gap-x-6">
                        <a href="{{ route('admin.members.index') }}" class="text-sm font-semibold text-gray-900 hover:text-gray-700">
                            Annuler
                        </a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Mettre à Jour le Membre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection