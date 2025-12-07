<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite('resources/css/app.css')
    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.0.1/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between items-center py-3 gap-4">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-lg shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-semibold text-gray-900 whitespace-nowrap">Dashboard</span>
                </div>
                <div class="flex flex-wrap items-center gap-4 md:gap-6">
                    <a href="/" class="text-gray-600 hover:text-gray-900 font-medium text-sm transition-colors whitespace-nowrap">Home</a>
                    <a href="/posts" class="text-gray-600 hover:text-gray-900 font-medium text-sm transition-colors whitespace-nowrap">Posts</a>
                    <a href="{{ route('dashboard.index') }}" class="text-blue-600 font-semibold text-sm whitespace-nowrap">My Posts</a>

                    <div class="flex items-center gap-3 pl-4 md:pl-6 border-l border-gray-200">
                        <span class="text-sm text-gray-700 whitespace-nowrap">{{ auth()->user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-3 py-1.5 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors whitespace-nowrap">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        <div class="max-w-7xl mx-auto px-6 py-8">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-6">
            <div class="text-center">
                <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Laravel Dashboard. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
