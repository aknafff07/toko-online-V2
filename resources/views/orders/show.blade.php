@extends('layouts.app')

@section('title', 'Order #' . $order->id . ' - Toko V2')

@section('content')

    <div class="container mx-auto px-4 sm:px-6 py-10">
        <div class="max-w-3xl mx-auto">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Invoice</h1>
                            <p class="text-indigo-200 text-sm">Order ID: #{{ $order->id }}</p>
                            <p class="text-indigo-200 text-sm">Tanggal: {{ $order->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div>
                            @if($order->status == 'Unpaid')
                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-red-100 text-red-800">
                                    ⏳ {{ $order->status }}
                                </span>
                            @elseif($order->status == 'Paid')
                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-green-100 text-green-800">
                                    ✅ {{ $order->status }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-blue-100 text-blue-800">
                                    📦 {{ $order->status }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    {{-- Info Pengiriman --}}
                    <div class="mb-8 bg-gray-50 p-5 rounded-xl">
                        <h3 class="font-bold text-gray-700 mb-3 text-sm uppercase tracking-wider">Informasi Pengiriman</h3>
                        <div class="space-y-1 text-sm text-gray-600">
                            <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
                            <p><strong>WhatsApp:</strong> {{ $order->customer_phone }}</p>
                            <p><strong>Alamat:</strong> {{ $order->address }}</p>
                        </div>
                    </div>

                    {{-- Rincian Pesanan --}}
                    <div class="mb-8">
                        <h3 class="font-bold text-gray-700 mb-4 text-sm uppercase tracking-wider">Rincian Pesanan</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left" id="invoiceTable">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                        <th class="p-3 rounded-l-lg">Produk</th>
                                        <th class="p-3 text-center">Jumlah</th>
                                        <th class="p-3 text-right">Harga Satuan</th>
                                        <th class="p-3 text-right rounded-r-lg">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr class="border-b border-gray-100">
                                            <td class="p-3 text-sm font-semibold text-gray-800">{{ $item->product->name }}</td>
                                            <td class="p-3 text-center text-sm text-gray-600">{{ $item->quantity }}</td>
                                            <td class="p-3 text-right text-sm text-gray-600">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                            <td class="p-3 text-right text-sm font-bold text-gray-800">
                                                Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="p-3 text-right font-bold text-gray-600 text-sm">Grand Total</td>
                                        <td class="p-3 text-right font-bold text-primary-600 text-lg">
                                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    {{-- Payment Info --}}
                    <div class="text-center bg-primary-50 p-6 rounded-xl border border-primary-100">
                        <p class="text-gray-700 mb-2 text-sm">Silakan transfer total pembayaran ke:</p>
                        <h2 class="text-xl font-bold text-primary-800">BCA 123-456-7890</h2>
                        <p class="text-sm text-gray-500 mt-1">a.n Toko V2 Sejahtera</p>

                        <a href="https://wa.me/{{ $order->customer_phone }}?text=Halo%20saya%20sudah%20bayar%20order%20%23{{ $order->id }}"
                           class="inline-block mt-4 bg-green-500 text-white font-bold py-2.5 px-6 rounded-xl hover:bg-green-600 transition shadow-md text-sm" id="btnKonfirmasiWA">
                            Konfirmasi Pembayaran via WA
                        </a>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="/" class="text-gray-500 hover:text-primary-600 text-sm transition">← Kembali ke Beranda</a>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
