@props(['posts'])

<div class="bg-white rounded-lg border border-gray-200 shadow-sm">
    
    {{-- Search Bar with Better Spacing --}}
    <div class="p-6 border-b border-gray-200">
        <form method="GET" action="{{ route('dashboard.index') }}" class="max-w-md">
            <label for="search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input 
                    type="text" 
                    id="search" 
                    name="search" 
                    value="{{ request('search') }}" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-11 pr-4 py-2.5 transition-colors" 
                    placeholder="Search posts by title..."
                    autocomplete="off"
                >
            </div>
        </form>
    </div>

    {{-- Table Content --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-xs font-semibold text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 text-left">No</th>
                    <th scope="col" class="px-6 py-4 text-left">Image</th>
                    <th scope="col" class="px-6 py-4 text-left">Title</th>
                    <th scope="col" class="px-6 py-4 text-left">Category</th>
                    <th scope="col" class="px-6 py-4 text-left">Published</th>
                    <th scope="col" class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($posts as $post)
                    <tr class="hover:bg-gray-50 transition-colors">
                        {{-- No --}}
                        <td class="px-6 py-4 text-gray-900 font-medium">
                            {{ $posts->firstItem() + $loop->index }}
                        </td>

                        {{-- Image --}}
                        <td class="px-6 py-4">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-14 h-14 rounded-lg object-cover border border-gray-200">
                            @else
                                <div class="w-14 h-14 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </td>

                        {{-- Title --}}
                        <td class="px-6 py-4">
                            <div class="text-gray-900 font-medium">{{ $post->title }}</div>
                        </td>

                        {{-- Category --}}
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                {{ $post->category->name ?? 'Uncategorized' }}
                            </span>
                        </td>

                        {{-- Published At --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $post->created_at->format('d M Y') }}
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                {{-- View Button --}}
                                <a href="{{ route('dashboard.show', $post->slug) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-md font-medium text-xs transition-colors" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                
                                {{-- Edit Button --}}
                                <a href="{{ route('dashboard.edit', $post->slug) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-50 text-amber-700 hover:bg-amber-100 rounded-md font-medium text-xs transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>

                                {{-- Delete Button --}}
                                <form action="{{ route('dashboard.destroy', $post->slug) }}" method="post" class="inline-block delete-form">
                                    @method('delete')
                                    @csrf
                                    <button type="button" class="btn-delete inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 rounded-md font-medium text-xs transition-colors border-none cursor-pointer" data-post-title="{{ $post->title }}" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="text-gray-500 font-medium mb-2">No posts found</p>
                                <p class="text-sm text-gray-400 mb-4">Get started by creating your first post</p>
                                <a href="{{ route('dashboard.create') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium text-sm">
                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Create your first post
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($posts->hasPages())
    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
        {{ $posts->links() }}
    </div>
    @endif
</div>

{{-- Custom Delete Confirmation Modal --}}
<div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-5">Delete Post</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    Are you sure you want to delete this post?
                </p>
                <p class="text-sm font-semibold text-gray-700 mt-2" id="modalPostTitle"></p>
            </div>
            <div class="flex gap-4 px-4 py-3">
                <button id="cancelDelete" class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 text-base font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Cancel
                </button>
                <button id="confirmDelete" class="flex-1 px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let formToSubmit = null;

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('deleteModal');
    const modalTitle = document.getElementById('modalPostTitle');
    const confirmBtn = document.getElementById('confirmDelete');
    const cancelBtn = document.getElementById('cancelDelete');
    const deleteButtons = document.querySelectorAll('.btn-delete');

    // Attach click handlers to delete buttons
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const postTitle = this.getAttribute('data-post-title');
            const form = this.closest('form');

            // Store form for later submission
            formToSubmit = form;

            // Update modal content
            modalTitle.textContent = '"' + postTitle + '"';

            // Show modal
            modal.classList.remove('hidden');
        });
    });

    // Confirm delete
    confirmBtn.addEventListener('click', function() {
        if (formToSubmit) {
            formToSubmit.submit();
        }
        modal.classList.add('hidden');
    });

    // Cancel delete
    cancelBtn.addEventListener('click', function() {
        formToSubmit = null;
        modal.classList.add('hidden');
    });

    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            formToSubmit = null;
            modal.classList.add('hidden');
        }
    });
});
</script>