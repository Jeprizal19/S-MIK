<header class="h-20 flex items-center justify-between px-6 bg-white shadow-sm">
    <div class="flex items-center">
        <!-- Sidebar Toggle Button -->
        <button class="p-2 -ml-2 mr-2" @click="isSidebarExpanded = !isSidebarExpanded">
            <svg viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round"
                class="h-6 w-6 transform"
                :class="isSidebarExpanded ? 'rotate-180' : 'rotate-0'">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="4" y1="6" x2="14" y2="6" />
                <line x1="4" y1="18" x2="14" y2="18" />
                <path d="M4 12h17l-3 -3m0 6l3 -3" />
            </svg>
        </button>

        <!-- Page Heading -->
        @isset($header)
        <span class="font-medium text-lg text-gray-800">{{ $header }}</span>
        @endisset
    </div>

    <!-- Profile Dropdown -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open"
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100 focus:outline-none transition">
            <span>{{ Auth::user()->name }}</span>
            <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown Content -->
        <div x-show="open" @click.away="open = false"
            x-transition
            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-1 z-50">
            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                {{ __('Profile') }}
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</header>