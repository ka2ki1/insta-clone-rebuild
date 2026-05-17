<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規投稿
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label class="block font-medium text-sm text-gray-700">画像</label>
                        <input type="file" name="image" class="mt-1 block w-full">
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700">キャプション</label>
                        <textarea name="caption" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        @error('caption')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button class="px-4 py-2 bg-gray-800 text-white rounded-md">
                            投稿する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
