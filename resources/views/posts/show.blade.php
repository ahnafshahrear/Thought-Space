<x-layout>
    <div class="card shadow-lg p-3 mb-3">
        <div class="card-body">
            <h3 class="card-title">{{ $post->title }}</h3>
            <h6 class="card-subtitle mb-2 text-body-secondary">Posted {{ $post->created_at->diffForHumans() }} by <a href="{{ route('posts.user', $post->user)  }}">{{ $post->user->username }}</a></h6>
            <p class="card-text"><span>{{ $post->body }}</span></p>
        </div>
    </div>
</x-layout>