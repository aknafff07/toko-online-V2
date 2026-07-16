@extends('layouts.admin')

@section('title', 'Tambah Produk - Admin Toko V2')

@section('content')

    <div class="mb-6">
        <a href="/admin/products" class="text-primary-600 hover:text-primary-700 text-sm font-semibold flex items-center transition mb-2">
            <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Katalog Admin
        </a>
        <h1 class="text-2xl font-bold text-gray-900">Tambah Produk Baru</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <form action="/admin/products" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
            @csrf

            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Produk</label>
                <input type="text" name="name" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition bg-gray-50 hover:bg-white focus:bg-white" required placeholder="Contoh: Sepatu Sneakers Pria">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Harga (Rp)</label>
                    <input type="number" name="price" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition bg-gray-50 hover:bg-white focus:bg-white" required min="0" placeholder="0">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Stok</label>
                    <input type="number" name="stock" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition bg-gray-50 hover:bg-white focus:bg-white" required min="0" placeholder="0">
                </div>
            </div>

            <div class="mb-5">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Deskripsi Lengkap</label>
                <textarea name="description" class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition resize-none bg-gray-50 hover:bg-white focus:bg-white" rows="4" placeholder="Jelaskan detail dan spesifikasi produk Anda..."></textarea>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Foto Produk</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl overflow-hidden hover:border-primary-500 hover:bg-primary-50/50 transition">
                    <div class="space-y-2 text-center text-sm">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex flex-col sm:flex-row items-center justify-center text-gray-600 space-x-1">
                            <label for="image-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                <span>Upload sebuah file</span>
                                <input id="image-upload" name="image" type="file" class="sr-only" required accept="image/png, image/jpeg, image/jpg">
                            </label>
                            <span class="mt-1 sm:mt-0">atau seret dan lepas</span>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, JPEG hingga 2MB
                        </p>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <button type="submit" class="w-full sm:w-auto px-8 bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 rounded-xl shadow-md transition text-sm">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>

@endsection
