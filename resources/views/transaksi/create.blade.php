<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pencatatan Pelanggaran Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Form Input Pelanggaran Manual</h3>
                    <a href="{{ route('transaksi.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 text-sm">
                        &larr; Kembali
                    </a>
                </div>

                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf

                    <!-- Nama Siswa -->
                    <div class="mb-4">
                        <label for="nama_siswa" class="block text-sm font-medium text-gray-700 mb-1">Nama Siswa</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa') }}" placeholder="Masukkan nama lengkap siswa" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <!-- Kelas -->
                    <div class="mb-4">
                        <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                        <input type="text" name="kelas" id="kelas" value="{{ old('kelas') }}" placeholder="Contoh: XII" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <!-- Bentuk Pelanggaran -->
                    <div class="mb-4">
                        <label for="nama_pelanggaran" class="block text-sm font-medium text-gray-700 mb-1">Bentuk Pelanggaran</label>
                        <input type="text" name="nama_pelanggaran" id="nama_pelanggaran" value="{{ old('nama_pelanggaran') }}" placeholder="Contoh: Merokok / Terlambat" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <!-- Poin Pelanggaran -->
                    <div class="mb-4">
                        <label for="bobot_poin" class="block text-sm font-medium text-gray-700 mb-1">Poin Pelanggaran</label>
                        <input type="number" name="bobot_poin" id="bobot_poin" value="{{ old('bobot_poin', 10) }}" min="1" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <!-- Tanggal Pelanggaran -->
                    <div class="mb-4">
                        <label for="tanggal_pelanggaran" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kejadian</label>
                        <input type="date" name="tanggal_pelanggaran" id="tanggal_pelanggaran" value="{{ old('tanggal_pelanggaran', date('Y-m-d')) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <!-- Catatan / Keterangan -->
                    <div class="mb-8">
                        <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan / Keterangan (Opsional)</label>
                        <textarea name="catatan" id="catatan" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Detail kejadian atau lokasi...">{{ old('catatan') }}</textarea>
                    </div>

                    <!-- Tombol Simpan (Gaya Jelas & Mencolok) -->
                    <div class="pt-4 border-t border-gray-200 flex justify-end space-x-3">
                        <a href="{{ route('transaksi.index') }}" class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-md transition duration-150 ease-in-out">
                            💾 Simpan Pelanggaran
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>