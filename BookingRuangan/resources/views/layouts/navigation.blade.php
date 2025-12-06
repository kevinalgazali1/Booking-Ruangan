<nav x-data="{ open: false }" class="glass-effect shadow-lg mx-4 mt-4 rounded-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div
                        class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center text-2xl backdrop-blur-lg border border-white border-opacity-30">
                        🏢
                    </div>
                    <span class="text-2xl font-bold text-gray-800">RoomHub</span>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-3 px-5 py-2.5 rounded-xl bg-white bg-opacity-50 hover:bg-opacity-70 transition border border-white border-opacity-30 backdrop-blur-lg">
                            <div
                                class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <div class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-600">{{ ucfirst(Auth::user()->role) }}</div>
                            </div>
                            <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06 0L10 10.92l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if (Auth::user()->role === 'admin')
                            <x-dropdown-link :href="route('admin.dashboard')">
                                📊 Dashboard
                            </x-dropdown-link>
                        @else
                            <x-dropdown-link :href="route('user.dashboard')">
                                📊 Dashboard
                            </x-dropdown-link>
                        @endif

                        @if (Auth::user()->role === 'admin')
                            <x-dropdown-link :href="route('booking.admin')">
                                📋 Daftar Booking
                            </x-dropdown-link>
                        @else
                            <x-dropdown-link :href="route('booking.user')">
                                📋 Daftar Booking
                            </x-dropdown-link>
                        @endif

                        <x-dropdown-link :href="route('profile.edit')">
                            👤 Profil
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                🚪 Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
