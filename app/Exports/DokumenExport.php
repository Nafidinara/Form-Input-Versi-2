<?php

namespace App\Exports;

use App\Dokumen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class DokumenExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dokumen::select([
            'dokumen_id','nama_organisasi', 'no_notaris', 'akta_notaris', 'tgl_srt_permohonan', 'bdg_kegiatan', 'proker_ormas',
            'alamat_kantor', 'tw_pendirian', 'asas_organisasi', 'tujuan_organisasi',
            'nama_pendiri', 'nama_pembina', 'nama_penasihat', 'nama_ketua',
            'nama_sekertaris', 'nama_bendahara', 'masa_bakti_kepengurusan', 'keputusan_ttgi_organisasi',
            'unit_cabang', 'sumber_keuangan', 'logo_organisasi', 'bendera_organisasi', 'npwp','created_at'
        ])->get();
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:Y1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);

                $style = [
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => 'f4e04d',
                        ]
                    ]
                ];
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
            },
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Organisasi',
            'Nama Notaris',
            'No dan Tanggal Akta Notaris',
            'No dan Tanggal Surat Permohonan',
            'Bidang Kegiatan',
            'Program Kerja Ormas',
            'Alamat Kantor/Sekertariat',
            'Tempat dan Waktu Pendirian',
            'Asas Ciri Organisasi',
            'Tujuan Organisasi',
            'Nama Pendiri',
            'Nama Pembina',
            'Nama Penasihat',
            'ketua',
            'Sekertaris',
            'Bendahara',
            'Masa Bakti Kepengurusan',
            'Keputusan Tertinggi Organisasi',
            'Unit/Cabang',
            'Sumber Keuangan',
            'NPWP',
            'Lambang Organisasi',
            'Bendera Organisasi',
            'Tanggal Dibuat'
        ];
    }
}
