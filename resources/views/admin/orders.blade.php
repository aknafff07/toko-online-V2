@extends('layouts.admin')

@section('title', 'Admin Dashboard - Toko V2')

@section('content')

    <div class="mb-8">
        <span class="inline-block px-3 py-1 text-xs font-semibold text-accent-600 bg-accent-50 rounded-full mb-2">PESANAN</span>
        <h1 class="text-2xl font-bold text-gray-900">Daftar Pesanan Masuk</h1>
    </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left" id="adminOrdersTable">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 uppercase text-xs tracking-wider">
                            <th class="py-4 px-5">Order ID</th>
                            <th class="py-4 px-5">Pelanggan</th>
                            <th class="py-4 px-5">Tanggal</th>
                            <th class="py-4 px-5">Total Bayar</th>
                            <th class="py-4 px-5 text-center">Status</th>
                            <th class="py-4 px-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition">
                            <td class="py-4 px-5">
                                <p class="font-bold text-gray-900 text-sm">#{{ $order->id }}</p>
                                <a href="{{ route('orders.show', $order->id) }}" class="text-primary-500 hover:underline text-xs">Lihat Detail</a>
                            </td>

                            <td class="py-4 px-5">
                                <p class="font-semibold text-gray-800 text-sm">{{ $order->customer_name }}</p>
                                <p class="text-gray-500 text-xs">{{ $order->customer_phone }}</p>
                                <p class="text-gray-400 text-xs truncate max-w-[160px]">{{ $order->address }}</p>
                            </td>

                            <td class="py-4 px-5 text-sm">
                                <p class="text-gray-800">{{ $order->created_at->format('d M Y') }}</p>
                                <p class="text-gray-400 text-xs">{{ $order->created_at->format('H:i') }}</p>
                            </td>

                            <td class="py-4 px-5">
                                <span class="font-bold text-gray-800 text-sm">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                <br>
                                <span class="text-xs text-gray-400">{{ $order->items->sum('quantity') }} Item</span>
                            </td>

                            <td class="py-4 px-5 text-center">
                                @if($order->status == 'Unpaid')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-100 text-red-700">Belum Bayar</span>
                                @elseif($order->status == 'Paid')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-green-100 text-green-700">Sudah Bayar</span>
                                @elseif($order->status == 'Dikirim')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-100 text-blue-700">Dikirim</span>
                                @elseif($order->status == 'Selesai')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-100 text-gray-700">Selesai</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-100 text-gray-700">{{ $order->status }}</span>
                                @endif
                            </td>

                            <td class="py-4 px-5 text-center">
                                <form action="/admin/orders/{{ $order->id }}" method="POST" class="flex flex-col gap-2 items-center">
                                    @csrf
                                    @method('PUT')

                                    <select name="status" class="text-xs border border-gray-200 p-1.5 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500">
                                        <option value="Unpaid" {{ $order->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        <option value="Paid" {{ $order->status == 'Paid' ? 'selected' : '' }}>Paid (Lunas)</option>
                                        <option value="Dikirim" {{ $order->status == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                                        <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>

                                    <button type="submit" class="btn-gradient text-white text-xs py-1.5 px-3 rounded-lg font-semibold">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($orders->isEmpty())
                <div class="p-12 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <p class="text-gray-500 font-medium">Belum ada pesanan masuk.</p>
                </div>
            @endif
        </div>

@endsection
