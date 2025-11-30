<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel App' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="text-xl font-bold text-blue-600">My Laravel App</div>
                <div class="flex space-x-6">
                    <a href="/" class="text-gray-700 hover:text-blue-600 transition">Home</a>
                    <a href="/about" class="text-gray-700 hover:text-blue-600 transition">About</a>
                    <a href="/blog" class="text-gray-700 hover:text-blue-600 transition">Blog</a>
                    <a href="/posts" class="text-gray-700 hover:text-blue-600 transition">Posts</a>
                    <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-blue-600 transition">Categories</a>
                    <a href="/contact" class="text-gray-700 hover:text-blue-600 transition">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        <div class="max-w-7xl mx-auto px-4 py-8">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About Section -->
                <div>
                    <h3 class="text-lg font-bold mb-4">About Us</h3>
                    <p class="text-gray-400">Laravel practice project for learning MVC architecture and Blade templating.</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="/about" class="text-gray-400 hover:text-white transition">About</a></li>
                        <li><a href="/blog" class="text-gray-400 hover:text-white transition">Blog</a></li>
                        <li><a href="/posts" class="text-gray-400 hover:text-white transition">Posts</a></li>
                        <li><a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-white transition">Categories</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact</h3>
                    <p class="text-gray-400">Email: info@laravelapp.com</p>
                    <p class="text-gray-400">Phone: +62 123 4567 890</p>
                    <p class="text-gray-400 mt-2">Bandung, West Java, Indonesia</p>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-gray-700 mt-8 pt-6 text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} Laravel App. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>