<x-dashboard-layout>
    <x-slot:title>
        Create New Post - Dashboard
    </x-slot:title>

    {{-- Page Header --}}
    <div class="mb-8">
        <div class="flex items-center justify-between mb-2">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Create New Post</h1>
                <p class="text-gray-600 mt-1">Fill in the information below to create a new blog post.</p>
            </div>
            <a href="{{ route('dashboard.index') }}" class="inline-flex items-center text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Posts
            </a>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">Post Information</h2>
            <p class="text-sm text-gray-600 mt-1">Enter the details for your new post</p>
        </div>

        <div class="p-6">
            <x-posts.form :categories="$categories" />
        </div>
    </div>
</x-dashboard-layout>