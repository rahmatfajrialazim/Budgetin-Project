<x-app-layout>
    <div style="background-color: #f3f4f6; min-height: 100vh; padding-bottom: 50px;">
        
        <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
            
            <div style="background: white; padding: 25px; border-radius: 15px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border: 1px solid #e5e7eb;">
                <div>
                    <h1 style="font-size: 24px; font-weight: 800; color: #111827; margin: 0;">Dashboard BudgetIn</h1>
                    <p style="color: #6b7280; margin: 5px 0 0 0;">Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>
                </div>
                @if(auth()->user()->role == 'admin')
                <a href="{{ route('admin.bendahara.create') }}" 
                   style="background-color: #4f46e5; color: white; padding: 12px 20px; border-radius: 10px; font-weight: bold; text-decoration: none; display: inline-block;">
                   + TAMBAH BENDAHARA
                </a>
                @endif
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">
                <div style="background: white; padding: 20px; border-radius: 12px; border-left: 5px solid #10b981;">
                    <p style="font-size: 12px; color: #9ca3af; font-weight: bold; margin-bottom: 5px;">PEMASUKAN</p>
                    <p style="font-size: 20px; font-weight: bold; color: #10b981; margin: 0;">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
                </div>
                <div style="background: white; padding: 20px; border-radius: 12px; border-left: 5px solid #ef4444;">
                    <p style="font-size: 12px; color: #9ca3af; font-weight: bold; margin-bottom: 5px;">PENGELUARAN</p>
                    <p style="font-size: 20px; font-weight: bold; color: #ef4444; margin: 0;">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                </div>
                <div style="background: white; padding: 20px; border-radius: 12px; border-left: 5px solid #3b82f6;">
                    <p style="font-size: 12px; color: #9ca3af; font-weight: bold; margin-bottom: 5px;">SALDO AKHIR</p>
                    <p style="font-size: 20px; font-weight: bold; color: #3b82f6; margin: 0;">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px; align-items: start;">
                
                <div style="background: white; padding: 25px; border-radius: 15px; border: 1px solid #e5e7eb;">
                    <h3 style="font-weight: bold; margin-bottom: 20px;">📝 Catat Transaksi</h3>
                    <form action="{{ route('financial.store') }}" method="POST">
                        @csrf
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 12px; font-weight: bold; color: #374151; margin-bottom: 5px;">KETERANGAN</label>
                            <input type="text" name="description" style="width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px;" required>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 12px; font-weight: bold; color: #374151; margin-bottom: 5px;">NOMINAL (RP)</label>
                            <input type="number" name="amount" style="width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px;" required>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 12px; font-weight: bold; color: #374151; margin-bottom: 5px;">TIPE</label>
                            <select name="type" style="width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px;">
                                <option value="pemasukan">Pemasukan (+)</option>
                                <option value="pengeluaran">Pengeluaran (-)</option>
                            </select>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-size: 12px; font-weight: bold; color: #374151; margin-bottom: 5px;">TANGGAL</label>
                            <input type="date" name="date" value="{{ date('Y-m-d') }}" style="width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px;" required>
                        </div>
                        <button type="submit" 
                                style="width: 100%; background-color: #059669; color: white; padding: 15px; border: none; border-radius: 10px; font-weight: bold; cursor: pointer;">
                                SIMPAN TRANSAKSI
                        </button>
                    </form>
                </div>

                <div style="background: white; border-radius: 15px; border: 1px solid #e5e7eb; overflow: hidden; height: 505px; display: flex; flex-direction: column;">
                    
                    <div style="padding: 20px; border-bottom: 1px solid #f3f4f6; background: #f9fafb;">
                        <h3 style="font-weight: bold; margin: 0; color: #111827;">📊 Riwayat Terakhir</h3>
                    </div>
                    
                    <div style="overflow-y: auto; flex: 1;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead style="position: sticky; top: 0; background: white; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                                <tr>
                                    <th style="padding: 12px 20px; text-align: left; font-size: 11px; color: #6b7280;">TANGGAL</th>
                                    <th style="padding: 12px 20px; text-align: left; font-size: 11px; color: #6b7280;">KETERANGAN</th>
                                    <th style="padding: 12px 20px; text-align: right; font-size: 11px; color: #6b7280;">NOMINAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $item)
                                <tr style="border-bottom: 1px solid #f3f4f6;">
                                    <td style="padding: 15px 20px; font-size: 14px; color: #4b5563;">{{ \Carbon\Carbon::parse($item->date)->format('Y-m-d') }}</td>
                                    <td style="padding: 15px 20px; font-size: 14px; font-weight: bold; color: #1f2937;">{{ $item->description }}</td>
                                    <td style="padding: 15px 20px; font-size: 14px; text-align: right; font-weight: bold; color: {{ $item->type == 'pemasukan' ? '#059669' : '#dc2626' }};">
                                        {{ $item->type == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($item->amount, 0, ',', '.') }}
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="3" style="padding: 40px; text-align: center; color: #9ca3af; font-style: italic;">Belum ada transaksi di sistem.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>