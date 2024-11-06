<x-layout>
    <h1 class="mb-4 fw-normal fs-2">Welcome to <span class="text-danger fw-semibold">Thought Space</span>, create a new account</h1>
    <div class="mx-5">
    <div class="mx-5">
    <div class="mx-5">
    <div class="mx-5">
    <div class="card mx-5 p-4 rounded-4 border border-secondary-subtle fw-bolder shadow-lg">
        <form class="card-body" action="{{ route('register') }}" method="POST">
            @csrf

            {{-- Username --}}
            <div class="mb-3">
                <label for="username" class="form-label fs-5">Username</label>
                <input type="text" class="form-control border-dark-subtle" value="{{ old('username') }}" id="username" name="username">
                <div class="text-danger">
                    @error('username')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            
            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label fs-5">Email</label>
                <input type="text" class="form-control border-dark-subtle" value="{{ old('email') }}" id="email" name="email">
                <div class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label fs-5">Password</label>
                <input type="password" class="form-control border-dark-subtle" id="password" name="password">
                <div class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- Confirmation Password --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label fs-5">Confirm Password</label>
                <input type="password" class="form-control border-dark-subtle" id="password_confirmation" name="password_confirmation">
                <div class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- Submit Button --}}
            <button class="btn btn-primary">Register</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
</x-layout>