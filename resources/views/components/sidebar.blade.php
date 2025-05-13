<!-- resources/views/components/sidebar.blade.php -->
<div id="sidebar" class="w-64 h-screen bg-gray-800 text-white overflow-y-auto">
    <div class="p-6">
        <h3 class="text-lg font-semibold mb-6">Student</h3>
        
        <!-- Dashboard Section -->
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-white hover:bg-gray-700 rounded-lg">
                <i class="fa-solid fa-tachometer-alt mr-2"></i> Dashboard
            </a>
        </div>

        <!-- Academic Management Section -->
        <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-2">Academic Management</h4>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('students.index') }}" class="flex items-center p-2 text-white hover:bg-gray-700 rounded-lg">
                        <i class="fa-solid fa-person mr-2"></i> Students
                    </a>
                </li>
                <li>
                    <a href="{{ route('enroll.index') }}" class="flex items-center p-2 text-white hover:bg-gray-700 rounded-lg">
                        <i class="fa-solid fa-book mr-2"></i> Enrollments
                    </a>
                </li>
                <li>
                    <a href="{{ route('subjects.index') }}" class="flex items-center p-2 text-white hover:bg-gray-700 rounded-lg">
                        <i class="fa-solid fa-chalkboard-teacher mr-2"></i> Subjects
                    </a>
                </li>
            </ul>
        </div>

        <!-- Faculty Management Section -->
        <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-2">Faculty Management</h4>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('loads.index') }}" class="flex items-center p-2 text-white hover:bg-gray-700 rounded-lg">
                        <i class="fa-solid fa-laptop mr-2"></i> Loads
                    </a>
                </li>
                <li>
                    <a href="{{ route('instructors.index') }}" class="flex items-center p-2 text-white hover:bg-gray-700 rounded-lg">
                        <i class="fa-solid fa-users mr-2"></i> Instructors
                    </a>
                </li>
            </ul>
        </div>

        <!-- System Section -->
        <div>
            <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-2">System</h4>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('instructors.index') }}" class="flex items-center p-2 text-white hover:bg-gray-700 rounded-lg">
                        <i class="fa-solid fa-clock-rotate-left mr-2"></i> History
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}" class="flex items-center p-2 text-white hover:bg-gray-700 rounded-lg">
                        <i class="fa-solid fa-circle-question mr-2"></i> Help
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>