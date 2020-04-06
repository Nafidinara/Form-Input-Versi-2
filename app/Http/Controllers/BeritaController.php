<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use Exception;
use UxWeb\SweetAlert\SweetAlert;
use File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $data = Berita::all();
        return view('news.table',compact('data'));
    }

    public function index_home()
    {
        $data = Berita::paginate(5);
        return view('home.home',compact('data'));
    }

    public function store(Request $request)
    {
        $judul = $request->get('judul');
        $isi = $request->get('konten');
        $gambar = $request->file('gambar');
        try {
            DB::beginTransaction();
            $name_gambar = date('Y-m-d-his').'-foto-berita.'.$gambar->getClientOriginalExtension();
            Berita::create([
                'judul' => $judul,
                'isi' => $isi,
                'foto' => $gambar->storeAs('file/berita',$name_gambar),
            ]);
            DB::commit();
            alert()->success('Berita berhasil di unggah!','Behasil broo!');
            return redirect('berita/table');
        }catch (Exception $e){
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Ooops, error:'.$e->getMessage()]);
        }
    }

    public function view_store(Request $request)
    {
        return view('news.store');
    }

    public function show($berita_id)
    {
        $data = Berita::where('berita_id',$berita_id)->first();
        return view('news.update',compact('data'));
    }

    public function show_detail($berita_id)
    {
        $data = Berita::where('berita_id',$berita_id)->first();
        return view('news.detail',compact('data'));
    }

    public function update(Request $request, $berita_id)
    {
        $data = Berita::where('berita_id',$berita_id)->first();

        try {
            DB::beginTransaction();
            $data->judul = $request->get('judul');
            $data->isi = $request->get('konten');

            if ($request->hasFile('gambar')){
                $gambar = $request->file('gambar');
                $name_gambar = date('Y-m-d-his').'-foto-berita.'.$gambar->getClientOriginalExtension();
                $del_gambar = $data->foto;
                File::delete('app/'.$del_gambar);
                $data->foto = $gambar->storeAs('file/berita',$name_gambar);
            }

            $data->update();
            DB::commit();
            alert()->success('Berita berhasil di update!','Behasil broo!');
            return redirect('berita/table');
        }catch (Exception $exception){
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Ooops, error:'.$exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
