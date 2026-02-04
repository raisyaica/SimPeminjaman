<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login – Sistem Peminjaman Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>

<body>

    <div class="auth-page">
        <div class="auth-page__bg1"></div>
        <div class="auth-page__bg2"></div>

        <div class="auth-card">

            <div class="auth-card__logo">
                <div class="auth-card__logo-icon"><span class="mdi mdi-package-variant-closed"></span></div>
                <h2>Selamat Datang</h2>
                <p>Silakan login untuk masuk ke sistem</p>
            </div>

            @if ($errors->any())
                <div class="alert alert--error" style="margin-bottom:18px;">
                    <span class="alert__icon mdi mdi-close-circle"></span>
                    <div>
                        @foreach ($errors->all() as $error)
                            <div style="font-size:13px;">{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">Email <span class="req">*</span></label>
                    <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        value="{{ old('email') }}" placeholder="anda@email.com" required autocomplete="email" />
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password <span class="req">*</span></label>
                    <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="••••••••" required autocomplete="current-password" />
                </div>

                <div class="checkbox-row">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-primary btn-full">
                    Login
                </button>
            </form>

            <div class="auth-card__footer">
                Belum memiliki akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>

        </div>
    </div>

</body>

</html>
