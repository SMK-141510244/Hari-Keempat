<?php

namespace App\Http\Controllers;

use Request;
use App\Golongan;
use App\Jabatan;
use Validator;
use Input;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ public function __construct()
    {
        $this->middleware('HRD');
    }
    public function index()
    {
        //
        $golongan = Golongan::all();
        return view('golongan.index', compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('golongan.create');
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
        //  $golongan = Request::all();
        // Golongan::create($golongan);
        // return redirect('GOLONGAN');
        $golongan=Request::all();
        $rules=['Kode_golongan'=>'required|unique:golongans',
                'Nama_golongan'=>'required|unique:golongans',
                'Besaran_uang'=>'required|unique:golongans'
        ];

        $message=['Kode_golongan.unique'=>'Masukan Sudah Ada',
                  'Kode_golongan.required'=>'Kolom Jangan Kosong',
                  'Nama_golongan.unique'=>'Masukan Sudah Ada',
                  'Nama_golongan.required'=>'Kolom Jangan Kosong',
                  'Besaran_uang.unique'=>'Masukan Sudah Ada',
                  'Besaran_uang.required'=>'Kolom Jangan Kosong'
                  ];

                  $validator=Validator::make(Input::all(),$rules,$message);
                  if ($validator->fails()) {
                    return redirect('/GOLONGAN/create')
                    ->withErrors($validator)
                    ->withInput();
                      # code...
                  }
                  else{
                    Golongan::create($golongan);
                    return redirect('GOLONGAN');
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
       $golongan = Golongan::find($id);
        return view('golongan.edit', compact('golongan'));
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
        $golonganUpdate = Request::all();
        $golongan = Golongan::find($id);
        $golongan->update($golonganUpdate);
        return redirect('GOLONGAN');

        // $golongan=Golongan::find($id);
        //  $golongan->Kode_golongan = $request->get('Kode_golongan');
        //     $golongan->Nama_golongan = $request->get('Nama_golongan');
        //     $golongan->Besaran_uang = $request->get('Besaran_uang');

        // $rules=['Kode_golongan'=>'required|unique:golongans',
        //         // 'Nama_golongan'=>'required|unique:golongans',
        //         // 'Besaran_uang'=>'required|unique:golongans'
        // ];

        // $message=['Kode_golongan.unique'=>'Masukan Sudah Ada',
        //           'Kode_golongan.required'=>'Kolom Jangan Kosong',
        //           // 'Nama_golongan.unique'=>'Masukan Sudah Ada',
        //           // 'Nama_golongan.required'=>'Kolom Jangan Kosong',
        //           // 'Besaran_uang.unique'=>'Masukan Sudah Ada',
        //           // 'Besaran_uang.required'=>'Kolom Jangan Kosong'
        //           ];

        //           $validator=Validator::make(Input::all(),$rules,$message);
        //           if ($validator->fails()) {
        //             return redirect('/GOLONGAN/create')
        //             ->withErrors($validator)
        //             ->withInput();
        //               # code...
        //           }
        //           else{
        //             Golongan::update($golongan);
        //             return redirect('GOLONGAN');
        //           }
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
        Golongan::find($id)->delete();
        return redirect('GOLONGAN');
    }
}