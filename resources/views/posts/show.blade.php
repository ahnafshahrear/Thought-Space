<x-layout>
    <div class="">
        <h3 class="card-title fw-bold fs-2 mb-2">{{ $post->title }}</h3>
        <h6 class="card-subtitle mb-4 text-body-secondary">Posted {{ $post->created_at->diffForHumans() }} by <a href="{{ route('posts.user', $post->user)  }}">{{ $post->user->username }}</a></h6>
        <p class="card-text fw-normal fs-5">{{ $post->body }}</p>
    </div>
</x-layout>