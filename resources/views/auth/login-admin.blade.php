@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    
    <div class="w-full max-w-md">
        
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">
                    Admin Panel
                </h1>
                <p class="text-gray-400 text-sm mt-2">
                    Login untuk mengakses dashboard
                </p>
            </div>

            <!-- Error -->
            @if ($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg p-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="/login-admin" id="loginForm">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label class="text-xs font-bold text-gray-500 uppercase">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        required
                        class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:outline-none transition"
                        placeholder="admin@email.com"
                    >
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="text-xs font-bold text-gray-500 uppercase">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        required
                        class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:outline-none transition"
                        placeholder="********"
                    >
                </div>

                <!-- Button -->
                <button 
                    type="submit"
                    id="loginBtn"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg transition duration-200 flex items-center justify-center gap-2"
                >
                    <span id="btnText">Masuk</span>
                    <svg id="loadingIcon" class="w-5 h-5 animate-spin hidden" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8v8z"></path>
                    </svg>
                </button>

            </form>

        </div>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-400 mt-6">
            Event EO System • {{ date('Y') }}
        </p>

    </div>

</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(){
    const btn = document.getElementById('loginBtn');
    const text = document.getElementById('btnText');
    const loading = document.getElementById('loadingIcon');

    btn.disabled = true;
    text.innerText = 'Memproses...';
    loading.classList.remove('hidden');
});
</script>
@endsection