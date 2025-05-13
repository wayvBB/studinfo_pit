<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create New Subject') }}
            </h2>
            <a href="{{ route('subjects.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('subjects.store') }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Subject Code -->
                            <div>
                                <x-input-label for="subject_code" :value="__('Subject Code')" />
                                <x-text-input id="subject_code" name="subject_code" type="text" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('subject_code')" class="mt-2" />
                            </div>

                            <!-- Subject Name -->
                            <div>
                                <x-input-label for="subject_name" :value="__('Subject Name')" />
                                <x-text-input id="subject_name" name="subject_name" type="text" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('subject_name')" class="mt-2" />
                            </div>

                            <!-- Units -->
                            <div>
                                <x-input-label for="units" :value="__('Units')" />
                                <x-text-input id="units" name="units" type="text" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('units')" class="mt-2" />
                            </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Save Subject') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>