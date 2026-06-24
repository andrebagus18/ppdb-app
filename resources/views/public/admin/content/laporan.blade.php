<section id="laporan" class="p-6">
    <div class="p-4 mt-2 rounded-xl border-2 border-blue-500/40">
        <div class="rounded-xl flex flex-col">
            <div class="flex items-end justify-between mx-5 my-5">
                <div class="flex gap-3">
                    <span class="rounded-lg px-4 py-2 bg-green-900/30 text-green-500">Total Siswa Diterima:
                        {{ $statsDiterima }} </span>
                    <span class="rounded-lg px-4 py-2 bg-red-900/30 text-red-500">Total Siswa Ditolak:
                        {{ $statsDitolak }}
                    </span>
                </div>
                <div class="flex">
                    <form action="{{ route('admin.laporan.export') }}" method="GET" class="flex gap-3">
                        @csrf
                        <button type="submit"
                            class="bg-blue-900/30 hover:bg-blue-900/20 text-blue-500 px-4 py-2 rounded cursor-pointer">
                            Export Excel
                        </button>
                        <select id="jalur_id" name="jalur_id"
                            class="rounded-lg text-blue-500 border border-blue-500 px-4 py-2 focus:outline-none cursor-pointer">
                            <option value="">Semua
                                Jalur</option>
                            @foreach ($jalurs as $jalur)
                                <option value="{{ $jalur->id }}" @selected(request('jalur_id') == $jalur->id)>
                                    {{ $jalur->nama }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-4 w-full h-40 mt-8 p-4">
                @foreach ($totalJalur as $total)
                    <div class="flex flex-col justify-center items-center p-4 gap-4 border border-blue-500 rounded-lg">
                        <span class="text-blue-500 text-4xl font-bold">{{ $total->total_diterima }}</span>
                        <span class="text-slate-300 text-xl capitalize">{{ $total->nama }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
