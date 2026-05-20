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
                <a href="{{ route('users.show', $post->user) }}" class="font-bold text-blue-600">
                    {{ $post->user->name }}
                </a>

                <img
                    src="{{ asset('storage/' . $post->image) }}"
                    class="w-full h-[500px] object-cover mt-4 rounded">

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

                <a
                    href="{{ route('posts.edit', $post) }}"
                    class="text-blue-600 mr-4">
                    編集
                </a>

                @if($post->user_id === auth()->id())
                <form method="POST" action="{{ route('posts.destroy', $post) }}" class="mt-4">
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="text-red-600"
                        onclick="return confirm('本当に削除しますか？')">
                        削除
                    </button>
                </form>
                @endif
                {{-- ここにコメント機能 --}}
                <div class="mt-4 border-t pt-4">
                    @foreach($post->comments as $comment)
                    <div class="text-sm mb-2">
                        <span class="font-bold">{{ $comment->user->name }}</span>
                        <span>{{ $comment->body }}</span>
                    </div>
                    @endforeach

                    <form method="POST" action="{{ route('comments.store', $post) }}" class="mt-3">
                        @csrf

                        <input
                            type="text"
                            name="body"
                            placeholder="コメントを追加..."
                            class="w-full border-gray-300 rounded-md shadow-sm">

                        <button class="mt-2 px-4 py-2 bg-gray-800 text-white rounded-md">
                            コメント
                        </button>
                    </form>
                </div>


            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
