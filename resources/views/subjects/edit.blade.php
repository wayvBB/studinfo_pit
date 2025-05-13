<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Subject') }}
            </h2>
            <a href="{{ route('subjects.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                            <p><strong>Error!</strong> Please check the form for errors.</p>
                            <ul class="list-disc pl-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!--<div class="mb-4">
                            <x-input-label for="subject_id" :value="__('Subject ID')" />
                            <x-text-input id="subject_id" class="block mt-1 w-full" type="text" name="subject_id" :value="$subject->subject_id" required />
                        </div>-->

                        <div class="mb-4">
                            <x-input-label for="subject_name" :value="__('Subject Name')" />
                            <x-text-input id="subject_name" class="block mt-1 w-full" type="text" name="subject_name" :value="$subject->subject_name" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="subject_code" :value="__('Subject Code')" />
                            <x-text-input id="subject_code" class="block mt-1 w-full" type="text" name="subject_code" :value="$subject->subject_code" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="units" :value="__('Units')" />
                            <x-text-input id="units" class="block mt-1 w-full" type="text" name="units" :value="$subject->units" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>