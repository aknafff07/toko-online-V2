<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <--- Jangan lupa panggil Model Product

class ProductController extends Controller
{
    // Halaman Beranda (Home)
    public function home()
    {
        $latestProducts = Product::latest()->take(4)->get();
        return view('home', compact('latestProducts'));
    }

    // 1. Tampilkan Daftar Produk (Katalog)
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Tampilkan Detail Produk
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Fungsi Menambah Item ke Keranjang
    public function addToCart($id)
    {
        // 1. Cari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // 2. Ambil keranjang lama dari session (kalau belum ada, siapkan array kosong)
        $cart = session()->get('cart', []);

        // 3. Cek logika: Barang ini sudah ada di keranjang belum?
        if(isset($cart[$id])) {
            // Jika SUDAH ADA, cukup tambahkan jumlahnya (Quantity + 1)
            $cart[$id]['quantity']++;
        } else {
            // Jika BELUM ADA, masukkan sebagai item baru
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        // 4. Simpan kembali keranjang yang sudah diupdate ke session
        session()->put('cart', $cart);

        // 5. Kembali ke katalog dengan pesan sukses
        return redirect()->back()->with('success', 'Barang berhasil masuk keranjang!');
    }

    // Fungsi Menampilkan Halaman Keranjang
    public function cart()
    {
        return view('cart'); // Kita akan buat file cart.blade.php
    }

    // --- FITUR EDIT KERANJANG ---

    // 1. Hapus Item (Delete)
    public function deleteItem($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]); // Hapus item dari array
            session()->put('cart', $cart); // Simpan perubahan
        }

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    // 2. Tambah Jumlah (Plus)
    public function increaseItem($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++; // Tambah 1
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    // 3. Kurangi Jumlah (Minus)
    public function decreaseItem($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            // Cek: Kalau jumlahnya lebih dari 1, baru boleh dikurangi
            if($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--; // Kurang 1
                session()->put('cart', $cart);
            } else {
                // Opsional: Kalau sisa 1 dikurang lagi, mau dihapus atau biarkan?
                // Kita biarkan saja di angka 1 agar user pakai tombol hapus kalau mau membuang
            }
        }

        return redirect()->back();
    }
}
