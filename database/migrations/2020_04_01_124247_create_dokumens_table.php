<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->bigIncrements('dokumen_id');
            $table->string('nama_organisasi')->default(null);
            $table->string('no_notaris')->default(null);
            $table->string('akta_notaris')->default(null);
            $table->string('tgl_srt_permohonan')->default(null);
            $table->string('bdg_kegiatan')->default(null);
            $table->string('proker_ormas')->default(null);
            $table->string('alamat_kantor')->default(null);
            $table->string('tw_pendirian')->default(null);
            $table->string('asas_organisasi')->default(null);
            $table->string('tujuan_organisasi')->default(null);
            $table->string('nama_pendiri')->default(null);
            $table->string('nama_pembina')->default(null);
            $table->string('nama_penasihat')->default(null);
            $table->string('nama_ketua')->default(null);
            $table->string('nama_sekertaris')->default(null);
            $table->string('nama_bendahara')->default(null);
            $table->string('masa_bakti_kepengurusan')->default(null);
            $table->string('keputusan_ttgi_organisasi')->default(null);
            $table->string('unit_cabang')->default(null);
            $table->string('sumber_keuangan')->default(null);
            $table->string('npwp')->default(null);
            $table->string('logo_organisasi')->default(null);
            $table->string('bendera_organisasi')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumens');
    }
}
