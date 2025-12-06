<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-effect rounded-2xl shadow-2xl overflow-hidden animate-slide-in">
            
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-8 py-6">
                <h3 class="text-3xl font-bold text-white flex items-center gap-3">
                    <span>📋</span>
                    <span>Riwayat Booking Saya</span>
                </h3>
                <p class="text-purple-100 mt-1">Lihat semua booking ruangan yang telah Anda buat</p>
            </div>

            <!-- Table -->
            <div class="p-6 overflow-x-auto">
                <table class="min-w-full">
                    <thead class="table-header text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold rounded-tl-xl">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Ruangan</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Tanggal</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Waktu</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Tujuan</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold rounded-tr-xl">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-purple-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-400 to-indigo-500 flex items-center justify-center text-white font-bold">
                                            🏢
                                        </div>
                                        <span class="font-semibold text-gray-800">{{ $booking->room->namaRuangan }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <span>📅</span>
                                        <span>{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d M Y') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <span>⏰</span>
                                        <span>{{ \Carbon\Carbon::parse($booking->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->waktu_akhir)->format('H:i') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($booking->tujuan, 30) }}</td>
                                <td class="px-6 py-4">
                                    @if($booking->status == 'pending')
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">⏳ Pending</span>
                                    @elseif($booking->status == 'approved')
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">✓ Disetujui</span>
                                    @else
                                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">✕ Ditolak</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center text-4xl">
                                            📋
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada riwayat booking</p>
                                        <a href="{{ route('user.dashboard') }}" 
                                            class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                                            Mulai Booking Sekarang
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>