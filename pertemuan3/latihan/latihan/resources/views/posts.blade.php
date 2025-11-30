<x-layout>
    <x-slot:title>
        All Posts
    </x-slot:title>

    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">All Posts</h1>
        <p class="text-gray-600">Browse through our collection of articles and tutorials</p>
    </div>

    <!-- Posts Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
        <article class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden group">
            <!-- Post Header with Category Badge -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-4">
                <span class="inline-block bg-white text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">
                    {{ $post->category->name }}
                </span>
            </div>

            <!-- Post Content -->
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition">
                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                </h2>

                <p class="text-gray-600 mb-4 line-clamp-3">{{ $post->excerpt }}</p>

                <!-- Post Meta -->
                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        {{ $post->author->name }}
                    </span>
                    <span>{{ $post->created_at->diffForHumans() }}</span>
                </div>

                <!-- Read More Button -->
                <a href="/posts/{{ $post->slug }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Read More
                </a>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Empty State -->
    @if($posts->isEmpty())
    <div class="text-center py-12">
        <div class="text-6xl mb-4">📝</div>
        <h3 class="text-2xl font-bold text-gray-700 mb-2">No Posts Yet</h3>
        <p class="text-gray-500">Check back later for new content!</p>
    </div>
    @endif
</x-layout>