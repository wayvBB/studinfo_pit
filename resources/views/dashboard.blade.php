<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <!--{{ __("Welcome back, " . Auth::user()->name . "!") }}-->
            @auth
                <h1>Welcome, {{ Auth::user()->name }}</h1>
                <!-- User content here -->
            @else
                <script>window.location = "/login";</script>
            @endauth
        </h2>
    </x-slot>

    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <!-- Where you want the chart to appear -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Area Chart Demo</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>

            @push('scripts')
                <!-- Load Chart.js first -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                
                <!-- Then load specific demo -->
                <script src="{{ asset('vendor/sb-admin/assets/demo/chart-area-demo.js') }}"></script>
            @endpush

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-3">Manage: </h3>
                    <div class="mt-6 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                        <!-- Reusable Block for Navigation Links -->
                        <a href="{{ route('students.index') }}" class="block bg-red-600 hover:bg-rose-700 text-white font-semibold py-2 px-4 rounded text-center flex flex-col items-center justify-center">
                           <i class="fa-solid fa-person mb-2"></i>
                           Students
                        </a>
                
                        <a href="{{ route('enroll.index') }}" class="block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-center flex flex-col items-center justify-center">
                            <i class="fa-solid fa-book mb-2"></i>
                            Enrollments
                        </a>

                        <a href="{{ route('subjects.index') }}" class="block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-center flex flex-col items-center justify-center">
                            <i class="fa-solid fa-chalkboard-teacher mb-2"></i>
                            Subjects
                        </a>

                        <a href="{{ route('loads.index') }}" class="block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-center flex flex-col items-center justify-center">
                            <i class="fa-solid fa-laptop mb-2"></i>
                            Loads
                        </a>

                        <a href="{{ route('instructors.index') }}" class="block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-center flex flex-col items-center justify-center">
                            <i class="fa-solid fa-users mb-2"></i>
                            Instructors
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom of your template -->
<script src="{{ asset('vendor/sb-admin/assets/demo/chart-area-demo.js') }}"></script>
</x-app-layout>