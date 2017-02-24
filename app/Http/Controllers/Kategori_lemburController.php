<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\Jabatan;
use App\Golongan;
use App\Kategori_lembur;


class Kategori_lemburController extends Controller
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
        $kategori = Kategori_lembur::all();
        return view('kategori_lembur.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $jabatan = Jabatan::all();
         $golongan = Golongan::all();
        return view('kategori_lembur.create', compact('golongan' , 'jabatan')); 
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
        // $kategori = Request::all();
        // Kategori_lembur::create($kategori);
        // return redirect('KATEGORI');

         $kategori=Request::all();
        $rules=['Kode_lembur'=>'required|unique:kategori_lemburs',
                'Besaran_uang'=>'required|unique:kategori_lemburs'
        ];

        $message=['Kode_lembur.unique'=>'Masukan Sudah Ada',
                  'Kode_lembur.required'=>'Kolom Jangan Kosong',
                  'Besaran_uang.unique'=>'Masukan Sudah Ada',
                  'Besaran_uang.required'=>'Kolom Jangan Kosong'
                  ];

                  $validator=Validator::make(Input::all(),$rules,$message);
                  if ($validator->fails()) {
                    return redirect('/KATEGORI/create')
                    ->withErrors($validator)
                    ->withInput();
                      # code...
                  }
                  else{
                    Kategori_lembur::create($kategori);
                    return redirect('KATEGORI');
                  }
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
        $jabatan = Jabatan::all();
         $golongan = Golongan::all();
        $kategori = Kategori_lembur::find($id);
        return view('kategori_lembur.edit', compact('kategori','golongan', 'jabatan'));
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
        $kategoriUpdate = Request::all();
        $kategori = Kategori_lembur::find($id);
        $kategori->update($kategoriUpdate);
        return redirect('KATEGORI');
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
         Kategori_lembur::find($id)->delete();
        return redirect('KATEGORI');
    }
}
