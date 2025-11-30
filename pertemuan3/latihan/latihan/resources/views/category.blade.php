<x-layout>
    <x-slot:title>Categories</x-slot:title>

    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">All Categories</h1>
        <p class="text-gray-600">Browse posts by category</p>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($categories as $category)
            <article class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                <!-- Category Header dengan Gradient -->
                <div class="h-32 bg-gradient-to-br from-blue-500 to-purple-600 rounded-t-lg flex items-center justify-center">
                    <h2 class="text-3xl font-bold text-white">{{ $category->name }}</h2>
                </div>
                
                <!-- Category Body -->
                <div class="p-6">
                    <!-- Slug -->
                    <div class="mb-4">
                        <span class="inline-block bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">
                            {{ $category->slug }}
                        </span>
                    </div>

                    <!-- Posts Count -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="font-semibold">{{ $category->posts_count }} Posts</span>
                        </div>
                    </div>

                    <!-- View Category Button -->
                    <a href="#" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                        View Posts
                    </a>
                </div>
            </article>
        @empty
            <!-- Jika tidak ada kategori -->
            <div class="col-span-full">
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-8 text-center">
                    <svg class="w-16 h-16 text-yellow-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">No Categories Found</h3>
                    <p class="text-gray-600">There are no categories available at the moment.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Statistics Section -->
    <div class="mt-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg shadow-lg p-8 text-white">
        <div class="text-center">
            <h3 class="text-2xl font-bold mb-2">Total Categories</h3>
            <p class="text-5xl font-bold">{{ $categories->count() }}</p>
            <p class="text-blue-100 mt-2">Categories available in our blog</p>
        </div>
    </div>
</x-layout>