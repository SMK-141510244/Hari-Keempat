<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tunjangan_pegawai;
use App\Pegawai;
use App\Jabatan;
use App\Golongan;
use App\Tunjangans;
 use App\Penggajian;
 use App\Lembur_pegawai;

class PenggajianController extends Controller
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
        // $gajian = Penggajian::paginate(3);
//         $gajian = Penggajian::all();
//         return view('penggajian.index',compact('gajian'));
        $gajian = Penggajian::all();
        return view('penggajian.index',compact('gajian')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $tunjangan= Tunjangans::all();
        //  $tunjanganpeg = Tunjangan_pegawai::all();
        //  $pegawai = Pegawai::all();
        //  $jabatan = Jabatan::all();
        //  $golongan = Golongan::all();

        // return view('penggajian.create', compact('golongan', 'jabatan', 'pegawai','tunjanganpeg', 'tunjangan'));
        //  $gaji = Tunjangan_pegawai::paginate(10);
//         $gaji = Tunjangan_pegawai::all();
//        return view('penggajian.create',compact('gaji'));
        $tunjanganpeg = Tunjangan_pegawai::all(); 
        $gaji = Tunjangan_pegawai::all();
        return view('penggajian.create',compact('gaji','tunjanganpeg'));
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
//         $i_gaji=Input::all();
//        // dd($penggajian);
//       $tunjanganpeg=Tunjangan_pegawai::where('id',$i_gaji['
//     tunjangan_pegawai_id'])->first();
//       // dd($where);
//       $WPenggajian=Penggajian::where('tunjangan_pegawai_id',$tunjanganpeg->id)->first();
//       // dd($wherepenggajian);
//       $tunjangan=Tunjangans::where('id',$tunjangan_pegawai->Kode_tunjangan_id)->first();
//       // dd($where);
//       $pegawai=Pegawai::where('id',$tunjangan_pegawai->pegawai_id)->first();
//       // dd($wherepegawai);
//       $kategori_lembur=kategori_lembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
//       // dd($wherekategorilembur);
//       $lembur_pegawai=Lembur_pegawai::where('pegawai_id',$pegawai->id)->first();
//       // dd($wherelemburpegawai);
//       $jabatan=Jabatan::where('id',$pegawai->jabatan_id)->first();
//       // dd($wherejabatan);
//       $golongan=Golongan::where('id',$pegawai->golongan_id)->first();
//       // dd($wheregolongan);
//       $gaji = new Penggajian ;
//       if (isset($WPenggajian)) {
//           $error=true ;
//           $tunjangan=Tunjangan_pegawai::paginate(10);
//           return view('FPenggajian.create',compact('tunjangan','error'));
//       }
//       elseif (!isset($lembur_pegawai)) {
//            $nol = 0;
//            $gaji->Jumlah_jam_lembur= $nol;
//            $gaji->Jumlah_uang_lembur = $nol;
//            $gaji->Gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
//            $gaji->Total_gaji=($tunjangan->Jumlah_anak*$tunjangan->Besaran_uang)+($jabatan->Besaran_uang+$golongan->Besaran_uang);
//            $gaji->Tanggal_pengambilan = date('d-m-y');
//            $gaji->Status_pengambilan = Input::get('Status_pengambilan');
//            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
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
        //
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
