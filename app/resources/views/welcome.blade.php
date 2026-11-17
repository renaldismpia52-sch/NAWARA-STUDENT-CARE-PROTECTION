
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#102B55">
    <title>NAWARA | Student Care & Protection</title>
    <meta name="description" content="NAWARA - Platform perlindungan dan pendampingan Murid SMP Islam Al Azhar 52 Bengkulu.">

    <style>
        :root {
            --navy: #102B55;
            --navy-light: #183D64;
            --blue: #24517A;
            --gold: #D9B64F;
            --gold-light: #EBD58F;
            --ivory: #F8F7F1;
            --white: #FFFFFF;
            --text: #26364C;
            --muted: #718096;
            --border: #E8E6DD;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--ivory);
            color: var(--text);
            line-height: 1.7;
        }

        a { text-decoration: none; }

        /* NAVBAR */
        .navbar {
            background: var(--navy);
            padding: 16px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 18px;
            border-bottom: 2px solid var(--gold);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            border: 1px solid var(--gold);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 25px;
        }

        .brand h1 {
            color: white;
            font-size: 23px;
            letter-spacing: 4px;
            line-height: 1.3;
        }

        .brand p {
            color: var(--gold-light);
            font-size: 9px;
            letter-spacing: 1.6px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #E8EDF4;
            font-size: 13px;
            transition: .3s;
        }

        .nav-links a:hover { color: var(--gold); }

        .nav-button {
            background: var(--gold);
            color: var(--navy) !important;
            padding: 10px 19px;
            border-radius: 6px;
            font-weight: 700;
        }

        .nav-login {
            border: 1px solid #B9C9DC;
            padding: 9px 18px;
            border-radius: 6px;
        }

        /* HERO */
        .hero {
            min-height: 570px;
            padding: 100px 8%;
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 85% 25%, rgba(217,182,79,.17), transparent 28%),
                linear-gradient(120deg, #102B55, #183D64 75%, #24517A);
            color: white;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 390px;
            height: 390px;
            border: 1px solid rgba(217,182,79,.22);
            border-radius: 50%;
            right: -100px;
            top: 75px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border: 1px solid rgba(217,182,79,.16);
            border-radius: 50%;
            right: -55px;
            top: 120px;
        }

        .hero-content {
            max-width: 750px;
            position: relative;
            z-index: 2;
        }

        .hero-label {
            display: inline-block;
            padding: 8px 16px;
            border: 1px solid rgba(217,182,79,.65);
            border-radius: 30px;
            color: var(--gold-light);
            font-size: 11px;
            letter-spacing: 2px;
            margin-bottom: 27px;
        }

        .hero h2 {
            font-size: clamp(38px, 6vw, 62px);
            line-height: 1.13;
            margin-bottom: 24px;
            letter-spacing: -1.5px;
        }

        .hero h2 span { color: var(--gold); }

        .hero-description {
            max-width: 620px;
            color: #D8E2EE;
            font-size: 16px;
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .btn-primary {
            display: inline-block;
            background: var(--gold);
            color: var(--navy);
            padding: 14px 25px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 700;
            transition: .3s;
        }

        .btn-primary:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
        }

        .btn-secondary {
            display: inline-block;
            border: 1px solid #B9C9DC;
            color: white;
            padding: 13px 25px;
            border-radius: 6px;
            font-size: 13px;
        }

        .btn-secondary:hover { background: rgba(255,255,255,.1); }

        /* SCHOOL IDENTITY */
        .identity {
            padding: 25px 8%;
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .identity-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .identity p {
            color: var(--muted);
            font-size: 12px;
        }

        .identity strong { color: var(--navy); }

        /* SECTIONS */
        .section { padding: 85px 8%; }

        .section-heading {
            max-width: 680px;
            margin: 0 auto 48px;
            text-align: center;
        }

        .section-heading span {
            color: #A68127;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
        }

        .section-heading h2 {
            color: var(--navy);
            font-size: 34px;
            margin: 12px 0;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 14px;
        }

        .gold-line {
            width: 55px;
            height: 3px;
            background: var(--gold);
            margin: 18px auto 0;
            border-radius: 5px;
        }

        /* SERVICE CARDS */
        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 23px;
        }

        .feature-card {
            background: white;
            padding: 32px 27px;
            border: 1px solid var(--border);
            border-radius: 12px;
            border-bottom: 3px solid var(--gold);
            transition: .3s;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 35px rgba(16,43,85,.09);
        }

        .feature-icon {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F5F0DF;
            border-radius: 12px;
            color: var(--navy);
            font-size: 26px;
            margin-bottom: 22px;
        }

        .feature-card h3 {
            color: var(--navy);
            font-size: 19px;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 13px;
        }

        /* ABOUT */
        .about-section {
            padding: 85px 8%;
            background: #EEEDE5;
        }

        .about-content {
            max-width: 850px;
            margin: auto;
            text-align: center;
        }

        .about-content h2 {
            color: var(--navy);
            font-size: 32px;
            margin-bottom: 20px;
        }

        .about-content p {
            color: #5E6D7D;
            font-size: 15px;
        }

        .quote {
            margin-top: 25px;
            color: #98751E;
            font-weight: 700;
            font-size: 19px;
        }

        /* PRIVACY */
        .privacy-section {
            padding: 80px 8%;
            background: white;
        }

        .privacy-box {
            max-width: 1000px;
            margin: auto;
            padding: 42px;
            background: linear-gradient(120deg, var(--navy), var(--navy-light));
            border-radius: 14px;
            border: 1px solid rgba(217,182,79,.6);
            display: flex;
            align-items: center;
            gap: 28px;
            color: white;
        }

        .privacy-icon {
            min-width: 65px;
            font-size: 47px;
            color: var(--gold);
        }

        .privacy-box h2 {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .privacy-box p {
            color: #D5E0ED;
            font-size: 14px;
        }

        /* FOOTER */
        .corporate-footer {
            background: #0B2042;
            color: white;
            padding: 48px 8% 25px;
            border-top: 3px solid var(--gold);
        }

        .footer-brand h2 {
            color: var(--gold);
            font-size: 29px;
            letter-spacing: 5px;
        }

        .footer-brand p {
            color: #C5D2E0;
            font-size: 13px;
            margin-top: 5px;
        }

        .footer-divider {
            height: 1px;
            background: #354966;
            margin: 30px 0 22px;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            color: #B9C8D9;
            font-size: 12px;
        }

        .footer-bottom strong { color: var(--gold); }

        /* RESPONSIVE */
        @media (max-width: 800px) {
            .features { grid-template-columns: 1fr; }
            .hero { padding: 80px 7%; }
        }

        @media (max-width: 600px) {
            .navbar { padding: 17px 6%; }
            .nav-links { width: 100%; gap: 12px; }
            .nav-links a { font-size: 12px; }
            .hero { min-height: 500px; }
            .section-heading h2 { font-size: 27px; }
            .privacy-box {
                flex-direction: column;
                align-items: flex-start;
                padding: 30px;
            }
            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="brand">
            <div class="brand-icon">✦</div>
            <div>
                <h1>NAWARA</h1>
                <p>STUDENT CARE &amp; PROTECTION</p>
            </div>
        </div>

        <nav class="nav-links">
            <a href="#beranda">Beranda</a>
            <a href="#layanan">Layanan</a>
            <a href="#tentang">Tentang</a>
            <a href="#privasi">Privasi</a>

            @auth
                <a href="{{ route('dashboard') }}" class="nav-button">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="nav-login">
                    Login
                </a>
                <a href="{{ route('register') }}" class="nav-button">
                    Daftar Murid
                </a>
            @endauth
        </nav>
    </header>

    <main>

        <!-- HERO -->
        <section class="hero" id="beranda">
            <div class="hero-content">

                <div class="hero-label">
                    STUDENT CARE &amp; PROTECTION PLATFORM
                </div>

                <h2>
                    Membangun Sekolah Aman,
                    <span>Menguatkan Masa Depan.</span>
                </h2>

                <p class="hero-description">
                    NAWARA merupakan ruang kepedulian dan perlindungan
                    Murid untuk menyampaikan cerita, melaporkan
                    perundungan, serta memperoleh pendampingan
                    secara bijaksana.
                </p>

                <div class="hero-buttons">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-primary">
                            Masuk Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn-primary">
                            Daftar Akun Murid
                        </a>

                        <a href="{{ route('login') }}" class="btn-secondary">
                            Login
                        </a>
                    @endauth

                    <a href="#tentang" class="btn-secondary">
                        Tentang NAWARA
                    </a>
                </div>

            </div>
        </section>

        <!-- IDENTITY -->
        <section class="identity">
            <div class="identity-content">
                <p><strong>NAWARA</strong> — Student Care &amp; Protection</p>
                <p>SMP Islam Al Azhar 52 Bengkulu</p>
                <p>Setiap suara layak didengar.</p>
            </div>
        </section>

        <!-- SERVICES -->
        <section class="section" id="layanan">

            <div class="section-heading">
                <span>OUR SERVICES</span>

                <h2>Layanan Perlindungan Murid</h2>

                <p>
                    Menghadirkan dukungan, pendampingan, dan edukasi
                    untuk menciptakan lingkungan pendidikan
                    yang aman dan saling menghargai.
                </p>

                <div class="gold-line"></div>
            </div>

            <div class="features">

                <article class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <h3>Pelaporan</h3>
                    <p>
                        Sampaikan laporan terkait perundungan atau
                        tindakan yang membuat Murid merasa tidak aman.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3>Konsultasi</h3>
                    <p>
                        Ruang komunikasi untuk memperoleh pendampingan
                        dan dukungan dari Guru Bimbingan Konseling.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">📖</div>
                    <h3>Edukasi</h3>
                    <p>
                        Informasi dan pengetahuan untuk meningkatkan
                        kesadaran tentang pencegahan perundungan.
                    </p>
                </article>

            </div>
        </section>

        <!-- ABOUT -->
        <section class="about-section" id="tentang">
            <div class="about-content">

                <h2>Tentang NAWARA</h2>

                <p>
                    NAWARA adalah platform Student Care &amp; Protection
                    yang dirancang untuk mendukung terciptanya
                    lingkungan pendidikan yang aman, inklusif,
                    dan bebas dari perundungan di SMP Islam
                    Al Azhar 52 Bengkulu.
                </p>

                <div class="quote">
                    “Setiap Anak Berharga, Setiap Suara Bermakna”
                </div>

                <div class="gold-line"></div>

            </div>
        </section>

        <!-- PRIVACY -->
        <section class="privacy-section" id="privasi">

            <div class="privacy-box">

                <div class="privacy-icon">🔒</div>

                <div>
                    <h2>Privasi dan Keamanan Murid</h2>

                    <p>
                        Setiap laporan perlu ditangani secara
                        bijaksana. Informasi pribadi Murid harus
                        dilindungi dan hanya dapat diakses oleh
                        pihak yang memiliki kewenangan sesuai
                        kebijakan perlindungan sekolah.
                    </p>
                </div>

            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="corporate-footer">

        <div class="footer-brand">
            <h2>NAWARA</h2>
            <p>Student Care &amp; Protection</p>
            <p>SMP Islam Al Azhar 52 Bengkulu</p>
        </div>

        <div class="footer-divider"></div>

        <div class="footer-bottom">
            <p>© 2026 NAWARA. All Rights Reserved.</p>
            <p>Designed &amp; Developed by <strong>Renaldi</strong></p>
        </div>

    </footer>

</body>
</html>
