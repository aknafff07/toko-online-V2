@extends('layouts.admin')

@section('title', 'Edit Produk - Admin Toko V2')

@section('content')

    <div class="mb-6">
        <a href="/admin/products" class="text-primary-600 hover:text-primary-700 text-sm font-semibold flex items-center transition mb-2">
            <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Katalog Admin
        </a>
        <h1 class="text-2xl font-bold text-gray-900">Edit Produk: {{ $product->name }}</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <form action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition bg-gray-50 hover:bg-white focus:bg-white" required>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ $product->price }}" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition bg-gray-50 hover:bg-white focus:bg-white" required min="0">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Stok</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition bg-gray-50 hover:bg-white focus:bg-white" required min="0">
                </div>
            </div>

            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Deskripsi Lengkap</label>
                <textarea name="description" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition resize-none bg-gray-50 hover:bg-white focus:bg-white" rows="4">{{ $product->description }}</textarea>
            </div>

            <div class="mb-8 p-5 border border-gray-200 rounded-xl bg-gray-50 flex flex-col md:flex-row gap-6 items-start">
                <div class="flex-shrink-0">
                    <p class="text-xs font-semibold text-gray-500 mb-2 uppercase">Foto Saat Ini</p>
                    <div class="w-32 h-32 rounded-lg border border-gray-200 overflow-hidden bg-white">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Foto Produk" class="w-full h-full object-cover">
                    </div>
                </div>
                
                <div class="flex-1 w-full">
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Ganti Foto Baru (Opsional)</label>
                    <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-100 file:text-primary-700 hover:file:bg-primary-200 transition">
                    <p class="text-xs text-gray-500 mt-2">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <button type="submit" class="w-full sm:w-auto px-8 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-md transition text-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

@endsection
