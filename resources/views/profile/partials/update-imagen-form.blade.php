<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Imagen de perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Actualice la imagen de perfil.') }}
        </p>
    </header>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.actualizarImagen') }}"  enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <div>
            <img src="{{  asset('storage/nombre_img/' . $user->imagen) }}" alt="Imagen de perfil de {{ $user->name }}" class="w-50 h-40 rounded-[2vw]">
        </div>

        <!-- Imagen -->
        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" :value="old('imagen')"
                required autofocus autocomplete="imagen" />
            <x-input-error class="mt-2" :messages="$errors->get('imagen')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-actualizarImagen')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
