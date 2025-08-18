<x-guest-layout>
    <!-- Title and Paragraph -->
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Connexion des Membres</h2>
        <p class="mt-2 text-gray-600">
            Bienvenue sur votre espace membre ! Veuillez entrer vos identifiants ci-dessous pour accéder à votre espace personnel. Si vous rencontrez des problèmes, contactez l'administration.
        </p>
    </div>

    <!-- Error Message for Inactive Account -->
    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login-membre') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remove Confirm Password (Not Needed for Login) -->
        <!-- The confirm password field was incorrectly included in a login form -->

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>