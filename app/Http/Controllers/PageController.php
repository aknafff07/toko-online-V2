<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    // Halaman Tentang Kami
    public function about()
    {
        return view('about');
    }

    // Halaman Hubungi Kami
    public function contact()
    {
        return view('contact');
    }
}
