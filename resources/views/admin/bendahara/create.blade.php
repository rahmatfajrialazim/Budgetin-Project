<x-app-layout>
    <div style="background-color: #f8fafc; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
        <div style="background: white; width: 100%; max-width: 500px; padding: 40px; border-radius: 24px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); border: 1px solid #f1f5f9;">
            
            <div style="text-align: center; margin-bottom: 35px;">
                <div style="display: inline-block; padding: 12px; background-color: #eef2ff; border-radius: 16px; margin-bottom: 15px;">
                    <svg style="width: 30px; height: 30px; color: #4f46e5;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <h2 style="font-size: 24px; font-weight: 800; color: #1e293b; margin: 0; letter-spacing: -0.025em;">Tambah Bendahara</h2>
                <p style="color: #64748b; font-size: 14px; margin-top: 8px;">Daftarkan pengelola keuangan baru untuk sistem.</p>
            </div>
            
            <form action="{{ route('admin.bendahara.store') }}" method="POST">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Nama Lengkap</label>
                    <input type="text" name="name" placeholder="Masukkan nama lengkap..." style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 12px 16px; font-size: 15px; transition: border-color 0.2s;" required>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Alamat Email</label>
                    <input type="email" name="email" placeholder="contoh@domain.com" style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 12px 16px; font-size: 15px;" required>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Password</label>
                    <input type="password" name="password" placeholder="••••••••" style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 12px 16px; font-size: 15px;" required>
                    <p style="font-size: 11px; color: #94a3b8; margin-top: 6px; font-style: italic;">*Gunakan minimal 8 karakter campuran.</p>
                </div>

                <button type="submit" 
                        style="width: 100%; background-color: #4f46e5; color: white; padding: 16px; border: none; border-radius: 14px; font-weight: 700; font-size: 15px; cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);">
                        SIMPAN & DAFTARKAN
                </button>
                
                <div style="text-align: center; margin-top: 20px;">
                    <a href="{{ route('dashboard') }}" style="color: #94a3b8; text-decoration: none; font-size: 14px; font-weight: 600; transition: color 0.2s;">
                        ← Kembali ke Dashboard
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>