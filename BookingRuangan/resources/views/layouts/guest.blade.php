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
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            
            .glass-card {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            
            .input-field {
                transition: all 0.3s ease;
                border: 2px solid #e5e7eb;
            }
            
            .input-field:focus {
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
                outline: none;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                transition: all 0.3s ease;
            }
            
            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            }
            
            .logo-container {
                background: rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(10px);
                border: 2px solid rgba(255, 255, 255, 0.3);
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate-fade-in {
                animation: fadeInUp 0.6s ease-out;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
            <div class="animate-fade-in">
                <a href="/" class="flex items-center gap-3 mb-8">
                    <div class="logo-container w-16 h-16 rounded-2xl flex items-center justify-center text-3xl">
                        🏢
                    </div>
                    <span class="text-3xl font-bold text-white">RoomHub</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md glass-card shadow-2xl overflow-hidden rounded-3xl animate-fade-in" style="animation-delay: 0.2s;">
                {{ $slot }}
            </div>
            
            <div class="mt-6 text-center text-white text-sm opacity-90 animate-fade-in" style="animation-delay: 0.4s;">
                <p>&copy; {{ date('Y') }} RoomHub. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>