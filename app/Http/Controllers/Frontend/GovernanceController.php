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
        // Ambil governance (pagination)
        $governances = Governance::latest()->paginate(6);

        // Ambil atau buat counter governance
        $governanceCounter = Governance::firstOrCreate(
            ['title' => 'Governance Counter'],
            ['views' => 0]
        );

        // Cek session untuk anti spam
        $lastViewed = session('governance_viewed');

        if (!$lastViewed) {
            // Pertama kali buka → tambah views
            $governanceCounter->increment('views');
            session(['governance_viewed' => now()->toDateTimeString()]);
        } else {
            // Konversi ke Carbon
            $lastViewedTime = Carbon::parse($lastViewed);

            // Tambah views lagi hanya kalau sudah lebih dari 10 menit
            if ($lastViewedTime->diffInMinutes(now()) >= 10) {
                $governanceCounter->increment('views');
                session(['governance_viewed' => now()->toDateTimeString()]);
            }
        }

        return view('frontend.governances.index', [
            'governances' => $governances,
            'views' => $governanceCounter->views,
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
