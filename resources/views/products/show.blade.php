@extends('layouts.app')

@section('title', $product->name . ' - Toko V2')
@section('meta_description', Str::limit($product->description, 160))

@section('content')
    <div class="container mx-auto px-4 sm:px-6 py-10 lg:py-16">
        
        {{-- Breadcrumb --}}
        <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="hover:text-primary-600 transition">Beranda</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                        <a href="/katalog" class="ml-1 md:ml-2 hover:text-primary-600 transition">Katalog</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="ml-1 md:ml-2 text-gray-800 font-semibold truncate max-w-[200px] sm:max-w-xs">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                
                {{-- Product Image Section --}}
                <div class="bg-gray-50 p-8 lg:p-12 flex items-center justify-center relative group">
                    @if($product->created_at->diffInDays(now()) < 7)
                        <span class="absolute top-6 left-6 px-3 py-1.5 bg-green-500 text-white text-sm font-bold rounded-xl shadow-md z-10">Baru!</span>
                    @endif
                    <div class="w-full max-w-md aspect-square bg-white rounded-2xl p-4 shadow-sm border border-gray-100 relative overflow-hidden">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover rounded-xl transform group-hover:scale-105 transition duration-700 ease-out">
                    </div>
                </div>

                {{-- Product Details Section --}}
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    
                    <div class="mb-2 text-sm font-semibold text-primary-600 uppercase tracking-widest">
                        Kategori Produk
                    </div>
                    
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-4 leading-tight">
                        {{ $product->name }}
                    </h1>
                    
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="text-3xl font-bold text-primary-600">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                        <div class="px-3 py-1 rounded-lg bg-gray-100 text-gray-600 text-sm font-medium">
                            Stok: {{ $product->stock }}
                        </div>
                    </div>

                    <div class="prose prose-sm sm:prose-base text-gray-600 mb-10 leading-relaxed border-t border-b border-gray-100 py-6">
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/add-to-cart/{{ $product->id }}" 
                           class="flex-1 btn-gradient text-white text-center font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transition-all active:scale-[0.98] flex items-center justify-center space-x-2">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                            </svg>
                            <span>Masukkan Keranjang</span>
                        </a>
                        <button onclick="window.history.back()" 
                                class="sm:flex-none border-2 border-gray-200 text-gray-700 hover:border-primary-500 hover:text-primary-600 font-bold py-4 px-8 rounded-xl transition-colors flex items-center justify-center">
                            Kembali
                        </button>
                    </div>
                    
                    {{-- Features --}}
                    <div class="grid grid-cols-2 gap-4 mt-10">
                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                            <div class="p-2 bg-green-50 rounded-lg text-green-600">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span>100% Original</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                            <div class="p-2 bg-blue-50 rounded-lg text-blue-600">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span>Garansi Resmi</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
