<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-indigo-600 to-purple-700 py-10 px-4">

        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="mb-6 text-center text-white">
                <h1 class="text-4xl font-bold drop-shadow-lg">Daftar Ruangan</h1>
                <p class="text-sm opacity-80 mt-1">Pilih ruangan untuk membuat booking</p>
            </div>

            <!-- Alert -->
            @if (session('success'))
                <div class="mb-4 bg-green-600 text-white p-3 rounded-lg shadow-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Card -->
            <div class="bg-white/20 backdrop-blur-lg shadow-xl rounded-2xl p-6 border border-white/30">

                <table class="min-w-full text-white">
                    <thead>
                        <tr class="border-b border-white/20">
                            <th class="py-3">Nama Ruangan</th>
                            <th>Lokasi</th>
                            <th>Kapasitas</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rooms as $room)
                            <tr class="border-b border-white/10">
                                <td class="py-3">{{ $room->namaRuangan }}</td>
                                <td>{{ $room->Lokasi }}</td>
                                <td>{{ $room->kapasitas }}</td>
                                <td>{{ $room->deskripsi }}</td>
                                <td>
                                    <button
                                        class="bg-white text-indigo-700 px-3 py-1 rounded-lg shadow hover:bg-gray-200 transition"
                                        onclick="openBooking({{ $room->id }}, '{{ $room->namaRuangan }}')">
                                        Booking
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>


    <!-- Modal Booking -->
    <div id="bookingModal" class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-lg p-6 relative">

            <h2 class="text-2xl font-semibold mb-4" id="roomName"></h2>

            <form action="{{ route('booking.store') }}" method="POST">
                @csrf

                <input type="hidden" name="room_id" id="room_id">

                <div class="mb-3">
                    <label class="block font-semibold">Tanggal</label>
                    <input type="date" name="tanggal_booking" id="tanggal_booking"
                        class="w-full border px-3 py-2 rounded">
                </div>

                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div>
                        <label class="block font-semibold">Mulai</label>
                        <input type="time" name="waktu_mulai" class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block font-semibold">Akhir</label>
                        <input type="time" name="waktu_akhir" class="w-full border px-3 py-2 rounded">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="block font-semibold">Tujuan</label>
                    <input type="text" name="tujuan" class="w-full border px-3 py-2 rounded">
                </div>

                <p id="jamTerpakai" class="text-sm text-red-600 mb-3"></p>

                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">
                        Batal
                    </button>

                    <button type="submit" class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                        Booking
                    </button>
                </div>
            </form>

            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-black">
                ✕
            </button>

        </div>
    </div>


    <script>
        function openBooking(id, name) {
            document.getElementById('bookingModal').classList.remove('hidden');
            document.getElementById('roomName').innerText = "Booking Ruangan: " + name;
            document.getElementById('room_id').value = id;
            document.getElementById('jamTerpakai').innerText = "";
        }

        function closeModal() {
            document.getElementById('bookingModal').classList.add('hidden');
        }

        // Ambil jam terpakai otomatis
        document.getElementById('tanggal_booking').addEventListener('change', function() {
            let roomId = document.getElementById('room_id').value;
            let tanggal = this.value;

            if (!tanggal || !roomId) return;

            fetch(`/booking/jam-terpakai?room_id=${roomId}&tanggal=${tanggal}`)
                .then(res => res.json())
                .then(data => {
                    let info = "";
                    data.forEach(item => {
                        info += `• ${item.waktu_mulai} - ${item.waktu_akhir}\n`;
                    });

                    document.getElementById('jamTerpakai').innerText =
                        data.length ? "Sudah dibooking:\n" + info : "Belum ada booking pada tanggal ini.";
                });
        });
    </script>
</x-app-layout>
