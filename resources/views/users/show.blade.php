<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }} さんのページ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow rounded p-6 mb-6">
                <h3 class="text-2xl font-bold">{{ $user->name }}</h3>
                <p class="text-gray-500 mt-2">{{ $user->email }}</p>
                <p class="mt-4">投稿数：{{ $user->posts->count() }}</p>
            </div>

            <div class="grid grid-cols-3 gap-2">
                @foreach($user->posts as $post)
                <img
                    src="{{ asset('storage/' . $post->image) }}"
                    style="width: 100%; height: 200px; object-fit: cover;"
                    class="rounded">
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
