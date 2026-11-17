<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        <strong>Selamat datang di NAWARA!</strong>
        <p class="mt-2">
            Demi keamanan akun, silakan ganti password sementara
            sebelum melanjutkan menggunakan aplikasi.
        </p>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="current_password" value="Password Sementara" />
            <x-text-input id="current_password"
                class="block mt-1 w-full"
                type="password"
                name="current_password"
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Password Baru" />
            <x-text-input id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Konfirmasi Password Baru" />
            <x-text-input id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required autocomplete="new-password" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                Ganti Password
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
