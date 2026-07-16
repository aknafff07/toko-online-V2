@extends('layouts.admin')

@section('title', 'Katalog Produk (Admin) - Toko V2')

@section('content')

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
            <span class="inline-block px-3 py-1 text-xs font-semibold text-primary-600 bg-primary-100 rounded-full mb-2">MANAJEMEN</span>
            <h1 class="text-2xl font-bold text-gray-900">Katalog Produk</h1>
        </div>
        <a href="/admin/products/create" class="bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition-all flex items-center text-sm">
            <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Produk
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-gray-500 uppercase text-xs tracking-wider">
                        <th class="py-4 px-5 w-16">Foto</th>
                        <th class="py-4 px-5">Info Produk</th>
                        <th class="py-4 px-5">Harga</th>
                        <th class="py-4 px-5">Stok</th>
                        <th class="py-4 px-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-3 px-5">
                                <div class="w-12 h-12 rounded-lg border border-gray-200 overflow-hidden bg-gray-100">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="py-3 px-5">
                                <p class="font-bold text-gray-900 text-sm">{{ $product->name }}</p>
                                <p class="text-xs text-gray-500 line-clamp-1">{{ $product->description }}</p>
                            </td>
                            <td class="py-3 px-5 font-semibold text-gray-800 text-sm">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="py-3 px-5">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-lg {{ $product->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="py-3 px-5 text-center space-x-2">
                                <div class="flex justify-center items-center space-x-2">
                                    <a href="/admin/products/{{ $product->id }}/edit" class="text-blue-500 hover:text-blue-700 text-sm font-medium transition bg-blue-50 hover:bg-blue-100 p-2 rounded-lg" title="Edit">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    
                                    <form action="/admin/products/{{ $product->id }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->name }}? Ini tidak dapat dikembalikan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium transition bg-red-50 hover:bg-red-100 p-2 rounded-lg" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($products->isEmpty())
            <div class="p-12 text-center text-gray-500">
                <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <p class="font-medium">Belum ada produk di katalog.</p>
                <p class="text-sm mt-1">Silakan tambah produk baru.</p>
            </div>
        @endif
    </div>

@endsection
