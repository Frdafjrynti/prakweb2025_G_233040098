<x-layout>
    <x-slot:title>
        {{ $post->title }}
    </x-slot:title>

    <article class="max-w-4xl mx-auto py-8 px-4">
        <header class="mb-8">
            {{-- Judul Post --}}
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

            {{-- Meta Data (Author, Category, Date) --}}
            <div class="flex items-center text-sm text-gray-600 mb-4">
                <span class="mr-4">By {{ $post->author->name }}</span>
                <span class="mr-4">Category: {{ $post->category->name ?? 'Uncategorized' }}</span>
                <span>{{ $post->created_at->format('d M Y') }}</span>
            </div>

            {{-- Image Check --}}
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                     class="w-full h-64 object-cover rounded-lg mb-6">
            @else
                <img id="preview" class="w-full h-64 object-cover rounded-lg mb-6"
                     src="{{ asset('images/preview.jpg') }}" alt="Image preview">
            @endif
        </header>

        <div class="prose prose-lg max-w-none">
            {{-- Excerpt (Kutipan) --}}
            <p class="text-xl text-gray-600 mb-6">{{ $post->excerpt }}</p>

            {{-- Body (Isi Artikel) --}}
            <div class="text-gray-800 leading-relaxed">
                {!! nl2br(e($post->body)) !!}
            </div>
        </div>

        <footer class="mt-8 pt-8 border-t border-gray-200">
            <div class="flex justify-between items-center">
                {{-- Tombol Kembali --}}
                <a href="{{ route('posts.index') }}"
                   class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                    &larr; Back to Posts
                </a>
            </div>
        </footer>
    </article>
</x-layout>
