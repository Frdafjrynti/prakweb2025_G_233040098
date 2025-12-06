@props(['categories', 'post' => null])

{{-- Form Start --}}
<form action="{{ $post ? route('dashboard.update', $post->slug) : route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($post)
        @method('PUT')
    @endif
    
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        
        {{-- 1. Input Title --}}
        <div class="sm:col-span-2">
            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body @error('title') border-red-500 @enderror"
                placeholder="Enter post title">
            {{-- Pesan Error Title --}}
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- 2. Input Category --}}
        <div class="sm:col-span-2">
            <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">Category</label>
            <select name="category_id" id="category_id"
                class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body @error('category_id') border-red-500 @enderror">
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            {{-- Pesan Error Category --}}
            @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- 3. Input Excerpt --}}
        <div class="sm:col-span-2">
            <label for="excerpt" class="block mb-2.5 text-sm font-medium text-heading">Excerpt</label>
            <textarea name="excerpt" id="excerpt" rows="3"
                class="block bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand w-full p-3.5 shadow-xs placeholder:text-body @error('excerpt') border-red-500 @enderror"
                placeholder="Write a short excerpt or summary">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
            {{-- Pesan Error Excerpt --}}
            @error('excerpt')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- 4. Input Body/Content --}}
        <div class="sm:col-span-2">
            <label for="body" class="block mb-2.5 text-sm font-medium text-heading">Content</label>
            <textarea name="body" id="body" rows="8"
                class="block bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand w-full p-3.5 shadow-xs placeholder:text-body @error('body') border-red-500 @enderror"
                placeholder="Write your post content here">{{ old('body', $post->body ?? '') }}</textarea>
            {{-- Pesan Error Body --}}
            @error('body')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- 5. Input Upload Image --}}
        <div class="sm:col-span-2">
            <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Upload Image</label>

            {{-- Preview gambar lama jika ada --}}
            @if($post && $post->image)
                <div class="mb-3">
                    <p class="text-sm text-body mb-2">Current image:</p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Current image" class="w-32 h-32 object-cover rounded-base border border-default">
                </div>
            @endif

            <input
                type="file"
                name="image"
                id="image"
                accept="image/png, image/jpeg, image/jpg"
                class="cursor-pointer bg-neutral-secondary-medium border text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body @error('image') border-red-500 @enderror">
            <p class="mt-1 text-xs text-body">{{ $post ? 'Leave empty to keep current image' : 'Optional' }}</p>
            {{-- Pesan Error Image --}}
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

    </div>

    {{-- Form Footer --}}
    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6 et-4 md:mt-6">
        <button type="submit"
            class="inline-flex items-center text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-xs px-4 py-2.5 focus:outline-none">
            {{ $post ? 'Update Post' : 'Create Post' }}
        </button>
        <a href="{{ route('dashboard.index') }}"
            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
            Cancel
        </a>
    </div>
</form>