@extends('layouts.app')

@section('title', 'Hubungi Kami - Toko V2')
@section('meta_description', 'Hubungi Toko V2 untuk pertanyaan, saran, atau bantuan. Tim kami siap melayani Anda.')

@section('content')

    {{-- Header --}}
    <section class="bg-gradient-to-br from-primary-600 via-primary-700 to-primary-900 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-80 h-80 bg-accent-500/10 rounded-full blur-3xl -translate-y-1/3 -translate-x-1/4"></div>
        <div class="container mx-auto px-4 sm:px-6 py-16 lg:py-20 relative z-10 text-center">
            <span class="inline-block px-3 py-1 text-xs font-semibold text-white/80 bg-white/10 rounded-full mb-4 backdrop-blur-sm">HUBUNGI KAMI</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4">Kami Siap Membantu Anda</h1>
            <p class="text-indigo-100 text-lg max-w-xl mx-auto">Punya pertanyaan atau butuh bantuan? Jangan ragu untuk menghubungi kami.</p>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 60L720 30L1440 60V60H0Z" fill="#f9fafb"/>
            </svg>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="container mx-auto px-4 sm:px-6 py-16">
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

                {{-- Contact Info --}}
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Alamat</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">Jl. Contoh No. 123, Kelurahan ABC, Kecamatan XYZ, Jakarta Selatan 12345</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Telepon / WhatsApp</h3>
                                <p class="text-gray-600 text-sm">0812-3456-7890</p>
                                <a href="https://wa.me/6281234567890" class="text-green-600 text-sm font-medium hover:underline mt-1 inline-block" id="waLink">Chat via WhatsApp →</a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Email</h3>
                                <p class="text-gray-600 text-sm">info@tokoonline.com</p>
                                <p class="text-gray-500 text-xs mt-1">Balas dalam 1x24 jam</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Jam Operasional</h3>
                                <p class="text-gray-600 text-sm">Senin - Jumat: 08:00 - 17:00</p>
                                <p class="text-gray-600 text-sm">Sabtu: 08:00 - 12:00</p>
                                <p class="text-gray-500 text-xs mt-1">Minggu & Hari Libur: Tutup</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Kirim Pesan</h2>
                        <p class="text-gray-500 text-sm mb-6">Isi formulir di bawah ini dan kami akan segera menghubungi Anda.</p>

                        <form class="space-y-5" id="contactForm">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Lengkap</label>
                                    <input type="text" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Nama Anda" id="contactName">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                                    <input type="email" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="email@contoh.com" id="contactEmail">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Subjek</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition" placeholder="Topik pesan Anda" id="contactSubject">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Pesan</label>
                                <textarea rows="5" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition resize-none" placeholder="Tulis pesan Anda di sini..." id="contactMessage"></textarea>
                            </div>

                            <button type="button" class="w-full btn-gradient text-white font-semibold py-3.5 rounded-xl text-sm shadow-md" id="contactSubmitBtn"
                                    onclick="alert('Terima kasih! Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.')">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
