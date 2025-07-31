<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Service; // ✅ Tambahkan ini
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->get();
    return view('frontend.contact', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'jenis_produk' => 'required|string|max:255',
            'nilai_pembiayaan' => 'required|integer|max:99999999999999',
            'lokasi' => 'required|string|max:255',
        ]);

        Message::create($request->all());

        return redirect()->route('contact')
            ->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
