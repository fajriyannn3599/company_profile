<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Governance;
use Illuminate\Http\Request;
use App\Models\PageView;
use Illuminate\View\View;

class GovernanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Ambil governance (tanpa named argument)
        $governances = Governance::latest()->paginate(6);

        // Ambil atau buat record counter untuk halaman 'governance'
        $pageView = PageView::firstOrCreate(
            ['page' => 'governance'], // attributes
            ['views' => 0]            // values
        );

        // Anti-spam dengan session: hanya tambah sekali per session
        if (!session()->has('governance_viewed')) {
            $pageView->increment('views');
            session(['governance_viewed' => true]);
        }

        // Kembalikan view (argumen biasa)
        return view('frontend.governances.index', [
            'governances' => $governances,
            'views' => $pageView->views,
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
