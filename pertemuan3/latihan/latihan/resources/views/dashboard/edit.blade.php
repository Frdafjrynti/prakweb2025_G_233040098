<x-dashboard-layout>
    <x-slot:title>
        Edit Post - Dashboard
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Post</h1>
        </div>

        {{-- Form Card --}}
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
            {{-- Form Header --}}
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5 mb-4 md:mb-6">
                <h3 class="text-lg font-medium text-heading">
                    Post Information
                </h3>
            </div>

            {{-- Import Form Component --}}
            {{-- Pass post data untuk edit mode --}}
            <x-posts.form :categories="$categories" :post="$post" />
        </div>
    </div>
</x-dashboard-layout>
