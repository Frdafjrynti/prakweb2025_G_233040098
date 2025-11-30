<x-layout>
    <x-slot:title>Blog</x-slot:title>

    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Our Blog</h1>
        <p class="text-gray-600">Discover the latest articles and tutorials</p>
    </div>

    <!-- Blog Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($posts as $post)
        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
            <div class="h-48 bg-gradient-to-r from-blue-400 to-purple-500"></div>
            <div class="p-6">
                <span class="text-sm text-blue-600 font-semibold">{{ $post->category->name }}</span>
                <h2 class="text-xl font-bold mt-2 mb-3">{{ $post->title }}</h2>
                <p class="text-gray-600 mb-4 line-clamp-2">{{ $post->excerpt }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">{{ $post->created_at->format('F d, Y') }}</span>
                    <a href="/posts/{{ $post->slug }}" class="text-blue-600 hover:text-blue-800 font-medium">Read More →</a>
                </div>
            </div>
        </article>
        @empty
        <div class="col-span-full text-center py-12">
            <div class="text-6xl mb-4">📝</div>
            <h3 class="text-2xl font-bold text-gray-700 mb-2">No Posts Yet</h3>
            <p class="text-gray-500">Check back later for new content!</p>
        </div>
        @endforelse
    </div>

    <!-- View All Button -->
    @if($posts->count() > 0)
    <div class="mt-12 text-center">
        <a href="/posts" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
            View All Posts
        </a>
    </div>
    @endif
</x-layout>
