<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-6">

        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-semibold">Daftar Booking</h3>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4 overflow-x-auto">
                <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium">No</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Nama Ruangan</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Tanggal Booking</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Waktu Mulai</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Waktu Selesai</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Tujuan</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm">{{ $loop->iteration }}</td>

                                <td class="px-4 py-3 text-sm">
                                    {{ $booking->room->namaRuangan }}
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    {{ $booking->tanggal_booking }}
                                </td>

                                <!-- Format waktu -->
                                <td class="px-4 py-3 text-sm">
                                    {{ \Carbon\Carbon::parse($booking->waktu_mulai)->format('H:i') }}
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    {{ \Carbon\Carbon::parse($booking->waktu_akhir)->format('H:i') }}
                                </td>

                                <td class="px-4 py-3 text-sm">{{ $booking->tujuan }}</td>

                                <!-- Status -->
                                <td class="px-4 py-3 text-sm">
                                    @if($booking->status == 'pending')
                                        <span class="text-yellow-600 font-semibold">Pending</span>
                                    @elseif($booking->status == 'approved')
                                        <span class="text-green-600 font-semibold">Disetujui</span>
                                    @else
                                        <span class="text-red-600 font-semibold">Ditolak</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-4 text-center text-gray-500">
                                    Belum ada data Booking
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
