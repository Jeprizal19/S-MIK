<aside class="flex flex-col text-gray-800 bg-white shadow-sm transition-all duration-300 ease-in-out flex-shrink-0" :class="isSidebarExpanded ? 'w-64' : 'w-20'">
  <a href="#" class="h-20 flex items-center px-4 bg-gray-800 hover:text-gray-900 hover:bg-gray-500 focus:outline-none focus:text-gray-900 focus:bg-gray-200 overflow-hidden">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-12 w-12 text-white flex-shrink-0">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
    </svg>
    <span class="ml-2 text-xl font-medium duration-300 ease-in-out text-white" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">S-MIK</span>
  </a>
  <nav class="p-4 space-y-2 font-medium">
    <div class="transition-all duration-300 ease-in-out">
      <span
        class="block mx-6 mb-2 text-xs text-gray-400 uppercase tracking-widest border-b border-gray-200"
        :class="isSidebarExpanded ? 'opacity-100 h-auto' : 'opacity-0 h-0 overflow-hidden'">
        Utama
      </span>
      <hr
        class="border-t border-gray-300 transition-opacity duration-300 ease-in-out"
        :class="isSidebarExpanded ? 'opacity-0' : 'opacity-100'" />
    </div>
    <a href="{{ route('dashboard')}}" class="flex items-center h-10 px-3 hover:bg-blue-100 hover:text-gray-800 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline {{ request()->routeIs('dashboard') ? 'active text-white bg-blue-400' : '' }}">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-gray-800 {{ request()->routeIs('dashboard') ? 'active text-white' : '' }}">
        <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
        <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
      </svg>
      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Beranda</span>
    </a>

    <!-- DATA MASTER || HANYA ADMIN -->
    @if(auth()->user()->role === 'admin')
    <div class="transition-all duration-300 ease-in-out">
      <span
        class="block mx-6 mb-2 text-xs text-gray-400 uppercase tracking-widest border-b border-gray-200"
        :class="isSidebarExpanded ? 'opacity-100 h-auto' : 'opacity-0 h-0 overflow-hidden'">
        Data Master
      </span>
      <hr
        class="border-t border-gray-300 transition-opacity duration-300 ease-in-out"
        :class="isSidebarExpanded ? 'opacity-0' : 'opacity-100'" />
    </div>
    <a href="{{ route('categories.index')}}" class="flex items-center h-10 px-3 hover:bg-blue-100 hover:text-gray-800 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline {{ request()->routeIs('categories.index', 'categories.create', 'categories.edit') ? 'active text-white bg-blue-400' : '' }}">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-gray-800 {{ request()->routeIs('categories.index') ? 'active text-white' : '' }}">
        <path d="M5.566 4.657A4.505 4.505 0 0 1 6.75 4.5h10.5c.41 0 .806.055 1.183.157A3 3 0 0 0 15.75 3h-7.5a3 3 0 0 0-2.684 1.657ZM2.25 12a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3v-6ZM5.25 7.5c-.41 0-.806.055-1.184.157A3 3 0 0 1 6.75 6h10.5a3 3 0 0 1 2.683 1.657A4.505 4.505 0 0 0 18.75 7.5H5.25Z" />
      </svg>
      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Kategori Barang</span>
    </a>
    <a href="{{ route('locations.index') }}" class="flex items-center h-10 px-3 hover:bg-blue-100 hover:text-gray-800 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline {{ request()->routeIs('locations.index', 'locations.create', 'locations.edit') ? 'active text-white bg-blue-400' : '' }}">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-gray-800 {{ request()->routeIs('locations.index') ? 'active text-white' : '' }}">
        <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
        <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
        <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
      </svg>
      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Lokasi Barang</span>
    </a>
    <a href="{{ route('items.index') }}" class="flex items-center h-10 px-3 hover:bg-blue-100 hover:text-gray-800 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline {{ request()->routeIs('items.index', 'items.create', 'items.edit') ? 'active text-white bg-blue-400' : '' }}">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-gray-800 {{ request()->routeIs('items.index') ? 'active text-white' : '' }}">
        <path d="M12.378 1.602a.75.75 0 0 0-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03ZM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 0 0 .372-.648V7.93ZM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 0 0 .372.648l8.628 5.033Z" />
      </svg>
      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Daftar Barang</span>
    </a>
    @endif
    <!-- End Data Master -->

    <!-- MANAJEMEN TEKNIS || admin, teknisi, staff -->
    @if(in_array(auth()->user()->role, ['admin', 'teknisi', 'staff']))
    <div class="transition-all duration-300 ease-in-out">
      <span
        class="block mx-6 mb-2 text-xs text-gray-400 uppercase tracking-widest border-b border-gray-200"
        :class="isSidebarExpanded ? 'opacity-100 h-auto' : 'opacity-0 h-0 overflow-hidden'">
        Manajemen Teknis
      </span>
      <hr
        class="border-t border-gray-300 transition-opacity duration-300 ease-in-out"
        :class="isSidebarExpanded ? 'opacity-0' : 'opacity-100'" />
    </div>
    <a href="{{ route('repairs.index') }}" class="flex items-center h-10 px-3 hover:bg-blue-100 hover:text-gray-800 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline {{ request()->routeIs('repairs.index', 'repairs.create', 'repairs.edit') ? 'active text-white bg-blue-400' : '' }}">
      @if(auth()->user()->role === 'staff')
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-gray-800 {{ request()->routeIs('repairs.index') ? 'active text-white' : '' }}">
        <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
      </svg>
      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Laporkan Kerusakan</span>
      @else
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-gray-800 {{ request()->routeIs('repairs.index') ? 'active text-white' : '' }}">
        <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
        <path d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
        <path fill-rule="evenodd" d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
      </svg>
      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Kelola Perbaikan</span>
      @endif
    </a>
    @endif

    @if(in_array(auth()->user()->role, ['admin', 'teknisi']))
    <a href="{{ route('loans.index') }}" class="flex items-center h-10 px-3 hover:bg-blue-100 hover:text-gray-800 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline {{ request()->routeIs('loans.index', 'loans.create', 'loans.edit') ? 'active text-white bg-blue-400' : '' }}">
      @if(auth()->user()->role === 'teknisi')
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-gray-800 {{ request()->routeIs('loans.index') ? 'active text-white' : '' }}">
        <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM12.75 12a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V18a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V12Z" clip-rule="evenodd" />
        <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
      </svg>

      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Peminjaman</span>
      @else
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-gray-800 {{ request()->routeIs('loans.index') ? 'active text-white' : '' }}">
        <path d="M11.47 1.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72V7.5h-1.5V4.06L9.53 5.78a.75.75 0 0 1-1.06-1.06l3-3ZM11.25 7.5V15a.75.75 0 0 0 1.5 0V7.5h3.75a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h3.75Z" />
      </svg>
      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Kelola Peminjaman</span>
      @endif
    </a>
    @endif
    <!-- end manajemen teknis -->
    <!-- LOG RIWAYAT || All role bisa lihat -->
    <div class="transition-all duration-300 ease-in-out">
      <span
        class="block mx-6 mb-2 text-xs text-gray-400 uppercase tracking-widest border-b border-gray-200"
        :class="isSidebarExpanded ? 'opacity-100 h-auto' : 'opacity-0 h-0 overflow-hidden'">
        Log & Riwayat
      </span>
      <hr
        class="border-t border-gray-300 transition-opacity duration-300 ease-in-out"
        :class="isSidebarExpanded ? 'opacity-0' : 'opacity-100'" />
    </div>
    <a href="{{route('item_logs.index')}}" class="flex items-center h-10 px-3 hover:bg-blue-100 hover:text-gray-800 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline {{ request()->routeIs('item_logs.index') ? 'active text-white bg-blue-400' : '' }}">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-gray-800 {{ request()->routeIs('item_logs.index') ? 'active text-white' : '' }}">
        <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
        <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
      </svg>
      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Riwayat Barang</span>
    </a>
    <a href="#" class="flex items-center h-10 px-3 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline
         bg-gray-100 text-gray-400 cursor-not-allowed pointer-events-none">
      <span
        class="ml-2 duration-300 ease-in-out"
        :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">
        Riwayat Perbaikan
      </span>
    </a>

    <a href="#" class="flex items-center h-10 px-3 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline
         bg-gray-100 text-gray-400 cursor-not-allowed pointer-events-none">
      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Riwayat Peminjaman</span>
    </a>
    <!-- end riwayat -->

    @if(auth()->user()->role === 'admin')
    <!-- Manajemen Pengguna -->
    <div>
      <span
        class="block mx-6 mb-2 text-xs text-gray-400 uppercase tracking-widest border-b border-gray-200"
        :class="isSidebarExpanded ? 'opacity-100 h-auto' : 'opacity-0 h-0 overflow-hidden'">
        Manajemen Pengguna
      </span>
      <a href="{{ route('users.index') }}" class="flex items-center h-10 px-3 hover:bg-blue-100 hover:text-gray-800 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline {{ request()->routeIs('users.index', 'loans.create', 'loans.edit') ? 'active text-white bg-blue-400' : '' }}">
        <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-gray-800 {{ request()->routeIs('users.index') ? 'active text-white' : '' }}">
          <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
        </svg>
        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Informasi Pengguna</span>
      </a>
    </div>
  </nav>
  <!-- End Manajemen Pengguna -->
   @endif

  <div class="border-t border-gray-200 p-4 font-medium mt-auto">
    <a href="#" class="flex items-center h-10 px-3 hover:text-gray-900 hover:bg-gray-200 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline">
      <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 flex-shrink-0 text-blue-600">
        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
      </svg>
      <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Settings</span>
    </a>
  </div>
</aside>