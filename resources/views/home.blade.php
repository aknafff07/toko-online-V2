@extends('layouts.app')

@section('title', 'Toko V2 - Belanja Online Terpercaya')
@section('meta_description', 'Toko V2 - Belanja online terpercaya dengan produk berkualitas, harga terbaik, dan pengiriman cepat ke seluruh Indonesia.')

@section('content')

    {{-- ========== HERO SECTION ========== --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-primary-900" id="heroSection">
        {{-- Decorative blobs --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-accent-500/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-primary-400/20 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4"></div>

        <div class="container mx-auto px-4 sm:px-6 py-20 lg:py-32 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-semibold bg-white/10 text-white/90 backdrop-blur-sm border border-white/10 mb-6">
                    🔥 Promo spesial hari ini — diskon hingga 50%
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    Belanja Online
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-pink-300 to-purple-300">
                        Mudah & Terpercaya
                    </span>
                </h1>
                <p class="text-lg sm:text-xl text-indigo-100 mb-10 max-w-xl mx-auto leading-relaxed">
                    Temukan ribuan produk berkualitas dengan harga terbaik. Belanja aman, pengiriman cepat ke seluruh Indonesia.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/katalog" class="inline-flex items-center justify-center px-8 py-3.5 bg-white text-primary-700 font-bold rounded-xl shadow-xl hover:shadow-2xl hover:-translate-y-0.5 transition-all duration-300 text-sm" id="heroCatalogBtn">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Lihat Katalog
                    </a>
                    <a href="/products/create" class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-white/30 text-white font-semibold rounded-xl hover:bg-white/10 transition-all duration-300 text-sm" id="heroSellBtn">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Jual Produk
                    </a>
                </div>
            </div>
        </div>

        {{-- Wave separator --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 52.5C480 45 600 60 720 67.5C840 75 960 75 1080 67.5C1200 60 1320 45 1380 37.5L1440 30V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#f9fafb"/>
            </svg>
        </div>
    </section>

    {{-- ========== PRODUK TERBARU ========== --}}
    <section class="container mx-auto px-4 sm:px-6 py-16" id="latestProducts">
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 text-xs font-semibold text-primary-600 bg-primary-50 rounded-full mb-3">PRODUK TERBARU</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">Baru Ditambahkan</h2>
            <p class="text-gray-500 max-w-lg mx-auto">Produk-produk terbaru yang siap memenuhi kebutuhan Anda</p>
        </div>

        @if($latestProducts->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($latestProducts as $product)
                    <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col">
                        <a href="/katalog/{{ $product->id }}" class="block h-52 overflow-hidden bg-gray-100 relative">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            @if($product->created_at->diffInDays(now()) < 7)
                                <span class="absolute top-3 left-3 px-2.5 py-1 bg-green-500 text-white text-xs font-bold rounded-lg shadow">Baru!</span>
                            @endif
                        </a>
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <a href="/katalog/{{ $product->id }}">
                                    <h3 class="text-base font-bold text-gray-800 mb-1 group-hover:text-primary-600 transition">{{ $product->name }}</h3>
                                </a>
                                <p class="text-sm text-gray-500 line-clamp-2 mb-3">{{ $product->description }}</p>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-lg font-bold text-primary-600">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                    <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-lg">
                                        Stok: {{ $product->stock }}
                                    </span>
                                </div>
                                <a href="/add-to-cart/{{ $product->id }}"
                                   class="block text-center w-full btn-gradient text-white font-semibold py-2.5 rounded-xl hover:shadow-lg transition active:scale-[0.98] text-sm">
                                    + Masukkan Keranjang
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="/katalog" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold text-sm transition group" id="lihatSemuaBtn">
                    Lihat Semua Produk
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        @else
            <div class="text-center py-16">
                <div class="w-20 h-20 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Produk</h3>
                <p class="text-gray-500 mb-6">Jadilah yang pertama menambahkan produk!</p>
                <a href="/products/create" class="btn-gradient text-white px-6 py-2.5 rounded-xl font-semibold text-sm shadow-md">
                    + Tambah Produk Sekarang
                </a>
            </div>
        @endif
    </section>

    {{-- ========== KENAPA BELANJA DI KAMI ========== --}}
    <section class="bg-white py-16" id="featuresSection">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <span class="inline-block px-3 py-1 text-xs font-semibold text-accent-600 bg-accent-50 rounded-full mb-3">KEUNGGULAN KAMI</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">Kenapa Belanja di Toko V2?</h2>
                <p class="text-gray-500 max-w-lg mx-auto">Kami berkomitmen memberikan pengalaman belanja terbaik untuk Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8 rounded-2xl border border-gray-100 hover:border-primary-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Gratis Ongkir</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Nikmati gratis ongkos kirim untuk setiap pembelian tanpa minimum order.</p>
                </div>

                <div class="text-center p-8 rounded-2xl border border-gray-100 hover:border-accent-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-purple-50 to-purple-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Garansi 100%</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Setiap produk dijamin keasliannya dengan garansi uang kembali.</p>
                </div>

                <div class="text-center p-8 rounded-2xl border border-gray-100 hover:border-green-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-green-50 to-green-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Support 24/7</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Tim customer service kami siap membantu Anda selama 24 jam penuh.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== CTA BANNER ========== --}}
    <section class="container mx-auto px-4 sm:px-6 py-16" id="ctaSection">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-primary-600 to-accent-600 p-10 sm:p-16 text-center">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/3"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-2xl translate-y-1/3 -translate-x-1/4"></div>

            <div class="relative z-10">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Siap Mulai Belanja?</h2>
                <p class="text-white/80 text-lg mb-8 max-w-md mx-auto">Dapatkan produk impianmu sekarang juga dengan harga terbaik dan pengiriman cepat!</p>
                <a href="/katalog" class="inline-flex items-center justify-center px-8 py-3.5 bg-white text-primary-700 font-bold rounded-xl shadow-xl hover:shadow-2xl hover:-translate-y-0.5 transition-all duration-300 text-sm" id="ctaShopBtn">
                    Mulai Belanja Sekarang →
                </a>
            </div>
        </div>
    </section>

@endsection
