<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="glass-effect rounded-2xl shadow-2xl overflow-hidden animate-slide-in">

            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-8 py-6 flex items-center justify-between">
                <div>
                    <h3 class="text-3xl font-bold text-white flex items-center gap-3">
                        <span>🏢</span>
                        <span>Manajemen Ruangan</span>
                    </h3>
                    <p class="text-purple-100 mt-1">Kelola semua ruangan yang tersedia</p>
                </div>
                <button onclick="document.getElementById('modalTambah').classList.remove('hidden')"
                    class="px-6 py-3 bg-white text-purple-600 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition font-semibold flex items-center gap-2">
                    <span class="text-xl">+</span>
                    <span>Tambah Ruangan</span>
                </button>
            </div>

            <!-- Table -->
            <div class="p-6 overflow-x-auto">
                <table class="min-w-full text-center items-center">
                    <thead class="table-header text-white">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold rounded-tl-xl">No</th>
                            <th class="px-6 py-4 text-sm font-semibold">Nama Ruangan</th>
                            <th class="px-6 py-4 text-sm font-semibold">Lokasi</th>
                            <th class="px-6 py-4 text-sm font-semibold">Kapasitas</th>
                            <th class="px-6 py-4 text-sm font-semibold">Deskripsi</th>
                            <th class="px-6 py-4 text-sm font-semibold rounded-tr-xl">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @forelse($rooms as $room)
                            <tr class="hover:bg-purple-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-400 to-indigo-500 flex items-center justify-center text-white font-bold">
                                            {{ substr($room->namaRuangan, 0, 1) }}
                                        </div>
                                        <span class="font-semibold text-gray-800">{{ $room->namaRuangan }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">📍 {{ $room->Lokasi }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">👥 {{ $room->kapasitas }} orang</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($room->deskripsi, 50) }}</td>
                                <td class="px-6 py-4 text-center items-center">
                                    <div class="flex items-center gap-2">
                                        <button onclick='openEditModal(@json($room))'
                                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-medium flex items-center gap-1">
                                            <span>✏️</span>
                                            <span>Edit</span>
                                        </button>
                                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus ruangan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <form id="deleteForm{{ $room->id }}"
                                                action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <button type="button" onclick="confirmDelete({{ $room->id }})"
                                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium flex items-center gap-1">
                                                🗑️ Hapus
                                            </button>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div
                                            class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center text-4xl">
                                            🏢
                                        </div>
                                        <p class="text-gray-500 font-medium">Belum ada data ruangan</p>
                                        <button
                                            onclick="document.getElementById('modalTambah').classList.remove('hidden')"
                                            class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                                            Tambah Ruangan Pertama
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="modalTambah" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden animate-slide-in">
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-8 py-6 flex items-center justify-between">
                <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                    <span>➕</span>
                    <span>Tambah Ruangan Baru</span>
                </h2>
                <button onclick="document.getElementById('modalTambah').classList.add('hidden')"
                    class="text-white hover:bg-white hover:bg-opacity-20 rounded-lg p-2 transition">
                    ✕
                </button>
            </div>

            <form action="{{ route('rooms.store') }}" method="POST" class="p-8 space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Ruangan</label>
                        <input type="text" name="namaRuangan" required
                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-purple-500 focus:outline-none transition"
                            placeholder="Contoh: Ruang Meeting A">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi</label>
                        <input type="text" name="Lokasi" required
                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-purple-500 focus:outline-none transition"
                            placeholder="Contoh: Lantai 2">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kapasitas (Orang)</label>
                    <input type="number" name="kapasitas" required min="1"
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-purple-500 focus:outline-none transition"
                        placeholder="Contoh: 10">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" required
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-purple-500 focus:outline-none transition"
                        placeholder="Deskripsi lengkap ruangan..."></textarea>
                </div>
                <div class="flex gap-3 justify-end pt-4">
                    <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')"
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition font-semibold">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-3 btn-primary text-white rounded-xl font-semibold">
                        Simpan Ruangan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="modalEdit" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden animate-slide-in">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6 flex items-center justify-between">
                <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                    <span>✏️</span>
                    <span>Edit Ruangan</span>
                </h2>
                <button onclick="document.getElementById('modalEdit').classList.add('hidden')"
                    class="text-white hover:bg-white hover:bg-opacity-20 rounded-lg p-2 transition">
                    ✕
                </button>
            </div>

            <form id="formEdit" method="POST" class="p-8 space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Ruangan</label>
                        <input id="edit_namaRuangan" type="text" name="namaRuangan" required
                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi</label>
                        <input id="edit_Lokasi" type="text" name="Lokasi" required
                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:outline-none transition">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kapasitas (Orang)</label>
                    <input id="edit_kapasitas" type="number" name="kapasitas" required
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="edit_deskripsi" name="deskripsi" rows="4" required
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:outline-none transition"></textarea>
                </div>
                <div class="flex gap-3 justify-end pt-4">
                    <button type="button" onclick="document.getElementById('modalEdit').classList.add('hidden')"
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition font-semibold">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-semibold">
                        Update Ruangan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(room) {
            document.getElementById('modalEdit').classList.remove('hidden');
            document.getElementById('formEdit').action = "/rooms/" + room.id;
            document.getElementById('edit_namaRuangan').value = room.namaRuangan;
            document.getElementById('edit_Lokasi').value = room.Lokasi;
            document.getElementById('edit_kapasitas').value = room.kapasitas;
            document.getElementById('edit_deskripsi').value = room.deskripsi;
        }
    </script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Ruangan?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + id).submit();
                }
            });
        }
    </script>

</x-app-layout>
