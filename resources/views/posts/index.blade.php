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
                        class="w-full h-[500px] object-cover mt-4 rounded"
                    >

                    <p class="mt-4">{{ $post->caption }}</p>

                    <p class="text-sm text-gray-500 mt-2">
                        {{ $post->created_at->format('Y/m/d H:i') }}
                    </p>

                    <form method="POST" action="{{ route('posts.like', $post) }}" class="mt-4">
                        @csrf

                        <button type="submit" class="text-2xl">
                            @if(auth()->user()->likedPosts->contains($post->id))
                                ❤️
                            @else
                                🤍
                            @endif
                        </button>

                        <span class="ml-2">
                            {{ $post->likedUsers->count() }} 件
                        </span>
                    </form>

                    @if($post->user_id === auth()->id())
                        <form method="POST" action="{{ route('posts.destroy', $post) }}" class="mt-4">
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="text-red-600"
                                onclick="return confirm('本当に削除しますか？')"
                            >
                                削除
                            </button>
                        </form>
                    @endif

                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
