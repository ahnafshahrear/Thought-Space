<x-layout>
    <h1 class="mb-3 fw-normal fs-2">Latest Posts...</h1>
    
    @foreach ($posts as $post)
        <div class="mb-5">
            <div class="">
                <h3 class="card-title fw-bold fs-2">{{ $post->title }}</h3>
                <h6 class="card-subtitle mb-2 text-body-secondary">Posted {{ $post->created_at->diffForHumans() }} by <a href="{{ route('posts.user', $post->user)  }}">{{ $post->user->username }}</a></h6>
                <p class="card-text fw-normal fs-5"><span>{{ Str::words($post->body, 20) }}</span> <a class="link-underline link-underline-opacity-0" href="{{ route('posts.show', $post) }}">Read more</a></p>
            </div>
        </div>
    @endforeach

    <div class="">
        {{ $posts->links() }}
    </div>
</x-layout>