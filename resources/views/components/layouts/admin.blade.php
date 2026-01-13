<!DOCTYPE html>
<html lang="id" x-data="{ theme: localStorage.getItem('theme') || 'light' }" 
      x-init="$watch('theme', val => { localStorage.setItem('theme', val); document.documentElement.setAttribute('data-theme', val); })"
      :data-theme="theme">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo_bengkod_fav.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        /* Smooth transition for theme changes */
        * {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        
        /* Theme toggle button animation */
        .theme-toggle-btn {
            transition: all 0.3s ease;
        }
        
        .theme-toggle-btn:hover {
            transform: rotate(20deg) scale(1.1);
        }
        
        .theme-toggle-btn:active {
            transform: rotate(20deg) scale(0.95);
        }
    </style>
</head>

<body>
    <div class="drawer lg:drawer-open w-full min-h-screen bg-base-200">
        <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Navbar -->
            <nav class="navbar w-full bg-base-300 shadow-lg">
                <div class="flex-1">
                    <label for="my-drawer-4" aria-label="open sidebar" class="btn btn-square btn-ghost lg:hidden">
                        <!-- Sidebar toggle icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round"
                            stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"
                            class="my-1.5 inline-block size-4">
                            <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                            </path>
                            <path d="M9 4v16"></path>
                            <path d="M14 10l2 2l-2 2"></path>
                        </svg>
                    </label>
                </div>
                
                <!-- Theme Toggle Button -->
                <div class="flex-none gap-2">
                    <button 
                        @click="theme = theme === 'light' ? 'dark' : 'light'"
                        class="btn btn-ghost btn-circle theme-toggle-btn"
                        aria-label="Toggle theme"
                    >
                        <!-- Sun Icon (shown in dark mode) -->
                        <svg x-show="theme === 'dark'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        
                        <!-- Moon Icon (shown in light mode) -->
                        <svg x-show="theme === 'light'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                </div>
            </nav>
            <!-- Page content -->
            {{ $slot }}
        </div>

        @include('components.admin.sidebar')
    </div>

    <footer class="bg-base-300 text-center py-3">
        <div class="container">
            <p class="text-base-content">© {{ date('Y') }} Bengtix. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Initialize theme on page load
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
        });
    </script>
    
    {{-- Section untuk script tambahan --}}
    @stack('scripts')
</body>

</html>
