<x-layout>
    <h1 class="mb-4 fw-normal fs-2">Welcome back to <span class="text-danger fw-semibold">Thought Space</span>, login to your account</h1>
    <div class="mx-5">
    <div class="mx-5">
    <div class="mx-5">
    <div class="mx-5">
    <div class="card mx-5 p-4 rounded-4 border border-secondary-subtle fw-bolder shadow-lg">
        <form class="card-body" action="{{ route('login') }}" method="POST">
            @csrf
            
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

            {{-- Remember Me checkbox --}}
            <div class="">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>

            <div class="text-danger">
                @error('failed')
                    {{ $message }}
                @enderror
            </div>

            {{-- Submit Button --}}
            <button class="btn btn-primary mt-3">Login</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>  
</x-layout>