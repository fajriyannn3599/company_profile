<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FinancialReport;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{
    public function index()
    {
        $financialReports = FinancialReport::latest()->paginate(6);
        return view('frontend.financial-reports.index', compact('financialReports'));
    }
}