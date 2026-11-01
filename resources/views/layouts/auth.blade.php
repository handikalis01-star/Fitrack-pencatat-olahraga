<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Autentikasi')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Efek Neumorphism Khas Gambar Referensi */
        .neumorphism-card {
            background: #ebf0f5;
            box-shadow: 14px 14px 25px #cbced1, -14px -14px 25px #ffffff;
        }
        .neumorphism-input {
            background: #ebf0f5;
            box-shadow: inset 4px 4px 8px #cbced1, inset -4px -4px 8px #ffffff;
        }
    </style>
</head>
<body class="bg-[#ebf0f5] min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        @yield('content')
    </div>
</body>
</html>