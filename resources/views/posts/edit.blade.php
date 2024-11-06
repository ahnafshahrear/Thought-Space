<x-layout>
    <a class="link-underline link-underline-opacity-0" href="{{ route('dashboard') }}">&larr; Go back to your dashboard</a>
    <h1 class="mb-4 mt-1 fw-normal fs-2">Update your post</h1>

    <div class="card p-4 rounded-4 border border-secondary-subtle fw-bolder shadow-lg">
        <form class="card-body" action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- Post Title --}}
            <div class="mb-3">
                <label for="title" class="form-label fs-5">Title</label>
                <input type="text" class="form-control border-dark-subtle" value="{{ $post->title }}" id="title" name="title">
                <div class="text-danger">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- Post Body --}}
            <div class="mb-3">
                <label for="body" class="form-label fs-5">Post Content</label>
                <textarea name="body" id="body" cols="30" rows="5" class="form-control border-dark-subtle">{{ $post->body }}</textarea>
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
            <button class="btn btn-primary mt-3">Update Post</button>
        </form>
    </div>
</x-layout>