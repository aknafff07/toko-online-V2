<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Toko V2')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'], },
                    colors: {
                        primary: { 50: '#eef2ff', 100: '#e0e7ff', 500: '#6366f1', 600: '#4f46e5', 700: '#4338ca', 900: '#312e81' },
                    }
                }
            }
        }
    </script>
    <style>
        * { font-family: 'Inter', sans-serif; }
        .sidebar { transition: all 0.3s ease; }
        .fade-in { animation: fadeIn 0.4s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden text-gray-800">

    {{-- Sidebar --}}
    <aside class="sidebar w-64 bg-primary-900 text-white flex-shrink-0 flex flex-col hidden md:flex">
        <div class="h-16 flex items-center px-6 bg-primary-950 border-b border-primary-800/50">
            <div class="w-8 h-8 rounded-lg bg-primary-500 flex items-center justify-center mr-3 shadow-sm">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <span class="text-xl font-bold tracking-wide">Admin Panel</span>
        </div>
        
        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            <p class="px-2 text-xs font-semibold text-primary-300 uppercase tracking-widest mb-3">Menu Manajemen</p>

            <a href="/admin/orders" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->is('admin/orders*') ? 'bg-primary-800 text-white font-semibold shadow-inner' : 'text-primary-100 hover:bg-primary-800 hover:text-white' }}">
                <svg class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="text-sm">Kelola Pesanan</span>
            </a>

            <a href="/admin/products" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->is('admin/products*') ? 'bg-primary-800 text-white font-semibold shadow-inner' : 'text-primary-100 hover:bg-primary-800 hover:text-white' }}">
                <svg class="w-5 h-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="text-sm">Katalog Produk</span>
            </a>
        </div>

        <div class="p-4 border-t border-primary-800/50">
            <a href="/" class="flex items-center justify-center w-full space-x-2 px-3 py-2.5 bg-primary-800 hover:bg-primary-700 text-white text-sm font-semibold rounded-xl transition shadow-md">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali ke Toko</span>
            </a>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        {{-- Topbar --}}
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 flex-shrink-0 z-10 shadow-sm">
            <div class="flex items-center md:hidden">
                <a href="/" class="text-primary-600 font-bold flex items-center text-lg">
                    Admin
                </a>
            </div>
            
            <div class="flex-1 flex justify-end">
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium text-gray-600">Administrator</span>
                    <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center border border-primary-200">
                        <svg class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
            </div>
        </header>

        {{-- Scrollable Content Area --}}
        <div class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 bg-gray-50/50">
            
            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="mb-6 fade-in bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 fade-in bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-xl flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <div class="fade-in">
                @yield('content')
            </div>
            
        </div>
    </main>

    {{-- Mobile Navigation (Bottom Bar) --}}
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 flex justify-around p-2 z-50">
        <a href="/admin/orders" class="p-2 flex flex-col items-center {{ request()->is('admin/orders*') ? 'text-primary-600' : 'text-gray-500' }}">
            <svg class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span class="text-[10px] font-semibold">Pesanan</span>
        </a>
        <a href="/admin/products" class="p-2 flex flex-col items-center {{ request()->is('admin/products*') ? 'text-primary-600' : 'text-gray-500' }}">
            <svg class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <span class="text-[10px] font-semibold">Produk</span>
        </a>
        <a href="/" class="p-2 flex flex-col items-center text-gray-500">
            <svg class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="text-[10px] font-semibold">Toko</span>
        </a>
    </nav>
    @yield('scripts')
</body>
</html>
