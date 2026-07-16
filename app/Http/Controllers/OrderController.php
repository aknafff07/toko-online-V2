<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;      // <--- Panggil Model Order
use App\Models\OrderItem;  // <--- Panggil Model OrderItem
use App\Models\Product; // <--- Tambahkan baris ini di paling atas

class OrderController extends Controller
{
    // 1. Tampilkan Halaman Form Checkout
    public function checkout()
    {
        return view('checkout');
    }

    // 2. PROSES UTAMA: Simpan Transaksi
    public function store(Request $request)
    {
        // A. Validasi Input
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        // B. Ambil Keranjang
        $cart = session()->get('cart');

        // Cek dulu, kalau keranjang kosong jangan boleh checkout
        if(!$cart) {
            return redirect('/')->with('error', 'Keranjang Anda kosong!');
        }

        // C. Hitung Total Bayar Otomatis
        $totalPrice = 0;
        foreach($cart as $id => $details) {
            $totalPrice += $details['price'] * $details['quantity'];
        }

        // D. SIMPAN KE TABEL ORDERS (Kepala Struk)
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'address' => $request->address,
            'total_price' => $totalPrice,
            'status' => 'Unpaid',
        ]);

        // E. SIMPAN KE TABEL ORDER_ITEMS (Baris Barang)
        foreach($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,     // Ambil ID dari order yang baru dibuat
                'product_id' => $id,          // ID Produk (Key array session)
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);

            // 2. POTONG STOK PRODUK (LOGIKA BARU)
            // Cari produknya, lalu kurangi stoknya sesuai jumlah beli
            $product = Product::find($id);
            $product->decrement('stock', $details['quantity']);
        }

        // F. Hapus Keranjang (Karena sudah terbeli)
        session()->forget('cart');

        // G. Redirect ke halaman Sukses
        // Kita kirim ID Order agar bisa ditampilkan di pesan sukses
        // return redirect('/')->with('success', 'Pesanan Berhasil! Nomor Order: #' . $order->id);
        return redirect()->route('orders.show', $order->id);
    }

    // Fungsi Menampilkan Detail Order (Invoice)
    public function show($id)
    {
        // Cari order berdasarkan ID, sekalian ambil data item & produknya
        // 'items.product' artinya: Ambil order -> ambil itemnya -> ambil detail produk tiap item
        $order = Order::with('items.product')->findOrFail($id);

        return view('orders.show', compact('order'));
    }
}
