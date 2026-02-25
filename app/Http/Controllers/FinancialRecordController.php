<?php

namespace App\Http\Controllers;

use App\Models\FinancialRecord;
use Illuminate\Http\Request;

class FinancialRecordController extends Controller
{
    public function index()
    {
        $records = FinancialRecord::latest()->get();

        $totalPemasukan = FinancialRecord::where('type', 'pemasukan')->sum('amount');

        $totalPengeluaran = FinancialRecord::where('type', 'pengeluaran')->sum('amount');

        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        return view('dashboard', compact('records', 'totalPemasukan', 'totalPengeluaran', 'saldoAkhir'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|in:pemasukan,pengeluaran',
            'date' => 'required|date',
        ]);

        FinancialRecord::create([
            'user_id' => auth()->id(),
            'description' => $request->description,
            'amount' => $request->amount,
            'type' => $request->type,
            'date' => $request->date,
        ]);

        return redirect()->route('dashboard')->with('success', 'Transaksi berhasil disimpan!');
    }
}