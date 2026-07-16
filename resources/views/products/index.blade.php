@extends('layouts.app')

@section('title', 'Katalog Produk - Toko V2')
@section('meta_description', 'Jelajahi katalog produk lengkap Toko V2. Temukan barang impianmu dengan harga terbaik.')

@section('content')

    <div class="container mx-auto px-4 sm:px-6 py-10">

        <div class="mb-8">
            <span class="inline-block px-3 py-1 text-xs font-semibold text-primary-600 bg-primary-50 rounded-full mb-3">KATALOG</span>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Katalog Produk</h1>
            <p class="text-gray-500">Temukan barang impianmu dengan harga terbaik.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach($products as $product)
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col">

                <a href="/katalog/{{ $product->id }}" class="block h-52 overflow-hidden bg-gray-100 relative">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
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

        @if($products->isEmpty())
            <div class="text-center py-20">
                <div class="w-20 h-20 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-700 mb-2">Belum ada produk yang dijual</h3>
                <p class="text-gray-500 mb-4">Jadilah yang pertama menambahkan produk!</p>
                <a href="/products/create" class="btn-gradient text-white px-6 py-2.5 rounded-xl font-semibold text-sm shadow-md">Input Sekarang</a>
            </div>
        @endif

    </div>

@endsection
