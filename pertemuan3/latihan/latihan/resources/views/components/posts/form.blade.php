@props(['categories', 'post' => null])

{{-- Form Start --}}
<form action="{{ $post ? route('dashboard.update', $post->slug) : route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($post)
        @method('PUT')
    @endif

    <div class="grid gap-6 sm:grid-cols-2">

        {{-- 1. Input Title --}}
        <div class="sm:col-span-2">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                Title <span class="text-red-500">*</span>
            </label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('title') border-red-500 bg-red-50 @enderror"
                placeholder="Enter an engaging post title"
                required>
            @error('title')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- 2. Input Category --}}
        <div class="sm:col-span-2">
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">
                Category <span class="text-red-500">*</span>
            </label>
            <select name="category_id" id="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('category_id') border-red-500 bg-red-50 @enderror"
                required>
                <option value="">Choose a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- 3. Input Excerpt --}}
        <div class="sm:col-span-2">
            <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900">
                Excerpt <span class="text-red-500">*</span>
            </label>
            <textarea name="excerpt" id="excerpt" rows="3"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('excerpt') border-red-500 bg-red-50 @enderror"
                placeholder="Write a brief summary of your post (this will appear in post previews)"
                required>{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
            @error('excerpt')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- 4. Input Body/Content --}}
        <div class="sm:col-span-2">
            <label for="body" class="block mb-2 text-sm font-medium text-gray-900">
                Content <span class="text-red-500">*</span>
            </label>
            <textarea name="body" id="body" rows="12"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('body') border-red-500 bg-red-50 @enderror"
                placeholder="Write your full post content here..."
                required>{{ old('body', $post->body ?? '') }}</textarea>
            @error('body')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- 5. Input Upload Image --}}
        <div class="sm:col-span-2">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">
                Featured Image
                @if(!$post)
                    <span class="text-gray-500 font-normal">(Optional)</span>
                @endif
            </label>

            {{-- Preview gambar --}}
            @if($post && $post->image)
                <div class="mb-4 relative">
                    <p class="text-xs text-gray-500 mb-2">Current image:</p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Current image" id="imagePreview" class="w-full max-w-md h-48 object-cover rounded-lg border border-gray-200">
                </div>
            @else
                <img id="imagePreview" class="hidden w-full max-w-md h-48 object-cover rounded-lg border border-gray-200 mb-4">
            @endif

            <div class="flex items-center justify-center w-full">
                <label for="image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX. 2MB)</p>
                    </div>
                    <input type="file" name="image" id="image" class="hidden" accept="image/png, image/jpeg, image/jpg" onchange="previewImage()">
                </label>
            </div>
            <p class="mt-2 text-xs text-gray-500">{{ $post ? 'Upload a new image to replace the current one' : 'Add a featured image to make your post stand out' }}</p>
            @error('image')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

    </div>

    {{-- Form Footer --}}
    <div class="flex items-center gap-3 border-t border-gray-200 pt-6 mt-6">
        <button type="submit"
            class="inline-flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-6 py-2.5 transition-colors focus:outline-none">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            {{ $post ? 'Update Post' : 'Publish Post' }}
        </button>
        <a href="{{ route('dashboard.index') }}"
            class="inline-flex items-center justify-center text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-6 py-2.5 transition-colors focus:outline-none">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            Cancel
        </a>
    </div>
</form>

{{-- Script untuk Preview Image --}}
<script>
function previewImage() {
    const input = document.getElementById('image');
    const preview = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
