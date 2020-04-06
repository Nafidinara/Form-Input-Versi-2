<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\Exports\DokumenExport;
use Illuminate\Http\Request;
use DB;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;

class DokumenController extends Controller
{
    public function view_form(){
        return view('form.form');
    }

    public function proses_input(Request $request){
       $nama_organisasi =$request->get('nama_organisasi');
       $no_notaris =$request->get('no_notaris');
       $akta_notaris =$request->get('akta_notaris');
       $tgl_srt_permohonan=$request->get('tgl_srt_permohonan');
       $bdg_kegiatan=$request->get('bdg_kegiatan');
       $proker_ormas=$request->get('proker_ormas');
       $alamat_kantor=$request->get('alamat_kantor');
       $tw_pendirian=$request->get('tw_pendirian');
       $asas_organisasi=$request->get('asas_organisasi');
       $tujuan_organisasi=$request->get('tujuan_organisasi');
       $nama_pendiri=$request->get('nama_pendiri');
       $nama_pembina=$request->get('nama_pembina');
       $nama_penasihat=$request->get('nama_penasihat');
       $nama_ketua=$request->get('nama_ketua');
       $nama_sekertaris=$request->get('nama_sekertaris');
       $nama_berndahara=$request->get('nama_bendahara');
       $masa_bakti_kepengurusan=$request->get('masa_bakti_kepengurusan');
       $keputusan_ttgi_organisasi=$request->get('keputusan_ttgi_organisasi');
       $unit_cabang=$request->get('unit_cabang');
       $sumber_keuangan=$request->get('sumber_keuangan');
       $npwp=$request->file('npwp');
       $logo_organisasi=$request->file('logo_organisasi');
       $bendera_organisasi=$request->file('bendera_organisasi');

       $name_npwp = date('Y-m-d-his').'-npwp.'.$npwp->getClientOriginalExtension();
       $name_logo_organisasi = date('Y-m-d-his').'-logo-organisasi.'.$logo_organisasi->getClientOriginalExtension();
        $name_bendera_organisasi = date('Y-m-d-his').'-bendera-organisasi.'.$bendera_organisasi->getClientOriginalExtension();

        try {
            DB::beginTransaction();
            Dokumen::create([
            'nama_organisasi' => $nama_organisasi,
            'no_notaris' =>$no_notaris,
            'akta_notaris' =>$akta_notaris,
            'tgl_srt_permohonan' =>$tgl_srt_permohonan,
            'bdg_kegiatan' =>$bdg_kegiatan,
            'proker_ormas' =>$proker_ormas,
            'alamat_kantor' =>$alamat_kantor,
            'tw_pendirian' =>$tw_pendirian,
            'asas_organisasi' =>$asas_organisasi,
            'tujuan_organisasi' =>$tujuan_organisasi,
            'nama_pendiri' =>$nama_pendiri,
            'nama_pembina' =>$nama_pembina,
            'nama_penasihat' =>$nama_penasihat,
            'nama_ketua' =>$nama_ketua,
            'nama_sekertaris' =>$nama_sekertaris,
            'nama_bendahara' =>$nama_berndahara,
            'masa_bakti_kepengurusan' =>$masa_bakti_kepengurusan,
            'keputusan_ttgi_organisasi' =>$keputusan_ttgi_organisasi,
            'unit_cabang' =>$unit_cabang,
            'sumber_keuangan' =>$sumber_keuangan,
            'npwp' => $npwp->storeAs('file/npwp',$name_npwp),
            'logo_organisasi' =>$logo_organisasi->storeAs('file/logo-organisasi',$name_logo_organisasi),
            'bendera_organisasi' => $bendera_organisasi->storeAs('file/bendera-organisasi',$name_bendera_organisasi)
            ]);
            DB::commit();
            alert()->success('Dokumen Berhasil Ditambahkan Broo','Berhasil!');
            return redirect('form');
        }catch (Exception $exception){
            DB::rollBack();
            return redirect('/form')->with(['error' => 'Ooops, error:'.$exception->getMessage()]);
        }
    }

    public function show_table(){
        $data = Dokumen::all();
        if (count($data) == 0){
            alert()->error('Data tidak ditemukan atau masih kosong','Poor Man!');
            return view('table.table',compact('data'));
        }
        return view('table.table',compact('data'));
    }

    public function export(){
        return Excel::download(new DokumenExport, 'dokumen.xlsx');
    }

    public function download($dokumen_id){
        $data = Dokumen::where('dokumen_id',$dokumen_id)->first();

        $file_npwp = public_path('app/'.$data->npwp);
        $file_logo = public_path('app/'.$data->logo_organisasi);
        $file_bendera = public_path('app/'.$data->bendera_organisasi);

        $public_dir=public_path();
        // Zip File Name
        $zipFileName = 'file-compress.zip';
        // Create ZipArchive Obj
        $zip = new ZipArchive;
        if ($zip->open($public_dir . '/app/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            // Add File in ZipArchive
            $zip->addFile($file_npwp,basename($file_npwp));
            $zip->addFile($file_logo,basename($file_logo));
            $zip->addFile($file_bendera,basename($file_bendera));
            // Close ZipArchive
            $zip->close();
        }
        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath=$public_dir.'/app/'.$zipFileName;

        return response()->download($filetopath,$zipFileName,$headers);
    }
}
