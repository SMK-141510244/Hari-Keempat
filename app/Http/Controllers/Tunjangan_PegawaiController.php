<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App\Pegawai;
use App\Tunjangans;
use App\Tunjangan_pegawai;

class Tunjangan_PegawaiController extends Controller
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
        //
        $tunjanganpeg = Tunjangan_pegawai::all();
        return view('tunjangan_pegawai.index', compact('tunjanganpeg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $tunjangan = Tunjangans::all();
         $pegawai = Pegawai::all();
        return view('tunjangan_pegawai.create', compact('pegawai' , 'tunjangan')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $tunjanganpeg = Request::all();
        Tunjangan_pegawai::create($tunjanganpeg);
        return redirect('TUNJANGANPEG');

        // $tunjanganpeg = $request->all();
        // $pegawai = Pegawai::where('id', $tunjanganpeg['pegawai_id'])->first();
        // $tunjangan = Tunjangans::where('jabatan_id', 
        //             $pegawai->jabatan_id)->where('golongan_id',
        //             $pegawai->golongan_id)->first();

        // $tunjanganpeg = Tunjangan_pegawai::create([
        //             'Kode_tunjangan_id' => $tunjangan->id,
        //             'pegawai_id' => $tunjanganpeg['pegawai_id']
        //             // 'Status_id' => $tunjangan->Status
        //             ]);
        // return redirect('TUNJANGANPEG');
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
        $tunjangan = Tunjangans::all();
         $pegawai = Pegawai::all();
        $tunjanganpeg = Tunjangan_pegawai::find($id);
        return view('tunjangan_pegawai.edit', compact('tunjanganpeg','pegawai', 'tunjangan'));
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
         $tunjanganpegUpdate = Request::all();
        $tunjanganpeg = Tunjangan_pegawai::find($id);
        $tunjanganpeg->update($tunjanganpegUpdate);
        return redirect('TUNJANGANPEG');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Tunjangan_pegawai::find($id)->delete();
        return redirect('TUNJANGANPEG');
    }
}
