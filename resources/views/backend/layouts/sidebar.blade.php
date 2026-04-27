<aside class="fixed inset-y-0 left-0 bg-gray-900 w-64 hidden lg:block shadow-2xl z-50">
    <div class="flex flex-col h-full">
        <div class="h-20 flex items-center px-8 bg-gray-900 border-b border-gray-800">
            <a href="/" class="flex items-center space-x-2">
                <div class="bg-red-600 p-1.5 rounded-lg shadow-lg shadow-red-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                </div>
                <span class="text-xl font-black tracking-tighter text-white">EVENT<span class="text-red-500">EO</span></span>
            </a>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest px-4 mb-4">Main Menu</p>
            
            <a href="/dashboard" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition {{ Request::is('dashboard') ? 'bg-red-600 text-white shadow-lg shadow-red-900/20' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                <span class="{{ Request::is('dashboard') ? 'font-bold' : 'font-medium' }} text-sm">Dashboard</span>
            </a>

            <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition duration-200">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span class="font-medium text-sm">Manajemen Event</span>
            </a>

            <a href="/backend/event" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition {{ Request::is('event*') ? 'bg-red-600 text-white shadow-lg shadow-red-900/20' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                <span class="{{ Request::is('event*') ? 'font-bold' : 'font-medium' }} text-sm">Data Event</span>
            </a>

            <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition duration-200">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002 2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                <span class="font-medium text-sm">Laporan Keuangan</span>
            </a>
        </nav>

        <div class="p-4 bg-gray-800/50 m-4 rounded-2xl border border-gray-700">
            <div class="flex items-center space-x-3 mb-4">
                <div class="h-10 w-10 rounded-xl bg-red-600 flex items-center justify-center font-bold text-white shadow-lg">
                    AM
                </div>
                <div class="overflow-hidden text-ellipsis whitespace-nowrap">
                    <p class="text-sm font-bold text-white">Amul Dev</p>
                    <p class="text-[10px] text-gray-400">PJ Senior Programmer</p>
                </div>
            </div>
            <button class="w-full py-2 bg-gray-700 hover:bg-red-600 text-white text-xs font-bold rounded-lg transition duration-300">
                Log Out
            </button>
        </div>
    </div>
</aside>