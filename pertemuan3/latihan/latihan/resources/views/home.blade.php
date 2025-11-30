<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg shadow-xl p-12 mb-8 text-white">
        <h1 class="text-5xl font-bold mb-4">Welcome to My Blog</h1>
        <p class="text-xl mb-6">Discover amazing articles, tutorials, and insights</p>
        <div class="flex space-x-4">
            <a href="/posts" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                Explore Posts
            </a>
            <a href="/about" class="bg-transparent border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                Learn More
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="grid md:grid-cols-3 gap-8 mb-12">
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
            <div class="text-blue-600 text-4xl mb-4">📝</div>
            <h3 class="text-xl font-bold mb-2">Quality Content</h3>
            <p class="text-gray-600">Well-written articles and tutorials on various topics</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
            <div class="text-purple-600 text-4xl mb-4">🗂️</div>
            <h3 class="text-xl font-bold mb-2">Organized Categories</h3>
            <p class="text-gray-600">Find content easily with our organized category system</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
            <div class="text-pink-600 text-4xl mb-4">💡</div>
            <h3 class="text-xl font-bold mb-2">Fresh Ideas</h3>
            <p class="text-gray-600">Get inspired with new perspectives and insights</p>
        </div>
    </div>

    <!-- Quick Links Section -->
    <div class="bg-gray-50 rounded-lg p-8">
        <h2 class="text-3xl font-bold mb-6 text-center">Quick Navigation</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <a href="/posts" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition group">
                <h3 class="text-xl font-bold mb-2 group-hover:text-blue-600">View All Posts</h3>
                <p class="text-gray-600">Browse through our collection of articles</p>
            </a>
            <a href="{{ route('categories.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition group">
                <h3 class="text-xl font-bold mb-2 group-hover:text-purple-600">Browse Categories</h3>
                <p class="text-gray-600">Explore content by category</p>
            </a>
            <a href="/blog" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition group">
                <h3 class="text-xl font-bold mb-2 group-hover:text-green-600">Blog Archive</h3>
                <p class="text-gray-600">Check out our blog archive</p>
            </a>
            <a href="/contact" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition group">
                <h3 class="text-xl font-bold mb-2 group-hover:text-red-600">Get in Touch</h3>
                <p class="text-gray-600">Have questions? Contact us</p>
            </a>
        </div>
    </div>
</x-layout>