@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg border border-gray-100">
        <div>
            <h2 class="mt-4 text-center text-3xl font-extrabold text-gray-900">
                Buat Akun Baru
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Bergabunglah dengan kami hari ini
            </p>
        </div>

    <form id="registerForm" class="mt-8 space-y-4">
        
        <div class="space-y-3">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" required 
                    class="w-full px-3 py-3 border border-gray-300 rounded-lg"
                    placeholder="Contoh: Budi Santoso">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required 
                    class="w-full px-3 py-3 border border-gray-300 rounded-lg"
                    placeholder="email@domain.com">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required 
                    class="w-full px-3 py-3 border border-gray-300 rounded-lg"
                    placeholder="Minimal 8 karakter">
            </div>
        </div>

        <div>
            <button type="submit" 
                class="w-full py-3 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                Daftar
            </button>
        </div>

        <p class="text-center text-sm">
            Sudah punya akun?
            <a href="/login" class="text-indigo-600">Login</a>
        </p>

    </form>
</div>

</div>

<script>
document.getElementById('registerForm').addEventListener('submit', async function(e){
    e.preventDefault();

    const form = e.target;

    const data = {
        name: form.name.value,
        email: form.email.value,
        password: form.password.value
    };

    try {
        const res = await fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const result = await res.json();

        if(res.ok){
            // simpan token
            localStorage.setItem('token', result.token);

            alert('Register berhasil');

            // redirect ke dashboard / event
            window.location.href = '/login';
        } else {
            alert(result.message || 'Gagal register');
        }

    } catch (err) {
        console.error(err);
        alert('Terjadi kesalahan');
    }
});
</script>

@endsection
