<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * @mixin Eloquent
 */

class Dokumen extends Model
{
    protected $table = 'dokumens';
    protected $primaryKey = 'dokumen_id';
    protected $fillable = [
        'nama_organisasi', 'no_notaris', 'akta_notaris', 'tgl_srt_permohonan', 'bdg_kegiatan', 'proker_ormas',
'alamat_kantor', 'tw_pendirian', 'asas_organisasi', 'tujuan_organisasi',
'nama_pendiri', 'nama_pembina', 'nama_penasihat', 'nama_ketua',
'nama_sekertaris', 'nama_bendahara', 'masa_bakti_kepengurusan', 'keputusan_ttgi_organisasi',
'unit_cabang', 'sumber_keuangan', 'logo_organisasi', 'bendera_organisasi', 'npwp'
    ];
}
