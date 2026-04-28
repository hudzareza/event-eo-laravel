@extends('layouts.app')

@section('title', 'Join the Revolution - Event EO')

@section('content')
<div class="min-h-screen bg-white flex items-start justify-center p-4 md:p-4 mt-8">
    <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-12 gap-0 shadow-[0_50px_100px_-20px_rgba(220,38,38,0.15)] rounded-[2.5rem] overflow-hidden border border-gray-100">
        
        <div class="lg:col-span-5 bg-gray-900 p-12 flex flex-col justify-between relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-600 rounded-full blur-[120px] opacity-20 -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-red-600 rounded-full blur-[120px] opacity-10 -ml-32 -mb-32"></div>

            <div class="relative z-10">
                <a href="/" class="text-2xl font-black text-white italic tracking-tighter">
                    EVENT<span class="text-red-600">EO.</span>
                </a>
                
                <div class="mt-20">
                    <h2 class="text-5xl font-black text-white leading-none uppercase italic tracking-tighter">
                        START <br>YOUR <br><span class="text-red-600">LEGACY.</span>
                    </h2>
                    <p class="text-gray-400 mt-6 text-lg font-medium leading-relaxed">
                        Gabung bareng 500+ organizer lainnya yang udah ninggalin cara lama. Sekarang giliran lo.
                    </p>
                </div>
            </div>

            <div class="relative z-10 bg-white/5 backdrop-blur-lg border border-white/10 p-6 rounded-3xl mt-12">
                <div class="flex items-center space-x-1 mb-3">
                    @for($i=0; $i<5; $i++)
                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-white text-sm italic font-medium">"Sistemnya ngebantu banget pas pendaftaran membludak. Gak ada lagi drama server down!"</p>
                <div class="flex items-center mt-4 space-x-3">
                    <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center font-black text-[10px] text-white">AM</div>
                    <span class="text-gray-400 text-xs font-bold uppercase tracking-widest">Amul G. — Senior PM</span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-7 bg-white p-12 md:p-20 flex flex-col justify-center">
            <div class="max-w-md mx-auto w-full">
                <div class="mb-10 text-center lg:text-left">
                    <h3 class="text-3xl font-black text-gray-900 uppercase italic tracking-tighter">Bikin Akun</h3>
                    <p class="text-gray-500 font-medium mt-2">Udah pernah join? <a href="/login" class="text-red-600 font-black hover:underline">Masuk sini</a></p>
                </div>

                <form action="" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2 ml-1 group-focus-within:text-red-600 transition-colors">Nama Lengkap</label>
                        <div class="relative">
                            <input type="text" name="name" required 
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:bg-white focus:border-red-600 outline-none transition-all text-sm font-bold placeholder:text-gray-300" 
                                placeholder="Masukkan nama keren lo">
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2 ml-1 group-focus-within:text-red-600 transition-colors">Email Address</label>
                        <div class="relative">
                            <input type="email" name="email" required 
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:bg-white focus:border-red-600 outline-none transition-all text-sm font-bold placeholder:text-gray-300" 
                                placeholder="nama@email.com">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="group">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2 ml-1 group-focus-within:text-red-600 transition-colors">Password</label>
                            <input type="password" name="password" required 
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:bg-white focus:border-red-600 outline-none transition-all text-sm font-bold placeholder:text-gray-300" 
                                placeholder="••••••••">
                        </div>
                        <div class="group">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2 ml-1 group-focus-within:text-red-600 transition-colors">Confirm</label>
                            <input type="password" name="password_confirmation" required 
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:bg-white focus:border-red-600 outline-none transition-all text-sm font-bold placeholder:text-gray-300" 
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" 
                            class="w-full bg-gray-900 hover:bg-red-600 text-white font-black py-5 rounded-2xl shadow-2xl shadow-gray-200 hover:shadow-red-200 transition-all duration-500 uppercase tracking-[0.2em] text-xs flex items-center justify-center space-x-3 group">
                            <span>Mulai Sekarang</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </button>
                    </div>

                    <div class="mt-8 flex items-center justify-center space-x-4">
                        <hr class="w-full border-gray-100">
                        <span class="text-[10px] font-black text-gray-300 uppercase tracking-widest">Atau</span>
                        <hr class="w-full border-gray-100">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <button type="button" class="flex items-center justify-center py-3 border-2 border-gray-100 rounded-xl hover:bg-gray-50 transition font-bold text-xs">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-4 h-4 mr-2" alt="Google">
                            Google
                        </button>
                        <button type="button" class="flex items-center justify-center py-3 border-2 border-gray-100 rounded-xl hover:bg-gray-50 transition font-bold text-xs">
                            <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" class="w-4 h-4 mr-2" alt="FB">
                            Facebook
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection