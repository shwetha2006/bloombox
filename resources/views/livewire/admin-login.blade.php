<!-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        @if (session()->has('error'))
            <div class="mb-4 font-medium text-sm text-red-600">{{ session('error') }}</div>
        @endif

        <div class="text-center text-2xl font-bold mb-6">Admin Login</div>

        <form wire:submit.prevent="login">
            <div class="mt-4">
                <x-label for="email" value="Email" />
                <x-input id="email" class="block mt-1 w-full" type="email" wire:model="email" required autofocus />
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-label for="password" value="Password" />
                <x-input id="password" class="block mt-1 w-full" type="password" wire:model="password" required />
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3 bg-red-600 hover:bg-red-700">
                    Admin Login
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> -->
