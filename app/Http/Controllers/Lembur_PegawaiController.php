<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori_lembur;
use App\Lembur_pegawai;
use App\Pegawai;
use Requests;
use Update;



class Lembur_PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('HRD');
    }
    public function index()
    {
       
        $lembur = Lembur_pegawai::all();
        return view('lembur_pegawai.index', compact('lembur'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori_lembur::all();
        $pegawai = Pegawai::all();
        return view('lembur_pegawai.create', compact('pegawai' , 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               
        $lembur = $request->all();
        $pegawai = Pegawai::where('id', $lembur['pegawai_id'])->first();
        $kategori = Kategori_lembur::where('jabatan_id', 
                    $pegawai->jabatan_id)->where('golongan_id',
                    $pegawai->golongan_id)->first();

        $lembur = Lembur_pegawai::create([
                    'Kode_lembur_id' => $kategori->id,
                    'pegawai_id' => $lembur['pegawai_id'],
                    'Jumlah_jam' => $lembur['Jumlah_jam']]);
        return redirect('LEMBUR');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $kategori = Kategori_lembur::all();
         $pegawai = Pegawai::all();
        $lembur = Lembur_pegawai::find($id);
        return view('lembur_pegawai.edit', compact('lembur','pegawai', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  $lemburUpdate = Request::all();
      
       $lembur = Lembur_pegawai::find($id);
        // $lembur->update($lemburUpdate);
        // return redirect('LEMBUR');
             $lembur->Kode_lembur_id = $request->get('Kode_lembur_id');
            $lembur->pegawai_id = $request->get('pegawai_id');
            $lembur->Jumlah_jam = $request->get('Jumlah_jam'); 
            
        $pegawai = Pegawai::where('id', $lembur['pegawai_id'])->first();
        $kategori = Kategori_lembur::where('jabatan_id', 
                    $pegawai->jabatan_id)->where('golongan_id',
                    $pegawai->golongan_id)->first();

        $lembur->update([
                    'Kode_lembur_id' => $kategori->id,
                    'pegawai_id' => $lembur['pegawai_id'],
                    'Jumlah_jam' => $lembur['Jumlah_jam']]);
        return redirect('LEMBUR');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lembur_pegawai::find($id)->delete();
        return redirect('LEMBUR');
    }
}
