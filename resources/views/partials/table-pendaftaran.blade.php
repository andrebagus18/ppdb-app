<div class="h-100 overflow-y-auto scrollbar-hide">
    <table class="w-full text-md text-left bg-white">
        <thead class="bg-slate-200 text-slate-600 sticky top-0 z-10">
            <tr>
                <th class="px-1 py-2">No</th>
                <th class="px-1 py-2">Nomor Pendaftaran</th>
                <th class="px-1 py-2">Nama</th>
                <th class="px-1 py-2">Jalur Pendaftaran</th>
                <th class="px-1 py-2">Status</th>
                <th class="px-1 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($registrations as $registration)
                <tr class="border-t hover:bg-slate-100">
                    <td class="p-1">
                        {{ $registrations->firstItem() + $loop->index }}
                    </td>
                    <td class="p-1 font-medium text-slate-700">
                        {{ $registration->no_daftar }}
                    </td>
                    <td class="p-1 uppercase">
                        {{ $registration->student->nama_lengkap ?? '-' }}
                    </td>
                    <td class="p-1">
                        {{ $registration->jalur->nama ?? '-' }}
                    </td>
                    <td class="p-1">
                        <span class="px-3 py-2 rounded-lg text-sm font-medium {{ statusSiswa($registration)['bg'] }}">
                            {{ statusSiswa($registration)['title'] }}
                        </span>
                    </td>
                    <td class="p-1">
                        <button onclick="openModalSiswa({{ $registration->id }})"
                            class="py-1.5 px-4 bg-blue-500 hover:bg-blue-600 text-white text-md-center rounded-lg cursor-pointer">
                            Preview
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-6 text-center text-slate-500">
                        Belum ada data pendaftar
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-2 paginator-class pagination px-4">
    {{ $registrations->links() }}
</div>
