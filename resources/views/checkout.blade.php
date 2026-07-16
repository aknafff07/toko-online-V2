@extends('layouts.app')

@section('title', 'Checkout - Toko V2')

@section('content')

    <div class="container mx-auto px-4 sm:px-6 py-10">
        <div class="max-w-4xl mx-auto">

            <div class="mb-8">
                <span class="inline-block px-3 py-1 text-xs font-semibold text-primary-600 bg-primary-50 rounded-full mb-2">CHECKOUT</span>
                <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="md:flex">

                    <div class="w-full md:w-1/2 p-8">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Informasi Pengiriman</h2>

                        <form action="/checkout" method="POST" id="checkoutForm">
                            @csrf

                            <div class="mb-5">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Penerima</label>
                                <input type="text" name="customer_name" class="w-full border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Nama Lengkap" required id="inputNamaPenerima">
                            </div>

                            <div class="mb-5">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nomor WhatsApp</label>
                                <input type="text" name="customer_phone" class="w-full border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="0812xxxx" required id="inputWhatsApp">
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Alamat Lengkap</label>
                                <textarea name="address" rows="3" class="w-full border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition resize-none" placeholder="Jalan, Nomor Rumah, Kecamatan..." required id="inputAlamat"></textarea>
                            </div>

                            <button type="submit" class="w-full btn-gradient text-white font-bold py-3.5 rounded-xl text-sm shadow-md" id="btnBuatPesanan">
                                Buat Pesanan Sekarang
                            </button>

                            <div class="mt-4 text-center">
                                <a href="/cart" class="text-sm text-gray-500 hover:text-primary-600 transition">← Kembali ke Keranjang</a>
                            </div>
                        </form>
                    </div>

                    <div class="w-full md:w-1/2 bg-gray-50 p-8 border-t md:border-t-0 md:border-l border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Ringkasan Pesanan</h3>

                        <div class="space-y-4 mb-6">
                            @php $total = 0; @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity']; @endphp

                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="bg-white border border-gray-200 rounded-lg h-10 w-10 flex items-center justify-center text-xs font-bold text-gray-500 mr-3">
                                            {{ $details['quantity'] }}x
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-700">{{ $details['name'] }}</p>
                                        </div>
                                    </div>
                                    <p class="text-sm font-bold text-gray-600">
                                        Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex justify-between items-center text-lg font-bold text-gray-800">
                                <span>Total Bayar</span>
                                <span class="text-primary-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-2 text-right italic">*Belum termasuk ongkir</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
