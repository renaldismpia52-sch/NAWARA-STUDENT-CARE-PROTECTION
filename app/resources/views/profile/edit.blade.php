
<x-app-layout>
    <x-slot name="header">
        <div class="nawara-profile-header">
            <div class="nawara-eyebrow">NAWARA · STUDENT CARE &amp; PROTECTION</div>
            <h2>Profil Saya</h2>
            <p>Kelola informasi dan keamanan akun Anda.</p>
        </div>
    </x-slot>

    <style>
        .nawara-profile {
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #102B55;
        }

        .nawara-profile-header {
            padding: 8px 0;
        }

        .nawara-profile-header .nawara-eyebrow {
            color: #b08b24;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.8px;
            margin-bottom: 7px;
        }

        .nawara-profile-header h2 {
            color: #102B55;
            font-size: 23px;
            font-weight: 750;
            margin: 0;
        }

        .nawara-profile-header p {
            color: #7b8797;
            font-size: 12px;
            margin-top: 5px;
        }

        .nawara-profile-bg {
            background: #f3f5f8;
            min-height: 75vh;
            padding: 30px 18px;
        }

        .nawara-profile-container {
            max-width: 950px;
            margin: 0 auto;
        }

        .nawara-profile-intro {
            background: linear-gradient(120deg, #102B55, #183D64);
            border-bottom: 4px solid #D9B64F;
            border-radius: 13px;
            padding: 22px 25px;
            color: white;
            margin-bottom: 22px;
            box-shadow: 0 6px 20px rgba(16,43,85,.09);
        }

        .nawara-profile-intro strong {
            display: block;
            font-size: 16px;
            margin-bottom: 6px;
        }

        .nawara-profile-intro p {
            color: #e6edf5;
            font-size: 12px;
            line-height: 1.7;
            margin: 0;
        }

        .nawara-profile-card {
            background: #fff;
            border: 1px solid #e5e9ef;
            border-top: 3px solid #D9B64F;
            border-radius: 12px;
            padding: 23px;
            margin-bottom: 19px;
            box-shadow: 0 5px 18px rgba(16,43,85,.045);
        }

        .nawara-profile-card h3 {
            color: #102B55;
            font-size: 16px;
            font-weight: 750;
            margin: 0 0 7px;
        }

        .nawara-profile-card p {
            color: #7b8797;
            font-size: 12px;
            line-height: 1.7;
        }

        .nawara-profile-card label {
            color: #34445a !important;
            font-size: 12px !important;
            font-weight: 700 !important;
        }

        .nawara-profile-card input:not([type="checkbox"]),
        .nawara-profile-card textarea {
            width: 100%;
            border: 1px solid #dce2e9 !important;
            border-radius: 8px !important;
            padding: 10px 12px !important;
            color: #102B55 !important;
            font-family: inherit;
            font-size: 13px !important;
            background: #fff !important;
        }

        .nawara-profile-card input:focus,
        .nawara-profile-card textarea:focus {
            border-color: #D9B64F !important;
            box-shadow: 0 0 0 3px rgba(217,182,79,.12) !important;
            outline: none;
        }

        .nawara-profile-card button {
            border-radius: 8px !important;
            font-size: 12px !important;
            font-weight: 700 !important;
        }

        .nawara-profile-card button[type="submit"],
        .nawara-profile-card .bg-gray-800 {
            background: #102B55 !important;
            color: white !important;
        }

        .nawara-profile-card button[type="submit"]:hover {
            background: #183D64 !important;
        }

        @media(max-width: 640px) {
            .nawara-profile-bg {
                padding: 18px 11px;
            }

            .nawara-profile-intro,
            .nawara-profile-card {
                padding: 17px;
            }

            .nawara-profile-header h2 {
                font-size: 20px;
            }
        }
    </style>

    <div class="nawara-profile naw ara-profile-bg">
        <div class="nawara-profile-container">

            <div class="nawara-profile-intro">
                <strong>Selamat datang di Pengaturan Profil</strong>
                <p>
                    Pastikan informasi akun Anda selalu benar dan
                    jaga keamanan akun dengan memperbarui kata sandi
                    secara berkala.
                </p>
            </div>

            <div class="nawara-profile-card">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="nawara-profile-card">
                @include('profile.partials.update-password-form')
            </div>

            <div class="nawara-profile-card">
                @include('profile.partials.delete-user-form')
            </div>

            <footer style="text-align:center;padding:15px 5px 22px;color:#8993a1;font-size:10px;line-height:1.9">
                © 2026 NAWARA. All Rights Reserved.<br>
                Designed &amp; Developed by
                <span style="color:#b08b24;font-weight:700">Renaldi</span>
            </footer>

        </div>
    </div>
</x-app-layout>
