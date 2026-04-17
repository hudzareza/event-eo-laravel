@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg border border-gray-100">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Selamat Datang Kembali
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Silahkan login ke akun Anda
            </p>
        </div>
        
        <div class="mt-8 space-y-4">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" required 
                        class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                        placeholder="Alamat Email">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required 
                        class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                        placeholder="Kata Sandi">
                </div>
            </div>

            <div>
                <button onclick="login()" 
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Masuk Sekarang
                </button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/api.js') }}"></script>
<script>
window.login = async function() {
    const btn = document.querySelector('button');
    const originalText = btn.innerText;
    
    btn.innerText = 'Memproses...';
    btn.disabled = true;

    try {
        const { res, data } = await apiFetch('/api/login', {
            method: 'POST',
            headers: {
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            })
        });

        if (res.ok && data.token) {
            localStorage.setItem('token', data.token);
            window.location.href = '/event';
        } else {
            alert(data.message || 'Login gagal');
        }

    } catch (error) {
        console.log(error);
        alert('Terjadi kesalahan koneksi.');
    } finally {
        btn.innerText = originalText;
        btn.disabled = false;
    }
}
</script>
@endsection