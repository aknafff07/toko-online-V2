<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // <--- Panggil Model Order

class AdminController extends Controller
{
    // 1. Halaman Dashboard Admin
    public function index()
    {
        // Ambil semua order, urutkan dari yang terbaru
        // with('items') biar kita bisa hitung jumlah item per order
        $orders = Order::with('items')->latest()->get();

        return view('admin.orders', compact('orders'));
    }

    // 2. Proses Ganti Status (Paid/Sent/Cancel)
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Update kolom status sesuai pilihan di form
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status Order #' . $id . ' berhasil diperbarui!');
    }
}
