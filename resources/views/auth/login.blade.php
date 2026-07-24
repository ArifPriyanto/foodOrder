<x-guest-layout>
    <h1 class="auth-title">Selamat datang kembali</h1>
    <p class="auth-subtitle">Masuk ke akun Anda untuk melanjutkan</p>

    @if (session('status'))
        <div class="status-message">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-input" type="email" name="email"
                   value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-input" type="password" name="password"
                   required autocomplete="current-password">
            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-checkbox-row">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Ingat saya</label>
        </div>

        <!-- Footer: Lupa Password + Tombol Login -->
        <div class="form-footer">
            @if (Route::has('password.request'))
                <a class="form-link" href="{{ route('password.request') }}">Lupa password?</a>
            @else
                <span></span>
            @endif

            <button type="submit" class="btn-primary">Masuk</button>
        </div>
    </form>
</x-guest-layout>