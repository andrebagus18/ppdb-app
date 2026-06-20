<section id="panitia" class="p-6">
    <div class="p-2 pt-0">
        <h1 class="text-2xl font-bold">Manajemen Panitia</h1>
        <div class="flex justify-end">
            <button class="bg-emerald-600 px-4 py-2 rounded mb-4">
                Tambah Panitia
            </button>
        </div>
        <div class="bg-white rounded-xl p-4">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-gray-500 border-b border-slate-700">
                        <th class="text-left p-2">No.</th>
                        <th class="text-left p-2">Nama</th>
                        <th class="text-left p-2">Email</th>
                        <th class="text-left p-2">Bergabung</th>
                        <th class="text-right p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-200">
                        <td class="p-2">1</td>
                        <td class="p-2">Andi</td>
                        <td class="p-2">panitia002</td>
                        <td class="p-2">15-01-2024</td>
                        <td class="p-2 flex gap-1 justify-end">
                            <button
                                class="bg-green-500 hover:bg-green-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer">
                                <i data-lucide="square-pen" class="w-4 h-4"></i>
                                Edit</button>
                            <button
                                class="bg-red-500 hover:bg-red-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer">
                                <i data-lucide="trash" class="w-4 h-4"></i>
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
