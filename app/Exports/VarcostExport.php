<?php

namespace App\Exports;

use App\Models\Varcost;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VarcostExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        // Ambil data yang akan diexport ke Excel
        return Varcost::all();
    }

    public function headings(): array
    {
        return [
            'No', 'Kategori', 'Periode', 'Tahun', 'Site ID', 'Site Name', 'NOP', 
            'CLUSTER', 'Tiket SWFM', 'Tanggal Pelaksanaan', 'Aktivity', 'Kode SL', 
            'Qty', 'Harga Satuan', 'Fee', 'Status Ticket', 'PO', 
            'Status Pekerjaan', 'Status Penagihan'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Atur styling seperti font size, bold untuk header, dan border
        $sheet->getStyle('A1:T1')->getFont()->setBold(true);
        $sheet->getStyle('A1:T1')->getFont()->setSize(10);
        $sheet->getStyle('A:T')->getAlignment()->setWrapText(true);
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(15);
        // Sesuaikan ukuran kolom lainnya di sini sesuai kebutuhan
        
        return [
            // Tambahkan styling lainnya sesuai kebutuhan
        ];
    }
}
