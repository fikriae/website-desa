
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1e462e">

    <title>Login Pengelola - Desa Manyar</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700&family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --green-900: #12301e;
            --green-800: #1e462e;
            --green-700: #2a5c3f;
            --green-100: #e6efe9;
            --ink: #14221a;
            --muted: #5b6b62;
            --line: #d9e2dc;
            --surface: #ffffff;
            --page: #f6f8f6;
            --danger: #b42318;
            --danger-bg: #fef3f2;
            --danger-line: #fecdca;
            --font-display: 'Bricolage Grotesque', 'Segoe UI', system-ui, sans-serif;
            --font-body: 'Figtree', 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            height: 100%;
            overflow: hidden;
            -webkit-text-size-adjust: 100%;
        }

        body {
            height: 100%;
            overflow: hidden;
            font-family: var(--font-body);
            color: var(--ink);
            background: var(--page);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        .page {
            height: 100vh;
            height: 100dvh;
            overflow: hidden;
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(0, 1fr);
        }

        /* PANEL IDENTITAS */

        .brand {
            position: relative;
            overflow: hidden;
            background: var(--green-800);
            color: #fff;
            padding: 56px 64px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            isolation: isolate;
        }

        .brand::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(120% 90% at 0% 0%, rgba(255, 255, 255, .07), transparent 55%),
                linear-gradient(160deg, var(--green-800) 0%, var(--green-900) 100%);
            z-index: -2;
        }

        .contours {
            position: absolute;
            right: -18%;
            bottom: -14%;
            width: 110%;
            max-width: 760px;
            height: auto;
            z-index: -1;
            pointer-events: none;
        }

        .brand-top {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* FRAME LOGO DESKTOP */

        .logo {
            width: 68px;
            height: 68px;
            flex: none;
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, .35);
            border-radius: 16px;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            margin: auto;
        }

        .brand-name {
            font-family: var(--font-display);
            font-weight: 600;
            font-size: 19px;
            line-height: 1.25;
            letter-spacing: .01em;
        }

        .brand-name span {
            display: block;
            font-family: var(--font-body);
            font-weight: 500;
            font-size: 13px;
            color: rgba(255, 255, 255, .68);
            margin-top: 4px;
        }

        .brand-body {
            max-width: 460px;
        }

        .brand-body h2 {
            font-family: var(--font-display);
            font-weight: 700;
            font-size: clamp(34px, 3.6vw, 48px);
            line-height: 1.08;
            letter-spacing: -.02em;
            margin-bottom: 18px;
        }

        .brand-body p {
            font-size: 16px;
            line-height: 1.65;
            color: rgba(255, 255, 255, .78);
            max-width: 40ch;
        }

        .brand-foot {
            font-size: 13px;
            color: rgba(255, 255, 255, .55);
        }

        /* PANEL FORM */

        .panel {
            display: flex;
            flex-direction: column;
            min-height: 0;
            padding: 24px 24px 16px;
            background: var(--surface);
        }

        .panel-main {
            flex: 1;
            min-height: 0;
            display: grid;
            place-items: center;
        }

        .form-wrap {
            width: 100%;
            max-width: 380px;
            animation: rise .5s cubic-bezier(.2, .7, .2, 1) both;
        }

        /* FRAME LOGO MOBILE */

        .mobile-logo {
            display: none;
        }

        .form-wrap h1 {
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 30px;
            line-height: 1.15;
            letter-spacing: -.015em;
            color: var(--green-800);
            margin-bottom: 8px;
        }

        .form-wrap .lead {
            font-size: 15px;
            color: var(--muted);
            margin-bottom: 30px;
        }

        .error {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            background: var(--danger-bg);
            color: var(--danger);
            border: 1px solid var(--danger-line);
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 22px;
            font-size: 14px;
            line-height: 1.45;
        }

        .error svg {
            flex: none;
            margin-top: 1px;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 8px;
        }

        .control {
            position: relative;
        }

        input {
            width: 100%;
            height: 48px;
            padding: 0 16px;
            font: inherit;
            font-size: 15px;
            color: var(--ink);
            background: #fff;
            border: 1.5px solid var(--line);
            border-radius: 10px;
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }

        input::placeholder {
            color: #98a59d;
        }

        input:hover {
            border-color: #b9c8bf;
        }

        input:focus {
            border-color: var(--green-800);
            box-shadow: 0 0 0 4px rgba(30, 70, 46, .12);
        }

        .control input[type="password"],
        .control input[type="text"].is-password {
            padding-right: 52px;
        }

        .toggle {
            position: absolute;
            top: 50%;
            right: 6px;
            transform: translateY(-50%);
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border: 0;
            border-radius: 8px;
            background: transparent;
            color: var(--muted);
            cursor: pointer;
        }

        .toggle:hover {
            background: var(--green-100);
            color: var(--green-800);
        }

        .toggle:focus-visible {
            outline: 2px solid var(--green-800);
            outline-offset: 1px;
        }

        .toggle .eye-off {
            display: none;
        }

        .toggle[aria-pressed="true"] .eye {
            display: none;
        }

        .toggle[aria-pressed="true"] .eye-off {
            display: block;
        }

        .btn-login {
            width: 100%;
            height: 50px;
            margin-top: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font: inherit;
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            background: var(--green-800);
            border: 0;
            border-radius: 10px;
            cursor: pointer;
            transition: background .15s, box-shadow .15s, transform .1s;
        }

        .btn-login:hover {
            background: var(--green-900);
            box-shadow: 0 8px 20px rgba(18, 48, 30, .22);
        }

        .btn-login:active {
            transform: translateY(1px);
        }

        .btn-login:focus-visible {
            outline: 3px solid rgba(30, 70, 46, .35);
            outline-offset: 2px;
        }

        .btn-login[disabled] {
            cursor: progress;
            opacity: .85;
            box-shadow: none;
        }

        .spinner {
            width: 18px;
            height: 18px;
            border: 2.5px solid rgba(255, 255, 255, .35);
            border-top-color: #fff;
            border-radius: 50%;
            display: none;
            animation: spin .7s linear infinite;
        }

        .btn-login.is-loading .spinner {
            display: block;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .panel-foot {
            text-align: center;
            font-size: 12.5px;
            color: #8a988f;
            padding-top: 12px;
        }

        .panel-foot strong {
            color: var(--green-800);
            font-weight: 700;
        }

        @keyframes rise {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        /* TABLET DAN HP */

        @media (max-width: 900px) {
            .page {
                grid-template-columns: 1fr;
                grid-template-rows: 1fr;
            }

            .brand {
                display: none;
            }

            .panel {
                border-top: 6px solid var(--green-800);
            }

            .form-wrap {
                text-align: left;
            }

            .form-wrap h1 {
                font-size: 26px;
            }

            .mobile-logo {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 76px;
                height: 76px;
                margin-bottom: 24px;
                border: 1px solid var(--line);
                border-radius: 18px;
                background: #fff;
                padding: 8px;
                overflow: hidden;
            }

            .mobile-logo img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: contain;
                object-position: center;
                margin: auto;
            }
        }

        /* LAYAR PENDEK */

        @media (max-height: 760px) {
            .logo {
                width: 60px;
                height: 60px;
                border-radius: 14px;
                padding: 6px;
            }

            .mobile-logo {
                width: 66px;
                height: 66px;
                margin-bottom: 16px;
            }

            .form-wrap h1 {
                font-size: 25px;
            }

            .form-wrap .lead {
                margin-bottom: 20px;
            }

            .field {
                margin-bottom: 14px;
            }

            label {
                margin-bottom: 6px;
            }

            input {
                height: 44px;
            }

            .btn-login {
                height: 46px;
                margin-top: 4px;
            }

            .error {
                padding: 10px 12px;
                margin-bottom: 14px;
            }

            .brand {
                padding: 40px 56px;
            }

            .brand-body h2 {
                font-size: 36px;
            }
        }

        @media (max-height: 600px) {
            .mobile-logo {
                width: 52px;
                height: 52px;
                margin-bottom: 10px;
                border-radius: 13px;
                padding: 5px;
            }

            .form-wrap h1 {
                font-size: 22px;
            }

            .form-wrap .lead {
                font-size: 13.5px;
                margin-bottom: 14px;
            }

            .field {
                margin-bottom: 10px;
            }

            input {
                height: 40px;
            }

            .btn-login {
                height: 42px;
            }

            .panel {
                padding: 14px 20px 8px;
            }

            .panel-foot {
                padding-top: 6px;
            }

            .brand {
                padding: 28px 48px;
            }

            .brand-body h2 {
                font-size: 28px;
                margin-bottom: 10px;
            }

            .brand-body p {
                font-size: 14px;
            }
        }

        @media (max-height: 500px) {
            .form-wrap .lead {
                display: none;
            }

            .form-wrap h1 {
                margin-bottom: 12px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>

<div class="page">

    {{-- PANEL IDENTITAS --}}
    <aside class="brand">

        <svg class="contours" viewBox="0 0 600 600" fill="none" aria-hidden="true">
            <g stroke="#fff" stroke-opacity=".10" stroke-width="1.5">
                <ellipse cx="400" cy="400" rx="60" ry="46" transform="rotate(-18 400 400)"/>
                <ellipse cx="400" cy="400" rx="120" ry="92" transform="rotate(-18 400 400)"/>
                <ellipse cx="400" cy="400" rx="180" ry="140" transform="rotate(-14 400 400)"/>
                <ellipse cx="400" cy="400" rx="240" ry="190" transform="rotate(-10 400 400)"/>
                <ellipse cx="400" cy="400" rx="300" ry="242" transform="rotate(-6 400 400)"/>
                <ellipse cx="400" cy="400" rx="360" ry="296" transform="rotate(-2 400 400)"/>
                <ellipse cx="400" cy="400" rx="420" ry="352" transform="rotate(2 400 400)"/>
            </g>
        </svg>

        <div class="brand-top">
            <div class="brand-logo">

                <div class="logo">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Desa Manyar">
                </div>

                <div class="brand-name">
                    Desa Manyar
                    <span>Website resmi desa</span>
                </div>

            </div>
        </div>

        <div class="brand-body">
            <h2>Kelola informasi desa dalam satu tempat.</h2>

            <p>
                Masuk untuk memperbarui konten dan mengelola website resmi Desa Manyar.
            </p>
        </div>

        <div class="brand-foot">
            Khusus pengelola yang berwenang.
        </div>

    </aside>

    {{-- PANEL FORM LOGIN --}}
    <main class="panel">

        <div class="panel-main">

            <div class="form-wrap">

                {{-- LOGO KHUSUS TAMPILAN HP --}}
                <div class="mobile-logo">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Desa Manyar">
                </div>

                <h1>Masuk ke dashboard</h1>

                <p class="lead">
                    Gunakan akun pengelola Anda untuk melanjutkan.
                </p>

                @if (session('success'))
                    <div class="error" style="background:#eaf2ed;color:#1e462e;border-color:#c8ddce;">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="error" role="alert">

                        <svg width="18" height="18" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round"
                             aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>

                        <span>{{ $errors->first() }}</span>

                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST" id="loginForm">
                    @csrf

                    <div class="field">

                        <label for="email">Alamat email</label>

                        <div class="control">
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                autocomplete="username"
                                required
                                autofocus
                            >
                        </div>

                    </div>

                    <div class="field">

                        <label for="password">Password</label>

                        <div class="control">

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Masukkan password"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                type="button"
                                class="toggle"
                                id="togglePassword"
                                aria-label="Tampilkan password"
                                aria-pressed="false"
                            >

                                <svg class="eye" width="20" height="20"
                                     viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.8"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     aria-hidden="true">
                                    <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>

                                <svg class="eye-off" width="20" height="20"
                                     viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.8"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     aria-hidden="true">
                                    <path d="M17.94 17.94A10.94 10.94 0 0 1 12 19c-7 0-11-7-11-7a19.8 19.8 0 0 1 5.06-5.94"/>
                                    <path d="M9.9 4.24A10.9 10.9 0 0 1 12 4c7 0 11 7 11 7a19.9 19.9 0 0 1-3.17 4.19"/>
                                    <path d="M14.12 14.12A3 3 0 1 1 9.88 9.88"/>
                                    <line x1="1" y1="1" x2="23" y2="23"/>
                                </svg>

                            </button>

                        </div>

                    </div>

                    <button type="submit" class="btn-login" id="btnLogin">

                        <span class="spinner" aria-hidden="true"></span>

                        <span class="label">Masuk ke dashboard</span>

                    </button>

                </form>

            </div>

        </div>

        <footer class="panel-foot">
            by <strong>tumbascoding</strong>
        </footer>

    </main>

</div>

<script>
    (function () {
        var pass = document.getElementById('password');
        var toggle = document.getElementById('togglePassword');
        var form = document.getElementById('loginForm');
        var btn = document.getElementById('btnLogin');

        if (toggle && pass) {
            toggle.addEventListener('click', function () {
                var show = pass.type === 'password';

                pass.type = show ? 'text' : 'password';

                toggle.setAttribute(
                    'aria-pressed',
                    show ? 'true' : 'false'
                );

                toggle.setAttribute(
                    'aria-label',
                    show ? 'Sembunyikan password' : 'Tampilkan password'
                );

                pass.focus();
            });
        }

        if (form && btn) {
            form.addEventListener('submit', function () {
                btn.disabled = true;
                btn.classList.add('is-loading');
                btn.querySelector('.label').textContent = 'Memproses...';
            });

            window.addEventListener('pageshow', function () {
                btn.disabled = false;
                btn.classList.remove('is-loading');
                btn.querySelector('.label').textContent = 'Masuk ke dashboard';
            });
        }
    })();
</script>

</body>
</html>
