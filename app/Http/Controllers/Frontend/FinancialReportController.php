<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FinancialReport;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class FinancialReportController extends Controller
{
    public function index(): View
    {
        // Ambil semua laporan keuangan dengan pagination
        $financialReports = FinancialReport::latest()->paginate(6);

        // Ambil laporan keuangan pertama sebagai counter global
        $financialReportCounter = FinancialReport::first();

        if ($financialReportCounter) {
            $lastViewed = session('financial_report_viewed');

            if (!$lastViewed) {
                // Jika belum ada session -> tambahkan views
                $financialReportCounter->increment('views');
                session(['financial_report_viewed' => now()]);
            } else {
                // Konversi session ke Carbon
                $lastViewedTime = Carbon::parse($lastViewed);

                // Jika sudah lebih dari 10 menit -> tambahkan views lagi
                if ($lastViewedTime->diffInMinutes(now()) >= 10) {
                    $financialReportCounter->increment('views');
                    session(['financial_report_viewed' => now()]);
                }
            }

            $views = $financialReportCounter->views;
        } else {
            $views = 0;
        }

        return view('frontend.financial-reports.index', [
            'financialReports' => $financialReports,
            'views' => $views,
        ]);
    }
}