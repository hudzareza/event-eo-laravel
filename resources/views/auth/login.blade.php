@extends('layouts.app')

@section('content')
<div class="login-page">

    <!-- Background Glow -->
    <div class="bg-glow"></div>

    <div class="login-card">
        
        <!-- Header -->
        <div class="login-header">
            <h1>🎫 EVENT SCANNER</h1>
            <p>Login untuk mulai validasi peserta</p>
        </div>

        <!-- Form -->
        <div class="form-group">
            <input id="email" type="email" placeholder="Email">
        </div>

        <div class="form-group">
            <input id="password" type="password" placeholder="Password">
        </div>

        <button onclick="login()" class="btn-login">
            🚀 MASUK SEKARANG
        </button>

        <p class="footer-text">Powered by Event EO System</p>

    </div>
</div>

<style>
/* =========================
   BACKGROUND
========================= */
.login-page {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #0f172a, #1e293b, #020617);
    position: relative;
    overflow: hidden;
    font-family: 'Inter', sans-serif;
}

/* Glow effect */
.bg-glow {
    position: absolute;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(99,102,241,0.4) 0%, transparent 70%);
    top: -100px;
    left: -100px;
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(30px); }
    100% { transform: translateY(0px); }
}

/* =========================
   CARD
========================= */
.login-card {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 380px;
    padding: 40px 30px;

    backdrop-filter: blur(20px);
    background: rgba(255,255,255,0.05);

    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.1);

    box-shadow:
        0 0 40px rgba(99,102,241,0.3),
        inset 0 0 20px rgba(255,255,255,0.05);

    text-align: center;
}

/* =========================
   HEADER
========================= */
.login-header h1 {
    color: #fff;
    font-size: 26px;
    font-weight: 900;
    margin-bottom: 5px;
    letter-spacing: 1px;
}

.login-header p {
    color: #cbd5f5;
    font-size: 13px;
    margin-bottom: 25px;
}

/* =========================
   INPUT
========================= */
.form-group {
    margin-bottom: 15px;
}

.form-group input {
    width: 100%;
    padding: 14px;
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.1);
    background: rgba(255,255,255,0.05);
    color: #fff;
    font-size: 14px;
    transition: 0.3s;
}

.form-group input::placeholder {
    color: #94a3b8;
}

.form-group input:focus {
    outline: none;
    border-color: #6366f1;
    box-shadow: 0 0 10px #6366f1;
}

/* =========================
   BUTTON
========================= */
.btn-login {
    width: 100%;
    padding: 14px;
    margin-top: 10px;

    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    border: none;
    border-radius: 12px;

    color: white;
    font-weight: 800;
    letter-spacing: 1px;

    cursor: pointer;
    transition: 0.3s;

    box-shadow: 0 0 15px rgba(99,102,241,0.6);
}

.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 25px rgba(139,92,246,0.9);
}

/* =========================
   FOOTER
========================= */
.footer-text {
    margin-top: 20px;
    font-size: 10px;
    color: #94a3b8;
}
</style>

<script src="{{ asset('js/api.js') }}"></script>
<script>
window.login = async function() {
    const btn = document.querySelector('.btn-login');
    const originalText = btn.innerText;

    btn.innerText = 'Loading...';
    btn.disabled = true;

    try {
        const { res, data } = await apiFetch('/api/login', {
            method: 'POST',
            headers: { 'Accept': 'application/json' },
            body: JSON.stringify({
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            })
        });

        if (res.ok && data.token) {

            localStorage.setItem('token', data.token);

            await fetch('/set-session', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ token: data.token })
            });

            window.location.href = '/validasi';

        } else {
            alert(data.message || 'Login gagal');
        }

    } catch (error) {
        alert('Koneksi error');
    }

    btn.innerText = originalText;
    btn.disabled = false;
}
</script>
@endsection