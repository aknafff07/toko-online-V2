@extends('layouts.app')

@section('title', 'Tentang Kami - Toko V2')
@section('meta_description', 'Tentang Toko V2 - Mengenal lebih dekat toko online terpercaya yang melayani pelanggan dengan sepenuh hati.')

@section('content')

    {{-- Header --}}
    <section class="bg-gradient-to-br from-primary-600 via-primary-700 to-primary-900 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-80 h-80 bg-accent-500/10 rounded-full blur-3xl -translate-y-1/3 translate-x-1/4"></div>
        <div class="container mx-auto px-4 sm:px-6 py-16 lg:py-20 relative z-10 text-center">
            <span class="inline-block px-3 py-1 text-xs font-semibold text-white/80 bg-white/10 rounded-full mb-4 backdrop-blur-sm">TENTANG KAMI</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4">Mengenal Toko V2 Lebih Dekat</h1>
            <p class="text-indigo-100 text-lg max-w-xl mx-auto">Kami hadir untuk memberikan pengalaman belanja online terbaik bagi Anda.</p>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 60L720 30L1440 60V60H0Z" fill="#f9fafb"/>
            </svg>
        </div>
    </section>

    {{-- Tentang --}}
    <section class="container mx-auto px-4 sm:px-6 py-16">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <span class="inline-block px-3 py-1 text-xs font-semibold text-primary-600 bg-primary-50 rounded-full mb-4">CERITA KAMI</span>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Dari Ide Sederhana Menjadi Toko Online Terpercaya</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Toko V2 didirikan dengan satu tujuan sederhana: membuat belanja online menjadi mudah, aman, dan menyenangkan bagi semua orang. Berawal dari proyek kecil, kami terus berkembang dan berkomitmen memberikan layanan terbaik.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Kami percaya bahwa setiap pelanggan berhak mendapatkan produk berkualitas dengan harga transparan. Itulah mengapa kami selalu menyeleksi setiap produk yang kami jual dan memberikan garansi kepuasan pelanggan.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-primary-100 to-accent-100 rounded-3xl p-10 flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 rounded-2xl bg-white shadow-lg flex items-center justify-center">
                            <svg class="w-12 h-12 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold gradient-text">Toko V2</h3>
                        <p class="text-gray-500 text-sm mt-1">Sejak 2024</p>
                    </div>
                </div>
            </div>

            {{-- Visi Misi --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 mb-4 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Visi</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi platform belanja online nomor satu yang dipercaya oleh masyarakat Indonesia, dengan mengutamakan kualitas produk dan kepuasan pelanggan.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 mb-4 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Misi</h3>
                    <ul class="text-gray-600 text-sm space-y-2">
                        <li class="flex items-start"><span class="text-primary-500 mr-2 mt-0.5">✓</span> Menyediakan produk berkualitas dengan harga terjangkau</li>
                        <li class="flex items-start"><span class="text-primary-500 mr-2 mt-0.5">✓</span> Memberikan pengalaman belanja yang mudah dan aman</li>
                        <li class="flex items-start"><span class="text-primary-500 mr-2 mt-0.5">✓</span> Melayani pelanggan dengan cepat dan ramah</li>
                        <li class="flex items-start"><span class="text-primary-500 mr-2 mt-0.5">✓</span> Menjadi mitra terpercaya bagi seller dan buyer</li>
                    </ul>
                </div>
            </div>

            {{-- Stats --}}
            <div class="bg-gradient-to-br from-primary-600 to-primary-800 rounded-3xl p-10 text-center">
                <h3 class="text-2xl font-bold text-white mb-8">Kami dalam Angka</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div>
                        <div class="text-3xl font-extrabold text-white mb-1">500+</div>
                        <div class="text-indigo-200 text-sm">Produk</div>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-white mb-1">1K+</div>
                        <div class="text-indigo-200 text-sm">Pelanggan</div>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-white mb-1">2K+</div>
                        <div class="text-indigo-200 text-sm">Transaksi</div>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-white mb-1">4.9⭐</div>
                        <div class="text-indigo-200 text-sm">Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
