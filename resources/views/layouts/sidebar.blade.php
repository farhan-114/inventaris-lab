<div class="h-screen bg-gray-800 text-white w-64 flex flex-col">
    <div class="p-4 text-center text-lg font-semibold border-b border-gray-700">
        Inventaris App
    </div>

    <nav class="flex-1 overflow-y-auto px-2 py-4 space-y-1">

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="block py-2 px-4 rounded transition {{ request()->routeIs('dashboard') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
            🏠 Dashboard
        </a>

        <!-- Scan QR -->
        <a href="{{ route('scanqr.index') }}"
            class="block py-2 px-4 rounded transition {{ request()->routeIs('scanqr.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
            🔍 Scan QR
        </a>

        <!-- Data Ruangan Dropdown -->
        <div x-data="{ open: {{ request()->routeIs('ruangan.*') || request()->routeIs('rak.*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                class="w-full text-left py-2 px-4 flex justify-between items-center rounded transition {{ request()->routeIs('ruangan.*') || request()->routeIs('rak.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
                🏢 Data Ruangan
                <svg :class="{ 'rotate-90': open }" class="w-4 h-4 ml-2 transition-transform" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <div x-show="open" class="pl-6 mt-1 space-y-1" x-cloak>
                <a href="{{ route('ruangan.index') }}"
                    class="block py-1 px-3 rounded transition {{ request()->routeIs('ruangan.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
                    🏠 Data Ruangan
                </a>
                <a href="{{ route('rak.index') }}"
                    class="block py-1 px-3 rounded transition {{ request()->routeIs('rak.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
                    🗃️ Rak / Laci
                </a>
            </div>
        </div>

        <!-- Data Barang Dropdown -->
        <div x-data="{ open: {{ request()->routeIs('barang.*') || request()->routeIs('kategori-barang.*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                class="w-full text-left py-2 px-4 flex justify-between items-center rounded transition {{ request()->routeIs('barang.*') || request()->routeIs('kategori-barang.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
                📦 Data Barang
                <svg :class="{ 'rotate-90': open }" class="w-4 h-4 ml-2 transition-transform" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <div x-show="open" class="pl-6 mt-1 space-y-1" x-cloak>
                <a href="{{ route('kategori-barang.index') }}"
                    class="block py-1 px-3 rounded transition {{ request()->routeIs('kategori-barang.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
                    🏷️ Kategori Barang
                </a>
                <a href="{{ route('barang.index') }}"
                    class="block py-1 px-3 rounded transition {{ request()->routeIs('barang.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
                    📋 Data Barang
                </a>
            </div>
        </div>

        <!-- Belanja -->
         <div x-data="{ open: {{ request()->routeIs('belanja.*') || request()->routeIs('penerimaan.*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
            class="w-full text-left py-2 px-4 flex justify-between items-center rounded transition
            {{ request()->routeIs('belanja.*') || request()->routeIs('penerimaan.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
             🛒 Belanja
             <svg :class="{ 'rotate-90': open }" class="w-4 h-4 ml-2 transition-transform" fill="none"
             stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
             <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        <div x-show="open" class="pl-6 mt-1 space-y-1" x-cloak>
            <a href="{{ route('belanja.index') }}"
            class="block py-1 px-3 rounded transition
            {{ request()->routeIs('belanja.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
             📥 Belanja Barang
            </a>
            <a href="{{ route('penerimaan.index') }}"
            class="block py-1 px-3 rounded transition
            {{ request()->routeIs('penerimaan.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
             📬 Penerimaan Barang
            </a>
        </div>
    </div>

        <!-- Stok -->
        <a href="{{ route('stok.index') }}"
            class="block py-2 px-4 rounded transition {{ request()->routeIs('stok.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
            📊 Stok
        </a>

        <!-- Barang Keluar -->
        <a href="{{ route('barang-keluar.index') }}" 
            class="block py-2 px-4 rounded transition {{ request()->routeIs('barang-keluar.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
            📤 Barang Keluar
        </a>

        <!-- Peminjaman -->
        <a href="{{ route('peminjaman.index') }}"
            class="block py-2 px-4 rounded transition {{ request()->routeIs('peminjaman.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
            📤 Peminjaman
        </a>

        <!-- Laporan -->
        <a href="{{ route('laporan.index') }}"
            class="block py-2 px-4 rounded transition {{ request()->routeIs('laporan.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-gray-300' }}">
            📑 Laporan
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button type="submit"
                class="block w-full text-left py-2 px-4 rounded transition hover:bg-red-600 text-white">
                🚪 Logout
            </button>
        </form>
    </nav>
</div>