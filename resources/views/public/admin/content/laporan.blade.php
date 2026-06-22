<section id="laporan" class="p-6">
    <div class="p-2 pt-0">
        <div class="bg-white rounded-xl p-2 flex flex-col">
            <div class="flex items-end justify-between mx-5 my-5">
                <div class="flex gap-3">
                    <span class="rounded-lg px-4 py-2 bg-green-100 text-green-800">Total Siswa Diterima: {{ $statsDiterima }} </span>
                    <span class="rounded-lg px-4 py-2 bg-gray-200 text-gray-800">Total Siswa Ditolak: {{ $statsDitolak }} </span>
                </div>
                    <div class="flex">
                        <form action="{{ route('admin.laporan.export') }}" method="GET" class="flex gap-3">
                            @csrf
                            <button type="submit" class="bg-blue-600 px-4 py-2 rounded cursor-pointer">
                                Export Excel
                            </button>
                            <select id="jalur_id" name="jalur_id"
                                class="rounded-lg border border-slate-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                                <option value="">Semua Jalur</option>
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
                <div class="flex flex-col justify-center items-center p-4 gap-4 border border-slate-300 rounded-lg">
                    <span class="text-black text-4xl">{{ $total->total_diterima }}</span>
                    <span class="text-slate-400 text-xl capitalize">{{ $total->nama }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
