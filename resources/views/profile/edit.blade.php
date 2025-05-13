<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Display Current Avatar -->
            <div class="flex items-center space-x-4">
                <div>
                    @if (Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                            alt="Profile Picture"
                            style="width: 150px; height: 150px;" class="rounded-full object-cover border" />
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}"
                            alt="Default Avatar"
                            class="w-auto h-6 rounded-full object-cover border" />
                    @endif
                </div>
                <div>
                    <p class="text-sm text-gray-700 dark:text-gray-600 ml-4"> (Current Profile Picture)</p>
                </div>
            </div>


            <!-- Avatar Upload Field -->
            <form method="POST" action="{{ route('profile.update.avatar') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mt-4">
                    <x-input-label for="avatar" :value="__('Profile Picture')" />
                    <input id="avatar" type="file" name="avatar" class="mt-1 block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-violet-50 file:text-violet-700
                        hover:file:bg-violet-100" />
                    <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                </div>

                <div class="flex items-center gap-4 mt-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    @if (session('status') === 'profile-updated')
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Profile updated.') }}</p>
                    @endif
                </div>
            </form>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
