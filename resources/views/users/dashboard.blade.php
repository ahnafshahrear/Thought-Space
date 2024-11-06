<x-layout>
    <h1  class="mb-4 fw-normal fs-2">Hello, <span class="text-danger fw-semibold">{{ auth()->user()->username }}</span>. You've {{ $posts->total() }} posts...</h1>

    <div class="card p-4 rounded-4 border border-secondary-subtle fw-bolder shadow-lg">
        <form class="card-body" action="{{ route('posts.store') }}" method="POST">
            @csrf

            {{-- Sesson Messages --}}
            <div class="fs-5 fw-normal">
                @if (session('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @elseif (session('delete'))
                    <p class="text-danger">{{ session('delete') }}</p>
                @else
                    <p>What's on your mind?</p>
                @endif
            </div>
            
            {{-- Post Title --}}
            <div class="mb-3">
                <label for="title" class="form-label fs-5">Title</label>
                <input type="text" class="form-control border-dark-subtle" value="{{ old('title') }}" id="title" name="title">
                <div class="text-danger">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- Post Body --}}
            <div class="mb-3">
                <label for="body" class="form-label fs-5">Post Content</label>
                <textarea name="body" id="body" cols="30" rows="5" class="form-control border-dark-subtle">{{ old('body') }}</textarea>
                <div class="text-danger">
                    @error('body')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="text-danger">
                @error('failed')
                    {{ $message }}
                @enderror
            </div>

            {{-- Create Post Button --}}
            <button class="btn btn-success mt-3">Create Post</button>
        </form>
    </div>

    <h1 class="my-4 fw-normal fs-2">Your latest posts...</h1>

    @foreach ($posts as $post)
        <div class="mb-5">
            <div class="">
                <h3 class="card-title fw-bold fs-2">{{ $post->title }}</h3>
                <h6 class="card-subtitle mb-2 text-body-secondary">Posted {{ $post->created_at->diffForHumans() }} by <a href="">{{ $post->user->username }}</a></h6>
                <p class="card-text fw-normal fs-5"><span>{{ Str::words($post->body, 20) }}</span> <a class="link-underline link-underline-opacity-0" href="{{ route('posts.show', $post) }}">Read more</a></p>
                <div class="d-flex">
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        {{-- Method Spoffing --}}
                        @method('DELETE') 
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <a class="btn btn-primary btn-sm ms-2" href="{{ route('posts.edit', $post) }}">Update</a>
                </div>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
</x-layout>