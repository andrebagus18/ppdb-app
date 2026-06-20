<section id="laporan" class="p-6">
    <div class="p-2 pt-0">
        <div class="bg-white rounded-xl p-2 flex flex-col">

            <div class="flex items-center justify-between">
                <div>
                    <h3>Laporan Siswa Diterima</h3>
                    <span>Total Siswa Diterima: </span>
                </div>
                <div class="flex gap-3">
                    <div>
                        <button class="bg-blue-600 px-4 py-2 rounded mt-5 cursor-pointer">
                            Export Semua
                        </button>
                        <button class="bg-emerald-600 px-4 py-2 rounded mt-5 cursor-pointer">
                            Export Per Jalur
                        </button>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-black text-md font-bold">Filter Jalur (Opsional)</span>
                        <select id="jalur_id" name="jalur_id"
                            class="rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                            <option value="">Jalur Reguler</option>
                            <option value="">Jalur Prestasi</option>
                            <option value="">Jalur Zonasi</option>
                            <option value="">Jalur Afirmasi</option>
                            {{-- @foreach ($jalurs as $jalur)
                    <option value="{{ $jalur->id }}" @selected(request('jalur_id') == $jalur->id)>
                        {{ $jalur->nama }}
                    </option>
                @endforeach --}}
                        </select>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-4 w-full">
                <div class="flex flex-col items-center p-4 gap-4">
                    <span class="text-black text-2xl">0</span>
                    <span class="text-slate-400 text-md">Reguler</span>
                </div>
                <div class="flex flex-col items-center p-4 gap-4">
                    <span class="text-black text-2xl">0</span>
                    <span class="text-slate-400 text-md">Prestasi</span>
                </div>
                <div class="flex flex-col items-center p-4 gap-4">
                    <span class="text-black text-2xl">0</span>
                    <span class="text-slate-400 text-md">Zonasi</span>
                </div>
                <div class="flex flex-col items-center p-4 gap-4">
                    <span class="text-black text-2xl">0</span>
                    <span class="text-slate-400 text-md">Afirmasi</span>
                </div>
            </div>
        </div>
    </div>
</section>
