<div class="container mx-auto">
    @if ($errors->any())
        <div class="bg-red-200 relative text-red-500 py-3 px-3 rounded-lg">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if (session('success'))
        <div class="bg-green-200 relative text-green-500 py-3 px-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex flex-col mb-4" wire:loading.remove>
        <label
            for="bookmark_file"
            class="mb-2 capitalize font-bold text-lg text-grey-darkest">{{ __('Bookmark file') }} : </label>
        <input
            class="border py-2 px-3 text-grey-darkest @if($errors->has('bookmark_file')) border-2 border-red-500 @endif"
            id="bookmark_file"
            type="file"
            wire:model="bookmarkFile">
    </div>
    <div class="mt-6 mx-auto text-center">
        <div class="relative flex" wire:loading>
            <div class="inline-block animate-spin ease duration-300 w-5 h-5 bg-black mx-2"></div>
            <div class="inline-block animate-spin ease duration-300 w-5 h-5 bg-black mx-2"></div>
            <div class="inline-block animate-ping ease duration-300 w-5 h-5 bg-black mx-2"></div>
            <div class="inline-block animate-pulse ease duration-300 w-5 h-5 bg-black mx-2"></div>
            <div class="inline-block animate-bounce ease duration-300 w-5 h-5 bg-black mx-2"></div>
            <div class="inline-block animate-spin ease duration-300 w-5 h-5 bg-black mx-2"></div>
            <div class="inline-block animate-spin ease duration-300 w-5 h-5 bg-black mx-2"></div>
        </div>
    </div>
</div>
