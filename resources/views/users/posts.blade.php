<x-layout>
    <h1 class="mb-4 fw-normal fs-2"><span class="text-danger fw-semibold">{{ $user->username }}</span>'s posts | Count: {{ $posts->total() }}</h1>
    
    {{-- User's posts --}}
    @foreach ($posts as $post)
        <div class="mb-5">
            <div class="">
                <h3 class="card-title fw-bold fs-2">{{ $post->title }}</h3>
                <h6 class="card-subtitle mb-2 text-body-secondary">Posted {{ $post->created_at->diffForHumans() }} by <a href="{{ route('posts.user', $post->user)  }}">{{ $post->user->username }}</a></h6>
                <p class="card-text fw-normal fs-5"><span>{{ Str::words($post->body, 20) }}</span> <a class="link-underline link-underline-opacity-0" href="{{ route('posts.show', $post) }}">Read more</a></p>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
</x-layout>