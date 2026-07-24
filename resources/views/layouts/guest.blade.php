<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- CSS Murni (Tanpa Tailwind / Tanpa Vite) -->
        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f8fafc;
                color: #1e293b;
                -webkit-font-smoothing: antialiased;
            }

            /* Container Utama untuk Centering */
            .auth-container {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 1rem;
                position: relative;
                overflow: hidden;
            }

            /* Efek Cahaya Latar Belakang (Glow) */
            .auth-container::before {
                content: '';
                position: absolute;
                top: -100px;
                left: -100px;
                width: 350px;
                height: 350px;
                background: rgba(99, 102, 241, 0.08);
                border-radius: 50%;
                filter: blur(60px);
                z-index: 0;
            }

            .auth-container::after {
                content: '';
                position: absolute;
                bottom: -100px;
                right: -100px;
                width: 350px;
                height: 350px;
                background: rgba(168, 85, 247, 0.08);
                border-radius: 50%;
                filter: blur(60px);
                z-index: 0;
            }

            /* Card Kotak Putih di Tengah */
            .auth-card {
                position: relative;
                z-index: 1;
                width: 100%;
                max-width: 420px;
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.8);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
                border-radius: 24px;
                padding: 2.5rem;
            }

            /* Footer Kecil di Bawah */
            .auth-footer {
                position: relative;
                z-index: 1;
                margin-top: 1.5rem;
                font-size: 0.75rem;
                color: #94a3b8;
                text-align: center;
            }

            /* ===== Elemen Form ===== */

            .form-group {
                margin-bottom: 1.25rem;
            }

            .form-label {
                display: block;
                font-size: 0.875rem;
                font-weight: 500;
                color: #334155;
                margin-bottom: 0.4rem;
            }

            .form-input {
                width: 100%;
                padding: 0.65rem 0.9rem;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                font-size: 0.95rem;
                font-family: 'Figtree', sans-serif;
                background-color: #fff;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }

            .form-input:focus {
                outline: none;
                border-color: #6366f1;
                box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
            }

            .form-error {
                font-size: 0.8rem;
                color: #dc2626;
                margin-top: 0.35rem;
            }

            .form-checkbox-row {
                display: flex;
                align-items: center;
                margin-bottom: 1.5rem;
            }

            .form-checkbox-row input {
                width: 16px;
                height: 16px;
                accent-color: #6366f1;
                margin-right: 0.5rem;
            }

            .form-checkbox-row label {
                font-size: 0.85rem;
                color: #64748b;
            }

            .form-footer {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;
            }

            .form-link {
                font-size: 0.85rem;
                color: #64748b;
                text-decoration: underline;
            }

            .form-link:hover {
                color: #1e293b;
            }

            .btn-primary {
                background-color: #4f46e5;
                color: #fff;
                border: none;
                padding: 0.65rem 1.5rem;
                border-radius: 12px;
                font-size: 0.9rem;
                font-weight: 600;
                cursor: pointer;
                transition: background-color 0.2s ease;
            }

            .btn-primary:hover {
                background-color: #4338ca;
            }

            .auth-title {
                font-size: 1.4rem;
                font-weight: 600;
                margin-bottom: 0.3rem;
                color: #0f172a;
            }

            .auth-subtitle {
                font-size: 0.85rem;
                color: #64748b;
                margin-bottom: 1.75rem;
            }

            .status-message {
                background-color: #ecfdf5;
                color: #065f46;
                font-size: 0.85rem;
                padding: 0.6rem 0.9rem;
                border-radius: 10px;
                margin-bottom: 1.25rem;
            }
        </style>
    </head>
    <body>
        <div class="auth-container">

            <!-- Card Utama -->
            <div class="auth-card">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div class="auth-footer">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </div>

        </div>
    </body>
</html>