
<x-guest-layout>
    <div style="min-height: 100vh; background: #F8F7F1; display: flex; align-items: center; justify-content: center; padding: 30px 16px;">
        <div style="width: 100%; max-width: 460px; background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(16,43,85,0.12);">

            <div style="background: #102B55; padding: 32px 25px; text-align: center;">
                <div style="color: #EBD58F; font-size: 13px; letter-spacing: 3px; font-weight: bold;">
                    STUDENT CARE & PROTECTION
                </div>

                <h1 style="color: white; font-size: 34px; font-weight: bold; margin-top: 12px;">
                    NAWARA
                </h1>

                <p style="color: #EBD58F; font-size: 13px; margin-top: 8px;">
                    Setiap Anak Berharga, Setiap Suara Bermakna
                </p>
            </div>

            <div style="padding: 30px;">
                <h2 style="color: #102B55; font-size: 23px; font-weight: bold;">
                    Buat Akun Murid
                </h2>

                <p style="color: #64748b; font-size: 14px; margin-top: 6px; margin-bottom: 24px;">
                    Bergabunglah dengan ruang aman NAWARA.
                </p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div style="margin-bottom: 17px;">
                        <label for="name" style="display:block; color:#102B55; font-weight:600; margin-bottom:7px;">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:9px;">
                        @error('name')
                            <p style="color:#dc2626; font-size:13px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div style="margin-bottom: 17px;">
                        <label for="email" style="display:block; color:#102B55; font-weight:600; margin-bottom:7px;">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:9px;">
                        @error('email')
                            <p style="color:#dc2626; font-size:13px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div style="margin-bottom: 17px;">
                        <label for="password" style="display:block; color:#102B55; font-weight:600; margin-bottom:7px;">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:9px;">
                        @error('password')
                            <p style="color:#dc2626; font-size:13px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div style="margin-bottom: 22px;">
                        <label for="password_confirmation" style="display:block; color:#102B55; font-weight:600; margin-bottom:7px;">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:9px;">
                    </div>

                    <button type="submit" style="width:100%; padding:13px; background:#102B55; color:white; border:0; border-radius:9px; font-weight:bold; cursor:pointer;">
                        DAFTAR SEKARANG
                    </button>
                </form>

                <p style="text-align:center; margin-top:22px; color:#64748b; font-size:14px;">
                    Sudah memiliki akun?
                    <a href="{{ route('login') }}" style="color:#183D64; font-weight:bold;">Login</a>
                </p>
            </div>

            <div style="background:#f8f7f1; text-align:center; padding:16px; color:#64748b; font-size:11px;">
                © 2026 NAWARA. All Rights Reserved.
                <br>
                Designed & Developed by Renaldi
            </div>
        </div>
    </div>
</x-guest-layout>