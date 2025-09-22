<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Governance;
use Illuminate\Http\Request;
use App\Models\PageView;
use Illuminate\View\View;
use Carbon\Carbon;

class GovernanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Ambil governance (dengan pagination)
        $governances = Governance::latest()->paginate(6);

        // Cari governance pertama untuk dijadikan counter, 
        // jika tidak ada maka buat dengan file_path kosong
        $governanceCounter = Governance::firstOrCreate(
            ['title' => 'Governance Counter'], // kunci unik
            [
                'views' => 0,
                'file_path' => '', // default supaya tidak error
            ]
        );

        if (!session()->has('governance_viewed')) {
            // Tambah views pertama kali user buka halaman
            $governanceCounter->increment('views');
            session(['governance_viewed' => now()->toDateTimeString()]);
        } else {
            $lastViewed = session('governance_viewed');
            $lastViewedTime = \Carbon\Carbon::parse($lastViewed);

            // Cegah spam, hanya tambah view kalau sudah lewat 10 menit
            if (now()->diffInMinutes($lastViewedTime) >= 10) {
                $governanceCounter->increment('views');
                session(['governance_viewed' => now()->toDateTimeString()]);
            }
        }

        $views = $governanceCounter->views;

        return view('frontend.governances.index', [
            'governances' => $governances,
            'views' => $views,
        ]);
    }









    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
