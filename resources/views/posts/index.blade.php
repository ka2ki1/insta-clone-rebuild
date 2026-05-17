<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto space-y-6">

            @foreach($posts as $post)
                <div class="bg-white shadow rounded p-6">
                    <p class="font-bold">{{ $post->user->name }}</p>

                    <img
                        src="{{ asset('storage/' . $post->image) }}"
                        class="w-full mt-4 rounded"
                    >

                    <p class="mt-4">{{ $post->caption }}</p>

                    <p class="text-sm text-gray-500 mt-2">
                        {{ $post->created_at->format('Y/m/d H:i') }}
                    </p>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
