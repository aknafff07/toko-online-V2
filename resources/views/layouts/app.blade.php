<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko V2 - Belanja Online Terpercaya')</title>
    <meta name="description" content="@yield('meta_description', 'Toko V2 - Tempat belanja online terpercaya dengan harga terbaik dan kualitas premium.')">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                            950: '#1e1b4b',
                        },
                        accent: {
                            50: '#fdf4ff',
                            100: '#fae8ff',
                            200: '#f5d0fe',
                            300: '#f0abfc',
                            400: '#e879f9',
                            500: '#d946ef',
                            600: '#c026d3',
                            700: '#a21caf',
                            800: '#86198f',
                            900: '#701a75',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        * { font-family: 'Inter', sans-serif; }

        .nav-glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.18);
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #6366f1, #d946ef);
            border-radius: 2px;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .nav-link.active {
            color: #4f46e5;
            font-weight: 600;
        }

        .gradient-text {
            background: linear-gradient(135deg, #6366f1, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #6366f1, #7c3aed);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #4f46e5, #6d28d9);
            transform: translateY(-1px);
            box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.4);
        }

        .cart-badge {
            background: linear-gradient(135deg, #f43f5e, #e11d48);
            animation: pulse-badge 2s infinite;
        }
        @keyframes pulse-badge {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .mobile-menu.open {
            transform: translateX(0);
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .footer-gradient {
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #3730a3 100%);
        }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans antialiased">

    {{-- ========== NAVBAR ========== --}}
    <nav class="nav-glass fixed top-0 left-0 right-0 z-50 shadow-sm" id="mainNav">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center h-16 lg:h-18">

                {{-- Logo --}}
                <a href="/" class="flex items-center space-x-2 group" id="navLogo">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center shadow-lg group-hover:shadow-primary-500/30 transition-shadow duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold gradient-text tracking-tight">Toko V2</span>
                </a>

                {{-- Desktop Nav Links --}}
                <div class="hidden lg:flex items-center space-x-8" id="desktopNav">
                    <a href="/" class="nav-link text-sm font-medium text-gray-600 hover:text-primary-600 {{ request()->is('/') ? 'active' : '' }}" id="navBeranda">
                        Beranda
                    </a>
                    <a href="/katalog" class="nav-link text-sm font-medium text-gray-600 hover:text-primary-600 {{ request()->is('katalog') ? 'active' : '' }}" id="navKatalog">
                        Katalog Produk
                    </a>
                    <a href="/tentang-kami" class="nav-link text-sm font-medium text-gray-600 hover:text-primary-600 {{ request()->is('tentang-kami') ? 'active' : '' }}" id="navAbout">
                        Tentang Kami
                    </a>
                    <a href="/hubungi-kami" class="nav-link text-sm font-medium text-gray-600 hover:text-primary-600 {{ request()->is('hubungi-kami') ? 'active' : '' }}" id="navContact">
                        Hubungi Kami
                    </a>
                </div>

                {{-- Right Actions --}}
                <div class="flex items-center space-x-3">
                    {{-- Admin Link --}}
                    <a href="/admin/orders" class="hidden sm:inline-flex items-center text-xs font-medium text-gray-500 hover:text-primary-600 transition-colors px-3 py-1.5 rounded-lg hover:bg-primary-50" id="navAdmin">
                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Admin
                    </a>

                    {{-- Cart Button --}}
                    <a href="/cart" class="relative inline-flex items-center btn-gradient text-white px-4 py-2 rounded-xl text-sm font-semibold shadow-md" id="navCart">
                        <svg class="w-5 h-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                        </svg>
                        Keranjang
                        @php $cartCount = count((array) session('cart')); @endphp
                        @if($cartCount > 0)
                            <span class="cart-badge absolute -top-2 -right-2 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    {{-- Mobile Hamburger --}}
                    <button class="lg:hidden ml-2 p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition" onclick="toggleMobileMenu()" id="hamburgerBtn">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu Overlay --}}
        <div class="mobile-menu fixed inset-0 top-16 bg-white/95 backdrop-blur-lg lg:hidden z-40" id="mobileMenu">
            <div class="flex flex-col p-6 space-y-1">
                <a href="/" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition {{ request()->is('/') ? 'bg-primary-50 text-primary-600 font-semibold' : '' }}" id="mobileNavBeranda">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Beranda</span>
                </a>
                <a href="/katalog" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition {{ request()->is('katalog') ? 'bg-primary-50 text-primary-600 font-semibold' : '' }}" id="mobileNavKatalog">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span>Katalog Produk</span>
                </a>
                <a href="/tentang-kami" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition {{ request()->is('tentang-kami') ? 'bg-primary-50 text-primary-600 font-semibold' : '' }}" id="mobileNavAbout">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Tentang Kami</span>
                </a>
                <a href="/hubungi-kami" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition {{ request()->is('hubungi-kami') ? 'bg-primary-50 text-primary-600 font-semibold' : '' }}" id="mobileNavContact">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Hubungi Kami</span>
                </a>

                <div class="border-t border-gray-200 my-3"></div>

                <a href="/admin/orders" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition" id="mobileNavAdmin">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Admin Panel</span>
                </a>
            </div>
        </div>
    </nav>

    {{-- Spacer for fixed navbar --}}
    <div class="h-16 lg:h-18"></div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="container mx-auto px-4 sm:px-6 mt-4 fade-in" id="flashSuccess">
            <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container mx-auto px-4 sm:px-6 mt-4 fade-in" id="flashError">
            <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-xl flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    {{-- ========== MAIN CONTENT ========== --}}
    <main class="flex-1 fade-in">
        @yield('content')
    </main>

    {{-- ========== FOOTER ========== --}}
    <footer class="footer-gradient text-white mt-16">
        <div class="container mx-auto px-4 sm:px-6 py-12 lg:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

                {{-- Brand --}}
                <div class="lg:col-span-1">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold">Toko V2</span>
                    </div>
                    <p class="text-indigo-200 text-sm leading-relaxed">
                        Tempat belanja online terpercaya dengan produk berkualitas dan harga terbaik untuk Anda.
                    </p>
                </div>

                {{-- Navigasi --}}
                <div>
                    <h4 class="font-semibold text-sm uppercase tracking-wider mb-4 text-indigo-300">Navigasi</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-indigo-200 hover:text-white text-sm transition">Beranda</a></li>
                        <li><a href="/katalog" class="text-indigo-200 hover:text-white text-sm transition">Katalog Produk</a></li>
                        <li><a href="/tentang-kami" class="text-indigo-200 hover:text-white text-sm transition">Tentang Kami</a></li>
                        <li><a href="/hubungi-kami" class="text-indigo-200 hover:text-white text-sm transition">Hubungi Kami</a></li>
                    </ul>
                </div>

                {{-- Layanan --}}
                <div>
                    <h4 class="font-semibold text-sm uppercase tracking-wider mb-4 text-indigo-300">Layanan</h4>
                    <ul class="space-y-2">
                        <li><a href="/cart" class="text-indigo-200 hover:text-white text-sm transition">Keranjang Belanja</a></li>
                        <li><a href="/products/create" class="text-indigo-200 hover:text-white text-sm transition">Tambah Produk</a></li>
                        <li><a href="/admin/orders" class="text-indigo-200 hover:text-white text-sm transition">Admin Panel</a></li>
                    </ul>
                </div>

                {{-- Kontak --}}
                <div>
                    <h4 class="font-semibold text-sm uppercase tracking-wider mb-4 text-indigo-300">Kontak</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start space-x-2 text-sm text-indigo-200">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Jl. Contoh No. 123, Jakarta</span>
                        </li>
                        <li class="flex items-center space-x-2 text-sm text-indigo-200">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>0812-3456-7890</span>
                        </li>
                        <li class="flex items-center space-x-2 text-sm text-indigo-200">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>info@tokoonline.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-indigo-700/50 mt-10 pt-8 flex flex-col sm:flex-row justify-between items-center">
                <p class="text-indigo-300 text-sm">&copy; {{ date('Y') }} Toko V2. All rights reserved.</p>
                <p class="text-indigo-400 text-xs mt-2 sm:mt-0">Dibuat dengan ❤️ menggunakan Laravel</p>
            </div>
        </div>
    </footer>

    {{-- Mobile Menu Toggle Script --}}
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('open');
        }

        // Close mobile menu on link click
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobileMenu').classList.remove('open');
            });
        });

        // Auto-dismiss flash messages
        setTimeout(() => {
            const flash = document.getElementById('flashSuccess') || document.getElementById('flashError');
            if (flash) {
                flash.style.transition = 'opacity 0.5s';
                flash.style.opacity = '0';
                setTimeout(() => flash.remove(), 500);
            }
        }, 4000);

        // Navbar shadow on scroll
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('mainNav');
            if (window.scrollY > 10) {
                nav.classList.add('shadow-md');
            } else {
                nav.classList.remove('shadow-md');
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
