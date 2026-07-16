@extends('layouts.app')

@section('title', 'Keranjang Belanja - Toko V2')

@section('content')

    <div class="container mx-auto px-4 sm:px-6 py-10">
        <div class="max-w-4xl mx-auto">

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div>
                    <span class="inline-block px-3 py-1 text-xs font-semibold text-primary-600 bg-primary-50 rounded-full mb-2">KERANJANG</span>
                    <h1 class="text-3xl font-bold text-gray-900">Keranjang Belanja</h1>
                </div>
                <a href="/katalog" class="text-primary-600 hover:text-primary-700 font-semibold text-sm flex items-center group" id="btnLanjutBelanja">
                    <svg class="w-4 h-4 mr-1 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                    Lanjut Belanja
                </a>
            </div>

            @if(session('cart'))
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left" id="cartTable">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 uppercase text-xs tracking-wider">
                                    <th class="py-4 px-6">Produk</th>
                                    <th class="py-4 px-6 text-right">Harga</th>
                                    <th class="py-4 px-6 text-center">Jumlah</th>
                                    <th class="py-4 px-6 text-right">Subtotal</th>
                                    <th class="py-4 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $total = 0; @endphp

                                @foreach(session('cart') as $id => $details)
                                    @php
                                        $subtotal = $details['price'] * $details['quantity'];
                                        $total += $subtotal;
                                    @endphp

                                    <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center">
                                                <img class="w-14 h-14 rounded-xl border border-gray-100 object-cover mr-4 shadow-sm" src="{{ asset('storage/' . $details['image']) }}">
                                                <span class="font-semibold text-gray-800 text-sm">{{ $details['name'] }}</span>
                                            </div>
                                        </td>

                                        <td class="py-4 px-6 text-right text-sm text-gray-600">
                                            Rp {{ number_format($details['price'], 0, ',', '.') }}
                                        </td>

                                        <td class="py-4 px-6 text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <a href="/cart/decrease/{{ $id }}" class="w-7 h-7 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center text-gray-600 text-sm font-bold transition">
                                                    -
                                                </a>
                                                <span class="text-sm font-bold text-gray-800 min-w-[30px] text-center">
                                                    {{ $details['quantity'] }}
                                                </span>
                                                <a href="/cart/increase/{{ $id }}" class="w-7 h-7 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center text-gray-600 text-sm font-bold transition">
                                                    +
                                                </a>
                                            </div>
                                        </td>

                                        <td class="py-4 px-6 text-right font-bold text-primary-600 text-sm">
                                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                                        </td>

                                        <td class="py-4 px-6 text-center">
                                            <a href="/cart/delete/{{ $id }}"
                                               onclick="return confirm('Yakin ingin menghapus {{ $details['name'] }}?')"
                                               class="text-red-400 hover:text-red-600 transition inline-block"
                                               title="Hapus Item">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="p-6 bg-gray-50/50 border-t border-gray-100">
                        <div class="flex flex-col sm:flex-row justify-end items-end sm:items-center gap-4">
                            <div class="text-right">
                                <p class="text-sm text-gray-500 mb-1">Total Pembayaran</p>
                                <h2 class="text-2xl font-bold text-gray-900">Rp {{ number_format($total, 0, ',', '.') }}</h2>
                            </div>
                            <a href="/checkout" class="btn-gradient text-white font-bold py-3 px-8 rounded-xl shadow-md text-sm" id="btnCheckout">
                                Checkout Sekarang →
                            </a>
                        </div>
                    </div>
                </div>

            @else
                <div class="text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <div class="w-20 h-20 mx-auto mb-4 bg-primary-50 rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Keranjang Kosong</h2>
                    <p class="text-gray-500 mb-6">Sepertinya Anda belum memilih barang apapun.</p>
                    <a href="/katalog" class="btn-gradient text-white px-6 py-2.5 rounded-xl font-semibold text-sm shadow-md">Mulai Belanja</a>
                </div>
            @endif

        </div>
    </div>

@endsection
