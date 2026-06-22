<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents
{
    protected $selectJalur;
    protected $totalSiswa = 0;

    public function __construct($selectJalur = null)
    {
        $this->selectJalur = $selectJalur;
    }

    public function collection()
    {
        $query = Registration::with([
            'student',
            'jalur'
        ])->when($this->selectJalur, function ($query) {
            $query->where('jalur_pendaftaran_id', $this->selectJalur);
        })
            ->get();
        $this->totalSiswa = $query->count();
        return $query->map(function ($registration) {
            return [
                'no_daftar' => (string) $registration->no_daftar,
                'nama_siswa' => $registration->student->nama_lengkap ?? '-',
                'jalur' => $registration->jalur->nama ?? '-',
                'hasil_seleksi' => $registration->hasil_seleksi ??  '-',
                'tanggal_daftar' => $registration->created_at->format('d M Y'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No Pendaftaran',
            'Nama Siswa',
            'Jalur Daftar',
            'Hasil Seleksi',
            'Tanggal Daftar'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => 'ffffff'
                ]
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '64748B'
                ]
            ]
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Mendapatkan nomor baris terakhir yang berisi data siswa
                $highestRow = $event->sheet->getHighestRow();

                // Baris baru di bawahnya untuk total
                $totalRow = $highestRow + 1;

                // Menghitung jumlah data siswa menggunakan rumus Excel =COUNTA(A2:A...)
                $formulaTotal = "=COUNTA(A2:A" . $highestRow . ")";

                // Menulis teks "Total Siswa" di Kolom D (Pojok kanan dekat hasil)
                $event->sheet->setCellValue('D' . $totalRow, 'Total Siswa :');

                // Menulis rumus hitung jumlah di Kolom E (Pojok paling kanan bawah)
                $event->sheet->setCellValue('E' . $totalRow, $this->totalSiswa);

                // Memberikan style tebal (bold) khusus untuk baris total agar menonjol
                $event->sheet->getStyle('D' . $totalRow . ':E' . $totalRow)->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);
            },
        ];
    }
}
