<div class="p-6" data-tab="dashboard">
        <div class="py-8 flex gap-6">
            <div class="bg-white px-12 py-10 flex flex-col items-center">
                <div class="w-40 h-40 rounded-full border-8 border-teal-600 bg-white overflow-hidden mb-2">
                    <img src="{{ asset('/images/profile.png') }}" alt="profile">
                </div>
                <p class="text-md text-slate-400">{{ $student?->registration?->no_daftar ?? '-' }}</p>
                <p class="font-bold text-black text-xl uppercase">{{ Auth::user()->name }}</p>
            </div>
            <div class="flex flex-col gap-2 bg-white p-4 w-full ">
                <div class="{{ $student ? "bg-green-500" : "bg-yellow-500" }} rounded-lg p-2">
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-white text-2xl font-medium">{{ $student ? 'Selamat! Anda Sudah Terdaftar. 🎉' : 'Anda Belum Mendaftar!' }}</p>
                    </div>
                </div>
                <table class="w-full flex gap-4 border border-slate-300 p-4 rounded-lg">
                    <thead>
                        <tr class="flex flex-col text-left gap-4">
                        <th>Nama</th>
                        <th>NIK/NISN</th>
                        <th>Nilai Rata-Rata</th>
                        <th>No. Pendaftaran</th>
                        <th>Alamat</th>
                        <th>Asal Sekolah</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="flex flex-col gap-4">
                        <td class="uppercase font-medium">{{ $student?->nama_lengkap ?? '-' }}</td>
                        <td>{{ $student?->{'nik/nisn'} ?? '-' }}</td>
                        <td>{{ $student?->nilai_rata_rata ?? '-' }}</td>
                        <td>{{ $student?->registration?->no_daftar ?? '-' }}</td>
                        <td>{{ $student?->alamat ?? '-' }}</td>
                        <td class="uppercase font-medium">{{ $student?->asal_sekolah ?? '-' }}</td>
                        <td>{{ $student?->registration?->status ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>