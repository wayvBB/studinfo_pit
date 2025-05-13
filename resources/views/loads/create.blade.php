<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create New Load') }}
            </h2>
            <a href="{{ route('loads.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('loads.store') }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Instructor Dropdown -->
                            <div class="mb-4">
                                <x-input-label for="instructor_id" :value="__('Instructor')" />
                                <select name="instructor_id" id="instructor_id" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 text-gray-900 dark:text-white bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="" disabled selected>Select an Instructor</option>
                                    @foreach($instructors as $instructor)
                                        <option value="{{ $instructor->id }}">
                                            {{ $instructor->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('instructor_id')" class="mt-2" />
                            </div>

                            <!-- Subject Dropdown -->
                            <div class="mb-4">
                                <x-input-label for="subject_id" :value="__('Subject')" />
                                <select name="subject_id" id="subject_id" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 text-gray-900 dark:text-white bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="" disabled selected>Select a Subject</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">
                                            {{ $subject->subject_code }} - {{ $subject->subject_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('subject_id')" class="mt-2" />
                            </div>

                            <!-- Semester Dropdown -->
                            <div>
                                <x-input-label for="semester" :value="__('Semester')" />
                                <select name="semester" id="semester"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 text-gray-900 dark:text-white bg-white dark:bg-gray-800 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500"
                                    required>
                                    <option value="" disabled selected>Select a Semester</option>
                                    <option value="1st Semester">1st Semester</option>
                                    <option value="2nd Semester">2nd Semester</option>
                                </select>
                                <x-input-error :messages="$errors->get('semester')" class="mt-2" />
                            </div>

                            <!-- School Year Dropdown -->
                            <div>
                                <x-input-label for="school_year" :value="__('School Year')" />
                                <select name="school_year" id="school_year"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 text-gray-900 dark:text-white bg-white dark:bg-gray-800 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="" disabled selected>Select a School Year</option>
                                    @for ($year = 2023; $year <= now()->year + 1; $year++)
                                        <option value="{{ $year }}-{{ $year + 1 }}">{{ $year }}-{{ $year + 1 }}</option>
                                    @endfor
                                </select>
                                <x-input-error :messages="$errors->get('school_year')" class="mt-2" />
                            </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Save Load') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>