<x-app-layout>
    <x-slot name="header">
        <div class="block flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit user') }}
            </h2>
            <x-button class="ml-auto">
                <a href="{{ route('users') }}">
                    {{ __('Disacrd') }}
                </a>
            </x-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <center>
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </center>

                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="__($user->name)" autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="__($user->email)" />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4">
                            <x-label for="phone" :value="__('Phone')" />

                            <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="__($user->phone)" placeholder="888 888 8888" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" maxlength="12" />
                        </div>

                        <!-- Status -->
                        <div class="flex mt-4">
                            <div class="w-40">
                                <x-label for="status" :value="__('Status')" />

                                <x-select class="block mt-1 w-full" selected="{{ $user->status }}" />
                            </div>

                            <div class="ml-auto w-40">
                                <x-label for="upline" :value="__('Upline')" />

                                <x-select name='upline' :options="$users" class="block mt-1 w-full" selected="{{ $user->upline }}" />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        {{-- <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password*')" />

                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                        </div> --}}

                        <!-- Submit -->
                        <div class="flex mt-4">
                            <x-button class="ml-auto">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
