<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Success Alert -->
        @if (session('success'))
            <div class="mb-6 animate-slide-in">
                <div class="glass-effect rounded-xl px-6 py-4 flex items-center gap-3 border-l-4 border-green-500">
                    <span class="text-3xl">✅</span>
                    <p class="text-gray-800 font-semibold">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Header -->
        <div class="glass-effect rounded-2xl shadow-2xl overflow-hidden mb-6 animate-slide-in">
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-8 py-8 text-center">
                <h1 class="text-4xl font-bold text-white mb-2 flex items-center justify-center gap-3">
                    <span>🏢</span>
                    <span>Daftar Ruangan Tersedia</span>
                </h1>
                <p class="text-purple-100">Pilih ruangan yang sesuai dengan kebutuhan Anda</p>
            </div>
        </div>

        <!-- Rooms Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            @foreach ($rooms as $room)
                <div class="glass-effect rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 animate-slide-in"
                    style="animation-delay: {{ $loop->index * 0.1 }}s;">

                    <!-- Card Header -->
                    <div class="bg-gradient-to-br from-purple-500 to-indigo-600 px-6 py-8 text-center">
                        <div
                            class="w-20 h-20 mx-auto bg-white bg-opacity-20 rounded-full flex items-center justify-center text-5xl mb-4 backdrop-blur-lg">
                            🏢
                        </div>
                        <h3 class="text-2xl font-bold text-white">{{ $room->namaRuangan }}</h3>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 bg-white space-y-4">
                        <div class="flex items-center gap-3 text-gray-700">
                            <span class="text-2xl">📍</span>
                            <div>
                                <p class="text-xs text-gray-500 font-semibold">Lokasi</p>
                                <p class="font-semibold">{{ $room->Lokasi }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 text-gray-700">
                            <span class="text-2xl">👥</span>
                            <div>
                                <p class="text-xs text-gray-500 font-semibold">Kapasitas</p>
                                <p class="font-semibold">{{ $room->kapasitas }} Orang</p>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-gray-200">
                            <p class="text-xs text-gray-500 font-semibold mb-1">Deskripsi</p>
                            <p class="text-sm text-gray-600">{{ $room->deskripsi }}</p>
                        </div>

                        <!-- Action Button -->
                        <button onclick="openBooking({{ $room->id }}, '{{ $room->namaRuangan }}')"
                            class="w-full mt-4 btn-primary text-white py-3 rounded-xl font-bold shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <span>📅</span>
                            <span>Booking Sekarang</span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($rooms->isEmpty())
            <div class="glass-effect rounded-2xl shadow-2xl p-12 text-center">
                <div class="w-32 h-32 mx-auto bg-gray-100 rounded-full flex items-center justify-center text-6xl mb-6">
                    🏢
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Ruangan Tersedia</h3>
                <p class="text-gray-600">Silakan hubungi admin untuk informasi lebih lanjut</p>
            </div>
        @endif

        <!-- Pagination -->
        @if ($rooms->hasPages())
            <div class="flex justify-center mt-8">
                <div class="glass-effect rounded-xl shadow-lg px-6 py-4">
                    {{ $rooms->links() }}
                </div>
            </div>
        @endif
    </div>

    <!-- Modal Booking -->
    <div id="bookingModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 overflow-y-auto">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden animate-slide-in my-8">

            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-6 py-4 flex items-center justify-between">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span>📅</span>
                    <span id="roomName">Booking Ruangan</span>
                </h2>
                <button onclick="closeModal()"
                    class="text-white hover:bg-white hover:bg-opacity-20 rounded-lg p-2 transition">
                    ✕
                </button>
            </div>

            <!-- Modal Body - dengan max-height dan scroll -->
            <div class="max-h-[calc(100vh-12rem)] overflow-y-auto">
                <form action="{{ route('booking.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <input type="hidden" name="room_id" id="room_id">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Booking</label>
                        <input type="date" name="tanggal_booking" id="tanggal_booking" required
                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 focus:border-purple-500 focus:outline-none transition">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Waktu Mulai</label>
                            <select id="waktu_mulai" name="waktu_mulai" required
                                class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 focus:border-purple-500 focus:outline-none transition">
                                <option value="">Pilih Waktu Mulai</option>
                                @for ($i = 8; $i <= 17; $i++)
                                    <option value="{{ sprintf('%02d:00', $i) }}">{{ sprintf('%02d:00', $i) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Waktu Akhir</label>
                            <select id="waktu_akhir" name="waktu_akhir" required
                                class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 focus:border-purple-500 focus:outline-none transition">
                                <option value="">Pilih Waktu Akhir</option>
                                @for ($i = 9; $i <= 18; $i++)
                                    <option value="{{ sprintf('%02d:00', $i) }}">{{ sprintf('%02d:00', $i) }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tujuan Pemakaian</label>
                        <textarea name="tujuan" rows="3" required
                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 focus:border-purple-500 focus:outline-none transition"
                            placeholder="Jelaskan tujuan pemakaian ruangan..."></textarea>
                    </div>

                    <!-- Info Jam Terpakai -->
                    <div id="jamTerpakaiContainer" class="hidden">
                        <div class="bg-amber-50 border-l-4 border-amber-500 rounded-lg p-3">
                            <p class="text-sm font-semibold text-amber-800 mb-2 flex items-center gap-2">
                                <span>⚠️</span>
                                <span>Informasi: Waktu yang Sudah Dibooking</span>
                            </p>
                            <p id="jamTerpakai" class="text-sm text-amber-700 whitespace-pre-line"></p>
                            <p class="text-xs text-amber-600 mt-2 italic">
                                * Waktu yang sudah dibooking tidak dapat dipilih pada dropdown
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-3 justify-end pt-4 border-t border-gray-200">
                        <button type="button" onclick="closeModal()"
                            class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition font-semibold">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-2.5 btn-primary text-white rounded-xl font-semibold">
                            Konfirmasi Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openBooking(id, name) {
            document.getElementById('bookingModal').classList.remove('hidden');
            document.getElementById('roomName').innerText = name;
            document.getElementById('room_id').value = id;

            // Reset form
            document.getElementById('tanggal_booking').value = "";
            document.getElementById('waktu_mulai').value = "";
            document.getElementById('waktu_akhir').value = "";
            document.querySelector('textarea[name="tujuan"]').value = "";

            // Reset waktu options
            resetTimeOptions();

            // Hide info jam terpakai
            document.getElementById('jamTerpakaiContainer').classList.add('hidden');

            // Prevent body scroll when modal is open
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('bookingModal').classList.add('hidden');
            // Restore body scroll
            document.body.style.overflow = '';
        }

        // Reset semua option waktu menjadi enabled
        function resetTimeOptions() {
            document.querySelectorAll('#waktu_mulai option').forEach(opt => {
                if (opt.value !== "") {
                    opt.disabled = false;
                    opt.classList.remove('text-red-400');
                }
            });
            document.querySelectorAll('#waktu_akhir option').forEach(opt => {
                if (opt.value !== "") {
                    opt.disabled = false;
                    opt.classList.remove('text-red-400');
                }
            });
        }

        // Event listener untuk tanggal
        document.getElementById('tanggal_booking').addEventListener('change', function() {
            let roomId = document.getElementById('room_id').value;
            let tanggal = this.value;

            if (!tanggal || !roomId) return;

            // Reset waktu terlebih dahulu
            resetTimeOptions();
            document.getElementById('waktu_mulai').value = "";
            document.getElementById('waktu_akhir').value = "";

            // Ambil data booking yang sudah ada
            fetch(`/booking/jam-terpakai?room_id=${roomId}&tanggal=${tanggal}`)
                .then(res => res.json())
                .then(data => {
                    let container = document.getElementById('jamTerpakaiContainer');
                    let info = "";

                    // Disable waktu yang sudah dibooking
                    data.forEach(item => {
                        disableBookedTimeRange(item.waktu_mulai, item.waktu_akhir);
                        info += `• ${item.waktu_mulai} - ${item.waktu_akhir}\n`;
                    });

                    // Tampilkan info jam terpakai
                    if (data.length) {
                        document.getElementById('jamTerpakai').innerText = info;
                        container.classList.remove('hidden');
                    } else {
                        container.classList.add('hidden');
                    }
                });
        });

        // Fungsi untuk disable range waktu yang sudah dibooking
        function disableBookedTimeRange(start, end) {
            // Parse waktu ke format HH:00
            let startHour = parseInt(start.split(':')[0]);
            let endHour = parseInt(end.split(':')[0]);

            // Disable waktu mulai yang bentrok
            document.querySelectorAll('#waktu_mulai option').forEach(opt => {
                if (opt.value === "") return;

                let optHour = parseInt(opt.value.split(':')[0]);

                // Disable jika waktu berada dalam range booking atau overlap
                if (optHour >= startHour && optHour < endHour) {
                    opt.disabled = true;
                    opt.classList.add('text-red-400');
                    opt.text = opt.text + ' (Dibooking)';
                }
            });

            // Disable waktu akhir yang bentrok
            document.querySelectorAll('#waktu_akhir option').forEach(opt => {
                if (opt.value === "") return;

                let optHour = parseInt(opt.value.split(':')[0]);

                // Disable jika waktu berada dalam range booking atau overlap
                if (optHour > startHour && optHour <= endHour) {
                    opt.disabled = true;
                    opt.classList.add('text-red-400');
                    opt.text = opt.text + ' (Dibooking)';
                }
            });
        }

        // Event listener untuk waktu mulai - validasi waktu akhir
        document.getElementById('waktu_mulai').addEventListener('change', function() {
            const startTime = this.value;
            const endSelect = document.getElementById('waktu_akhir');

            if (!startTime) return;

            // Reset waktu akhir
            endSelect.value = "";

            // Disable waktu akhir yang tidak valid (lebih kecil atau sama dengan waktu mulai)
            Array.from(endSelect.options).forEach(opt => {
                if (opt.value === "") return;

                // Jika sudah disabled karena booking, skip
                if (opt.disabled && opt.text.includes('(Dibooking)')) return;

                // Disable jika waktu akhir <= waktu mulai
                if (opt.value <= startTime) {
                    opt.disabled = true;
                } else {
                    opt.disabled = false;
                }
            });
        });

        // Validasi form sebelum submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const startTime = document.getElementById('waktu_mulai').value;
            const endTime = document.getElementById('waktu_akhir').value;

            if (!startTime || !endTime) {
                e.preventDefault();
                alert('Harap pilih waktu mulai dan waktu akhir!');
                return;
            }

            if (endTime <= startTime) {
                e.preventDefault();
                alert('Waktu akhir harus lebih besar dari waktu mulai!');
                return;
            }
        });

        // Close modal when clicking outside
        document.getElementById('bookingModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</x-app-layout>