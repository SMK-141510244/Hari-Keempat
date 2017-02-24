<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Pegawai;
use App\Jabatan;
use App\Golongan;
use App\Kategori_lembur;
use Input;
use File;


class PegawaiController extends Controller
{
        use RegistersUsers;

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
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $jabatan = Jabatan::all();
         $golongan = Golongan::all();
        return view('pegawai.create', compact('golongan', 'jabatan'));
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'Nip' => 'required|numeric|min:2|unique:pegawais',
            'permission' => 'required|max:255',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);
       
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'permission' => $request->get('permission'),
            'password' => bcrypt($request->get('password')),
        ]);

        if ($request->hasFile('Photo')){
            $uploaded_Photo = $request->file('Photo');
            $extension = $uploaded_Photo->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'/image';
            $uploaded_Photo->move($destinationPath, $filename);

             $pegawai = new Pegawai;
        $pegawai->Nip = $request->get('Nip');
        $pegawai->user_id = $user->id;
        $pegawai->jabatan_id = $request->get('jabatan_id');
        $pegawai->golongan_id = $request->get('golongan_id');
       
            $pegawai->Photo = $filename;
            $pegawai->save();
        }

       /* $file = Input::file('Photo');
        $destinationPath = public_path().'/image';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $UploadSuccess = $file->move($destinationPath, $filename);


        if (Input::hasFile('Photo')) {
         $pegawai = new Pegawai;
        $pegawai->Nip = $request->get('Nip');
        $pegawai->user_id = $user->id;
        $pegawai->jabatan_id = $request->get('jabatan_id');
        $pegawai->golongan_id = $request->get('golongan_id');
        $pegawai->Photo = $filename;
        $pegawai->save();  
        }*/
        

         return redirect('PEGAWAI');


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
        $pegawai=Pegawai::find($id);
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        return view('pegawai.show',compact('golongan','jabatan','pegawai'));
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
        $pegawai=Pegawai::find($id);
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        return view('pegawai.edit',compact('golongan','jabatan', 'pegawai'));
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
         $pegawai = Pegawai::find($id);

            $pegawai->Nip = $request->get('Nip');
            $pegawai->jabatan_id = $request->get('jabatan_id');
            $pegawai->golongan_id = $request->get('golongan_id'); 

        $this->validate($request, [
          
            /*'Nip' => 'required|numeric|min:2|unique:pegawais,Nip',
            */
            'Nip' => 'required|numeric|min:3',
            ]);
       
       /* $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'permission' => $request->get('permission'),
            'password' => bcrypt($request->get('password')),
        ]);*/
       
        if ($request->hasFile('Photo')){
            $filename = null;
            $uploaded_Photo = $request->file('Photo');
            $extension = $uploaded_Photo->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'/image';
            $uploaded_Photo->move($destinationPath, $filename);

            if ($pegawai->Photo) {
                $old_Photo = $pegawai->Photo;
                $filepath = public_path().DIRECTORY_SEPARATOR.'/image'.DIRECTORY_SEPARATOR.$pegawai->Photo;
                try{
                    File::delete($filepath);
                }
                catch(FileNotFoundException $e){
                    //file sudah dihapus
                }
            }
            $pegawai->Photo = $filename;
           
        }
         $pegawai->save();

       /* $pegawai = Pegawai::find($id);

        $pegawai->Nip = $request->get('Nip');
        $pegawai->jabatan_id = $request->get('jabatan_id');
        $pegawai->golongan_id = $request->get('golongan_id'); 

        if ($request->hasFile('Photo')) {
        $file = $request->file('Photo');
        $destinationPath = public_path().'/image';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $UploadSuccess = $file->move($destinationPath,$filename);
        $pegawai->Photo = $filename;
        $pegawai->save();
           }*/
                return redirect('PEGAWAI');

        
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
        Pegawai::find($id)->delete();
        return redirect('PEGAWAI');
    }
}
