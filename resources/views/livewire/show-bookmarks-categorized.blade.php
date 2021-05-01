<div>
    @forelse($categories as $category)
        <div class="border shadow-lg mt-8 py-1 px-4 border 2xl:shadow-md">
            <div class="border-b-2 mb-3 uppercase p-2 border-black-600 shadow-sm">{{ $category->name }}</div>
            @forelse($category->bookmarks as $bookmark)
                <a target="_blank" href="{{ $bookmark->link }}">
                    <div class="border-b-2 hover:bg-gray-200 m-4 py-2 cursor-pointer">
                        {{ $bookmark->name }}
                    </div>
                </a>
            @empty
                <div> __('No content')</div>
            @endforelse
        </div>
    @empty
        <div class="mt-6 border shadow-lg py-10 px-4 font-bold text-center">
            {{ __('No bookmarks to show') }}
        </div>
    @endforelse
    <div class="mt-6">{{ $categories->links() }}</div>
</div>
