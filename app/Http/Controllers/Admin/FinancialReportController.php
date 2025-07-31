<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FinancialReportController extends Controller
{
    /**
     * Tampilkan semua laporan.
     */
    public function index()
    {
        $financialReports = FinancialReport::latest()->paginate(10); // atau ->get();
        return view('admin.financial-reports.index', compact('financialReports'));
    }

    /**
     * Tampilkan form tambah laporan.
     */
    public function create()
    {
        return view('admin.financial-reports.create');
    }

    /**
     * Simpan laporan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        // Simpan file PDF
        // $filePath = $request->file('file')->store('financial-reports', 'public');

        $originalName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('financial-reports', $originalName, 'public');

        // $originalName = $request->file('file')->getClientOriginalName();
        // $timestampedName = time() . '_' . $originalName;
        // $filePath = $request->file('file')->storeAs('financial-reports', $timestampedName, 'public');


        FinancialReport::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.financial-reports.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail laporan (opsional).
     */
    public function show(FinancialReport $financialReport)
    {
        return view('admin.financial-reports.show', compact('financialReport'));
    }

    /**
     * Form edit laporan.
     */
    public function edit(FinancialReport $financialReport)
    {
        return view('admin.financial-reports.edit', compact('financialReport'));
    }

    /**
     * Simpan update laporan.
     */
    public function update(Request $request, FinancialReport $financialReport)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Jika file baru diupload
        if ($request->hasFile('file')) {
            // Hapus file lama
            if (Storage::disk('public')->exists($financialReport->file_path)) {
                Storage::disk('public')->delete($financialReport->file_path);
            }

            $data['file_path'] = $request->file('file')->store('financial-reports', 'public');
        }

        $financialReport->update($data);

        return redirect()->route('admin.financial-reports.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Hapus laporan.
     */
    public function destroy(FinancialReport $financialReport)
    {
        if (Storage::disk('public')->exists($financialReport->file_path)) {
            Storage::disk('public')->delete($financialReport->file_path);
        }

        $financialReport->delete();

        return redirect()->route('admin.financial-reports.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
