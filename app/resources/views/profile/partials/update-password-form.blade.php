
<section class="nawara-password">
    <style>
        .nawara-password {
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #102B55;
        }

        .nawara-password .password-card {
            background: #ffffff;
            border: 1px solid #e5e9ef;
            border-top: 4px solid #D9B64F;
            border-radius: 13px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(16,43,85,.05);
        }

        .nawara-password .password-heading {
            font-size: 19px;
            font-weight: 700;
            color: #102B55;
            margin: 0 0 8px;
        }

        .nawara-password .password-description {
            color: #7b8797;
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 22px;
        }

        .nawara-password .field {
            margin-bottom: 17px;
        }

        .nawara-password label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #34445a;
            margin-bottom: 7px;
        }

        .nawara-password input {
            display: block;
            width: 100%;
            box-sizing: border-box;
            padding: 11px 13px;
            border: 1px solid #dce2e9;
            border-radius: 8px;
            background: #fff;
            color: #102B55;
            font-family: inherit;
            font-size: 13px;
            outline: none;
        }

        .nawara-password input:focus {
            border-color: #D9B64F;
            box-shadow: 0 0 0 3px rgba(217,182,79,.13);
        }

        .nawara-password .password-button {
            border: 0;
            border-radius: 8px;
            background: #102B55;
            color: #fff;
            padding: 11px 21px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .nawara-password .password-button:hover {
            background: #183D64;
        }

        .nawara-password .password-success {
            margin-top: 15px;
            color: #267044;
            background: #e8f5ec;
            border-left: 4px solid #39945a;
            padding: 11px 14px;
            border-radius: 7px;
            font-size: 12px;
        }

        .nawara-password .password-error {
            display: block;
            color: #b42318;
            font-size: 11px;
            margin-top: 6px;
        }

        @media(max-width: 600px) {
            .nawara-password .password-card {
                padding: 17px;
            }

            .nawara-password .password-button {
                width: 100%;
            }
        }
    </style>

    <div class="password-card">
        <h2 class="password-heading">Ubah Kata Sandi</h2>

        <p class="password-description">
            Perbarui kata sandi akun NAWARA secara berkala.
            Gunakan kata sandi yang kuat dan tidak mudah ditebak
            untuk menjaga keamanan akun Anda.
        </p>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="field">
                <label for="update_password_current_password">
                    Kata Sandi Saat Ini
                </label>

                <input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    autocomplete="current-password"
                    required
                >

                @if($errors->updatePassword->has('current_password'))
                    <span class="password-error">
                        {{ $errors->updatePassword->first('current_password') }}
                    </span>
                @endif
            </div>

            <div class="field">
                <label for="update_password_password">
                    Kata Sandi Baru
                </label>

                <input
                    id="update_password_password"
                    name="password"
                    type="password"
                    autocomplete="new-password"
                    required
                >

                @if($errors->updatePassword->has('password'))
                    <span class="password-error">
                        {{ $errors->updatePassword->first('password') }}
                    </span>
                @endif
            </div>

            <div class="field">
                <label for="update_password_password_confirmation">
                    Konfirmasi Kata Sandi Baru
                </label>

                <input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    required
                >

                @if($errors->updatePassword->has('password_confirmation'))
                    <span class="password-error">
                        {{ $errors->updatePassword->first('password_confirmation') }}
                    </span>
                @endif
            </div>

            <button type="submit" class="password-button">
                Simpan Kata Sandi
            </button>

            @if(session('status') === 'password-updated')
                <p class="password-success"
                   x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 3000)">
                    Kata sandi berhasil diperbarui.
                </p>
            @endif
        </form>
    </div>
</section>
