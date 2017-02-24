<?php

namespace App\Http\Controllers;

use Request;
use App\Jabatan;
use Validator;
use Input;

class JabatanController extends Controller
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
        $jabatan = Jabatan::all();
        return view('jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jabatan.create');
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
        //  $jabatan = Request::all();
        // Jabatan::create($jabatan);
        // return redirect('JABATAN');

         $jabatan=Request::all();
        $rules=['Kode_jabatan'=>'required|unique:jabatans',
                'Nama_jabatan'=>'required|unique:jabatans',
                'Besaran_uang'=>'required|unique:jabatans'
        ];

        $message=['Kode_jabatan.unique'=>'Masukan Sudah Ada',
                  'Kode_jabatan.required'=>'Kolom Jangan Kosong',
                  'Nama_jabatan.unique'=>'Masukan Sudah Ada',
                  'Nama_jabatan.required'=>'Kolom Jangan Kosong',
                  'Besaran_uang.unique'=>'Masukan Sudah Ada',
                  'Besaran_uang.required'=>'Kolom Jangan Kosong'
                  ];

                  $validator=Validator::make(Input::all(),$rules,$message);
                  if ($validator->fails()) {
                    return redirect('/JABATAN/create')
                    ->withErrors($validator)
                    ->withInput();
                      # code...
                  }
                  else{
                    Jabatan::create($jabatan);
                    return redirect('JABATAN');
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
       $jabatan = Jabatan::find($id);
        return view('jabatan.edit', compact('jabatan'));
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
        $jabatanUpdate = Request::all();
        $jabatan = Jabatan::find($id);
        $jabatan->update($jabatanUpdate);
        return redirect('JABATAN');
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
        Jabatan::find($id)->delete();
        return redirect('JABATAN');
    }
}
