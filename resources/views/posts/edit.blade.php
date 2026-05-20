<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <img
                    src="{{ asset('storage/' . $post->image) }}"
                    style="width: 100%; height: 400px; object-fit: cover;"
                    class="rounded">

                <form method="POST" action="{{ route('posts.update', $post) }}" class="mt-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-medium text-sm text-gray-700">
                            キャプション
                        </label>

                        <textarea
                            name="caption"
                            rows="4"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('caption', $post->caption) }}</textarea>
                    </div>

                    <button class="mt-4 px-4 py-2 bg-gray-800 text-white rounded-md">
                        更新
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
