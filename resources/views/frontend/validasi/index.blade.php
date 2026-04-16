@extends('layouts.app')

@section('title', 'Validation Attendance - Event EO')

@section('content')
<script src="https://unpkg.com/lucide@latest"></script>

<div class="attendance-page">
    <div class="header-section">
        <h1 class="main-title">VALIDATION <span>ATTENDANCE</span></h1>
        <p class="sub-title">Input manual kehadiran peserta.</p>
    </div>

    <div class="form-container">
        <div class="card-form">
            <div class="red-line"></div>

            <form action="#" method="POST" class="inner-form">
                @csrf

                <div class="form-group">
                    <label><i data-lucide="fingerprint"></i> UUID</label>
                    <input type="text" name="uuid" placeholder="...">
                </div>

                <div class="form-group">
                    <label><i data-lucide="hash"></i> INDP. ID</label>
                    <input type="text" name="independent_id" placeholder="...">
                </div>

                <div class="form-group">
                    <label><i data-lucide="user"></i> NAMA LENGKAP</label>
                    <input type="text" name="nama" placeholder="Nama lengkap peserta">
                </div>

                <div class="form-group">
                    <label><i data-lucide="mail"></i> EMAIL ADDRESS</label>
                    <input type="email" name="email" placeholder="email@domain.com">
                </div>

                <div class="form-group">
                    <label><i data-lucide="phone"></i> NO. TELP / WA</label>
                    <div class="phone-wrapper">
                        <span class="prefix">+62</span>
                        <input type="tel" name="no_telp" placeholder="8123xxx">
                    </div>
                </div>

                <div class="footer-form">
                    <button type="submit" class="btn-confirm">
                        <i data-lucide="check-circle"></i> KONFIRMASI SEKARANG
                    </button>
                    <p class="operator-tag">OPERATOR: <strong>AMUL</strong></p>
                </div>
            </form>
        </div>

        <div class="back-link">
            <a href="/peserta"><i data-lucide="arrow-left"></i> BATAL & KEMBALI</a>
        </div>
    </div>
</div>

<style>
    /* Reset & Base */
    .attendance-page {
        background-color: #f9fafb;
        min-height: 100vh;
        padding-bottom: 50px;
        font-family: 'Inter', sans-serif;
    }

    /* Header */
    .header-section {
        background: white;
        border-bottom: 1px solid #f1f1f1;
        padding: 40px 20px;
        text-align: center;
    }

    .main-title {
        font-size: 2rem;
        font-weight: 900;
        letter-spacing: -1px;
        color: #111827;
        margin: 0;
        font-style: italic;
    }

    .main-title span { color: #dc2626; }

    .sub-title {
        color: #9ca3af;
        font-size: 0.9rem;
        margin-top: 5px;
    }

    /* Layout Slim */
    .form-container {
        max-width: 500px; /* Ukuran slim biar gak kelebaran */
        margin: -30px auto 0;
        padding: 0 20px;
    }

    .card-form {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        overflow: hidden;
        border: 1px solid #f3f4f6;
    }

    .red-line { height: 6px; background: #dc2626; }

    .inner-form { padding: 30px; }

    /* Input Styling */
    .form-group { margin-bottom: 18px; }

    .form-group label {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 10px;
        font-weight: 800;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .form-group label i { width: 12px; height: 12px; color: #dc2626; }

    .form-group input {
        width: 100%;
        padding: 12px 16px;
        background: #fdfdfd;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s;
        box-sizing: border-box;
    }

    .form-group input:focus {
        outline: none;
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
    }

    .input-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .phone-wrapper { display: flex; }

    .prefix {
        background: #f3f4f6;
        border: 1px solid #e5e7eb;
        border-right: none;
        padding: 0 12px;
        display: flex;
        align-items: center;
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        border-radius: 10px 0 0 10px;
    }

    .phone-wrapper input { border-radius: 0 10px 10px 0; }

    /* Button & Footer */
    .btn-confirm {
        width: 100%;
        background: #dc2626;
        color: white;
        border: none;
        padding: 15px;
        border-radius: 12px;
        font-weight: 800;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        cursor: pointer;
        transition: transform 0.2s, background 0.3s;
        margin-top: 30px;
    }

    .btn-confirm:hover { background: #111827; transform: translateY(-2px); }
    .btn-confirm i { width: 18px; height: 18px; }

    .operator-tag {
        text-align: center;
        font-size: 10px;
        color: #d1d5db;
        margin-top: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .back-link { text-align: center; margin-top: 25px; }
    .back-link a {
        color: #9ca3af;
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: color 0.3s;
    }
    .back-link a:hover { color: #dc2626; }
</style>

<script>
    // Pastiin ini jalan biar icon muncul
    window.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();
    });
</script>
@endsection